<?php
namespace App\Repositories\admin;

use App\Models\guaranteeCertificate;
use App\Services\Helper;

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

    public function create($params)
    {
        $params['id_guarantee'] = Helper::makeIdGuaranteeIncreases();
        return guaranteeCertificate::create($params);
    }

    public function update($params, $id)
    {
        $params['id_guarantee'] = Helper::makeIdGuaranteeIncreases($params['id_guarantee']);
        $gc = $this->getById($id);
        return $gc->update($params);
    }

    public function getById($id)
    {
        return guaranteeCertificate::findOrFail($id);
    }


}
