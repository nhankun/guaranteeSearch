<?php
namespace App\Repositories\admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function getAll($nbrPages, $parameters)
    {
        return User::orderBy($parameters['order'], 'asc')
            ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
                $query->where(function ($q)  use ($parameters) {
                    $q->where('name', 'like', "%".$parameters['search']."%");
                });
            })
            ->paginate($nbrPages);
    }

    public function create($params)
    {
        $params['password'] = Hash::make($params['password']);
        $params['role'] = 'user';
        return User::create($params);
    }

    public function update($params, $id)
    {
        $user = $this->getUserById($id);
        if(isset($params['password'])){
            $params['password'] = Hash::make($params['password']);
        }
        $params['role'] = 'user';
        return $user->update($params);
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }


}
