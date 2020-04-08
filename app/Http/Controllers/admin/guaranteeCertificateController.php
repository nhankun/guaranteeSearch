<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use App\Repositories\admin\guaranteeCertificateRepository;
use Illuminate\Http\Request;

class guaranteeCertificateController extends Controller
{
    private $repository;

    public function __construct(guaranteeCertificateRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'gcs';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parameters = $this->getParameters ($request);
        // Get records and generate links for pagination
        $records = $this->repository->getAll (config ("app.nbrPages.back.".$this->table), $parameters);

        $links = $records->appends($parameters)->links ('pagination');

        // Ajax response
        if ($request->ajax()) {
            return response ()->json ([
                'table' => view ("admin.gcs.table", ["gcs" => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }

        return view ("admin.gcs.index", ["gcs" => $records, 'links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        $doctors = Doctor::all();
        return view('admin.gcs.create',compact(['users','services','doctors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gc = $this->repository->create($request);
        if ($request->ajax()){
            return response()->json([
                'success' => true,
                'error' => false,
                'data' => [
                    'gc' => $gc
                ]
            ]);
        }
        return redirect()->route('gcs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gc = $this->repository->update($request->all(),$id);
        if ($request->ajax()){
            return response()->json([
                'success' => true,
                'error' => false,
                'data' => [
                    'gc' => $gc
                ]
            ]);
        }
        return redirect()->route('gcs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function getParameters($request)
    {
        // Default parameters
        $parameters = config("parameters.$this->table");

        // Build parameters with request
        foreach ($parameters as $parameter => &$value) {
            if (isset($request->$parameter)) {
                $value = $request->$parameter;
            }
        }

        return $parameters;
    }
}
