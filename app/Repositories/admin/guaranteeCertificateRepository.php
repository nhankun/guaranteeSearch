<?php
namespace App\Repositories\admin;

use App\Models\Doctor;
use App\Models\guaranteeCertificate;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class guaranteeCertificateRepository
{

    public function getAll($nbrPages, $parameters)
    {
        return guaranteeCertificate::orderBy($parameters['order'], 'asc')
            ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
                $query->where(function ($q)  use ($parameters) {
                    $q->where('name', 'like', "%".$parameters['search']."%");
                });
            })
            ->paginate($nbrPages);
    }

    public function create($request)
    {
        $params = $request->all();
        $params['id_guarantee'] = 'VIN-'.$params['id_guarantee'];
        $params['password'] = Hash::make('12345678');
        $params['role'] = config('app.roles.2');
        $params['user_id'] = User::create($params)->id;
        $params['doctor_id'] = Doctor::create($params)->id;
        $gcs = guaranteeCertificate::create($params);

        $image_before = $this->uploadImage($request->file('image_before'),$gcs->id,'image_before');
        $image_doing = $this->uploadImage($request->file('image_doing'),$gcs->id,'image_doing');
        $image_complete = $this->uploadImage($request->file('image_complete'),$gcs->id,'image_complete');
        return $gcs->update([
            'image_before' => $image_before,
            'image_doing' => $image_doing,
            'image_complete' => $image_complete
        ]);
    }

    public function update($params, $id)
    {
        $params['id_guarantee'] = 'VIN-'.$params['id_guarantee'];
        $gc = $this->getById($id);
        return $gc->update($params);
    }
    public function uploadImage($file,$id,$desc){
        if ($file) {
            $destinationPath = 'image/guarantee_certificates/'.$id.'/'.$desc.'/'; // upload path
            $profilefile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profilefile);
            return $destinationPath.$profilefile;
        }
    }

    public function getById($id)
    {
        return guaranteeCertificate::findOrFail($id);
    }


}
