<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Responsible;
use App\Models\Sector;

class ResponsibleController extends Controller
{
    private $obgResponsible;
    private $obgSector;

    public function __construct()
    {
        $this->middleware('auth');
        $this->obgResponsible=new Responsible();
        $this->obgSector=new Sector();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibles = $this->obgResponsible = Responsible::all();
        return view('responsible\index', ['responsibles' => $responsibles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = $this->obgSectors = Sector::all();
        return view('responsible\create', ['sectors' => $sectors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reg = $this->obgResponsible->create([
            'registration'=>$request->registration,
            'name'=>$request->name,
            'email'=>$request->email,
            'sector_id'=>$request->sector_id
        ]);

        if($reg){
            return redirect('responsible');
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
        $responsible =  $this->obgResponsible = Responsible::find($id);
        //$patrimony = $monitor->patrimony;
        //$usages =  $this->obgUsage = Usage::where(['patrimony'=>$patrimony]);
        //$usages = DB::select('select * from usages where patrimony = ?', [$patrimony]);
        //, ['usages' => $usages]
        return view('responsible\show', ['responsible' => $responsible]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsible =  $this->obgResponsible = Responsible::find($id);
        $sectors = $this->obgSectors = Sector::all();
        return view('responsible\edit', ['responsible' => $responsible], ['sectors' => $sectors]);
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
        $responsible =  $this->obgResponsible = Responsible::where(['id'=>$id])->update([
            'registration'=>$request->registration,
            'name'=>$request->name,
            'email'=>$request->email,
            'sector_id'=>$request->sector_id
        ]);

        return redirect('responsible');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->obgResponsible = Responsible::destroy($id);
        return redirect('responsible');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $responsibles = DB::select('select * from responsibles where registration = ?', [$search]);
        return view('responsible\search', ['responsibles' => $responsibles]);
    }
}
