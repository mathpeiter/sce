<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Responsible;

class ResponsibleController extends Controller
{
    private $obgResponsible;

    public function __construct()
    {
        $this->middleware('auth');
        $this->obgResponsible=new Responsible();
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
        return view('responsible\create');
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
            'email'=>$request->email
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
        return view('responsible\edit', ['responsible' => $responsible]);
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
            'email'=>$request->email
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
