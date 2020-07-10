<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sector;

class SectorController extends Controller
{

    private $obgSector;

    public function __construct()
    {
        $this->middleware('auth');
        $this->obgSector=new Sector();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = $this->obgSector = Sector::all();
        return view('sector\index', ['sectors' => $sectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reg = $this->obgSector->create([
            'name'=>$request->name
        ]);

        if($reg){
            return redirect('sector');
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
        $sector =  $this->obgSector = Sector::find($id);
        return view('sector\show', ['sector' => $sector]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector =  $this->obgSector = Sector::find($id);
        return view('sector\edit', ['sector' => $sector]);
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
        $sector =  $this->obgSector = Sector::where(['id'=>$id])->update([
            'name'=>$request->name
        ]);

        return redirect('sector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->obgSector = Sector::destroy($id);
        return redirect('sector');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $sectors = DB::select('select * from sectors where name = ?', [$search]);
        return view('sector\search', ['sectors' => $sectors]);
    }

}