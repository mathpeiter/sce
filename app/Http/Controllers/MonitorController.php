<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Monitor;
use App\Models\Usage;
use App\Models\Computer;
use App\Models\Sector;

class MonitorController extends Controller
{
    private $objUser;
    private $obgMonitor;
    private $obgUsage;
    private $obgComputer;
    private $obgSector;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
        $this->obgMonitor=new Monitor();
        $this->obgUsage=new Usage();
        $this->obgComputer=new Computer();
        $this->obgSector=new Sector();
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
        $monitors = $this->obgMonitor = Monitor::all()->sortByDesc('updated_at')->take(15);
        $sectors = $this->obgSector = Sector::all();
        return view('monitor\index', ['monitors' => $monitors], ['sectors' => $sectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computers = $this->obgComputer = Computer::all()->sortByDesc('updated_at');
        return view('monitor\create', ['computers' => $computers]);
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
            'sector_id'=>0,
            'computer_id'=>$request->computer_id,
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
        //$patrimony = $monitor->patrimony;
        //$usages =  $this->obgUsage = Usage::where(['patrimony'=>$patrimony]);
        //$usages = DB::select('select * from usages where patrimony = ?', [$patrimony]);
        $usages = $this->obgUsage = Usage::where('patrimony', $monitor->patrimony)->orderBy('id', 'desc')->take(5)->get();
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
        $computers = $this->obgComputer = Computer::All();
        return view('monitor\edit', ['monitor' => $monitor], ['computers' => $computers]);
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
            'computer_id'=>$request->computer_id,
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
        //Antigo
        //$search = $request->search;
        //$monitors = DB::select('select * from monitors where patrimony = ?', [$search]);
        //$monitors = $this->obgMonitor = Monitor::where('patrimony', $search)->get();
        //return view('monitor\search', ['monitors' => $monitors]);


        //Novo
        $search = $request->search1;

        if (isset($search)) {
            $monitors = $this->obgMonitor = Monitor::where('patrimony', $search)->get();
        }else{
            $search = $request->search2;
            $monitors = $this->obgMonitor = Monitor::where('sector_id', $search)->get();
        }

        return view('monitor\search', ['monitors' => $monitors]);
    }
}
