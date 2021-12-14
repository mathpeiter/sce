<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    private $objUser;
    private $obgComputer;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
        $this->obgMaintenance=new Maintenance();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$maintenances = $this->obgMaintenance = Maintenance::all();
        //$maintenances = $this->obgMaintenance = Maintenance::all()->orderBy('id', 'desc');
        //$maintenances = $this->obgMaintenance = Maintenance::where('id')->orderBy('id', 'desc')->get();
        $maintenances = $this->obgMaintenance = Maintenance::all()->sortByDesc('id')->take(15);
        return view('maintenance\index', ['maintenances' => $maintenances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patrimony = $request->patrimony;
        return view('maintenance\create', ['patrimony' => $patrimony]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->end_date){

        }else{
            $request->end_date = "Não Finalizado";
            $request->solution = "Não Finalizado";
        };
        $user_id = auth()->user()->id;
        $reg = $this->obgMaintenance->create([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'start_date'=>$request->start_date,
            'problem'=>$request->problem,
            'end_date'=>$request->end_date,
            'solution'=>$request->solution
        ]);

        if($reg){
            return redirect('maintenance');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance =  $this->obgMaintenance = Maintenance::find($id);
        return view('maintenance\show', ['maintenance' => $maintenance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance =  $this->obgMaintenance = Maintenance::find($id);
        return view('maintenance\edit', ['maintenance' => $maintenance]);
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
        $user_id = auth()->user()->id;
        $maintenance =  $this->obgMaintenance = Maintenance::where(['id'=>$id])->update([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'start_date'=>$request->start_date,
            'problem'=>$request->problem,
            'end_date'=>$request->end_date,
            'solution'=>$request->solution
        ]);

        return redirect('maintenance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->obgMaintenance = Maintenance::destroy($id);
        return redirect('maintenance');
    }

    public function search(Request $request)
    {
        $search = $request->search1;

        if (isset($search)) {
            $maintenances = $this->obgMaintenance = Maintenance::where('patrimony', $search)->orderBy('id', 'desc')->get();
        }else{
            $maintenances = $this->obgMaintenance = Maintenance::where('solution', 'Não Finalizado')->orderBy('id', 'desc')->get();

        }

        return view('maintenance\search', ['maintenances' => $maintenances]);
    }
}
