<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Monitor;
use App\Models\Usage;

class MonitorController extends Controller
{
    private $objUser;
    private $obgMonitor;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
        $this->obgMonitor=new Monitor();
        $this->obgUsage=new Usage();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($this->obgMonitor = Monitor::find(10));
        //dd($this->objUser = User::find(1)->relMonitor);
        //$monitors = DB::select('select * from monitors');
        $monitors = $this->obgMonitor = Monitor::all();
        return view('monitor\index', ['monitors' => $monitors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitor\create');
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
        $reg = $this->obgMonitor->create([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'screen'=>$request->screen,
            'sn'=>$request->sn
        ]);

        if($reg){
            return redirect('monitor');
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
        $monitor =  $this->obgMonitor = Monitor::find($id);
        $patrimony = $monitor->patrimony;
        //$usages =  $this->obgUsage = Usage::where(['patrimony'=>$patrimony]);
        //$usages = DB::select('select * from usages where patrimony = ?', [$patrimony]);
        $usages = $this->obgUsage = Usage::where('patrimony', $patrimony)->orderBy('id', 'desc')->get();
        return view('monitor\show', ['monitor' => $monitor], ['usages' => $usages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitor =  $this->obgMonitor = Monitor::find($id);
        return view('monitor\edit', ['monitor' => $monitor]);
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
        $monitor =  $this->obgMonitor = Monitor::where(['id'=>$id])->update([
            'user_id'=>$user_id,
            'patrimony'=>$request->patrimony,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'screen'=>$request->screen,
            'sn'=>$request->sn
        ]);

        return redirect('monitor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->obgMonitor = Monitor::destroy($id);
        return redirect('monitor');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        //$monitors = DB::select('select * from monitors where patrimony = ?', [$search]);
        $monitors = $this->obgMonitor = Monitor::where('patrimony', $search)->get();
        return view('monitor\search', ['monitors' => $monitors]);
    }
}
