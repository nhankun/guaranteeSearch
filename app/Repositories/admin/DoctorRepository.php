<?php
namespace App\Repositories\admin;

use App\Models\Doctor;

class DoctorRepository
{

    public function getAll($nbrPages, $parameters)
    {
        return Doctor::orderBy($parameters['order'], 'asc')
            ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
                $query->where(function ($q)  use ($parameters) {
                    $q->where('name', 'like', "%".$parameters['search']."%");
                });
            })
            ->paginate($nbrPages);
    }

    public function create($params)
    {
        return Doctor::create($params);
    }

    public function update($params, $id)
    {
        $doctor = $this->getDoctorById($id);
        return $doctor->update($params);
    }

    public function getDoctorById($id)
    {
        return Doctor::findOrFail($id);
    }


}
