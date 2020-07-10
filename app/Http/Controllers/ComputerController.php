<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Computer;
use App\Models\Usage;

class ComputerController extends Controller
{
    private $objUser;
    private $obgComputer;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
        $this->obgComputer=new Computer();
        $this->obgUsage=new Usage();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($this->objUser->all());
        //dd($this->obgComputer->all());
        //dd($this->objUser = find(1)->relComputer);
        //dd($this->obgComputer = find(2)->relUser);
        //$computers = DB::select('select * from computers');
        $computers = $this->obgComputer = Computer::all();
        return view('computer\index', ['computers' => $computers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computer\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $reg = $this->obgComputer->create([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'so'=>$request->so,
            'processor'=>$request->processor,
            'ram'=>$request->ram,
            'memory'=>$request->memory,
            'sn'=>$request->sn
        ]);

        if($reg){
            return redirect('computer');
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
        $computer =  $this->obgComputer = Computer::find($id);
        $patrimony = $computer->patrimony;
        $usages = DB::select('select * from usages where patrimony = ?', [$patrimony]);
        return view('computer\show', ['computer' => $computer], ['usages' => $usages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $computer =  $this->obgComputer = Computer::find($id);
        return view('computer\edit', ['computer' => $computer]);
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
        $computer =  $this->obgComputer = Computer::where(['id'=>$id])->update([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'so'=>$request->so,
            'processor'=>$request->processor,
            'ram'=>$request->ram,
            'memory'=>$request->memory,
            'sn'=>$request->sn
        ]);

        return redirect('computer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$computers = DB::delete('delete from computers where id = ?', [$id]);
        $this->obgComputer = Computer::destroy($id);
        return redirect('computer');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $computers = DB::select('select * from computers where patrimony = ?', [$search]);
        return view('computer\search', ['computers' => $computers]);
    }
}
