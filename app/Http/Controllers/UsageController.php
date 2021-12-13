<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Usage;
use App\Models\Sector;
use App\Models\Computer;
use App\Models\Monitor;

class UsageController extends Controller
{
    private $objUser;
    private $obgUsage;
    private $obgSector;
    private $obgComputer;
    private $obgMonitor;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
        $this->obgUsage=new Usage();
        $this->obgSector=new Sector();
        $this->obgComputer=new Computer();
        $this->obgMonitor=new Monitor();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usages = $this->obgUsage = Usage::all();
        $usages = $this->obgUsage = Usage::all()->sortByDesc('updated_at')->take(15);
        return view('usage\index', ['usages' => $usages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sectors = $this->obgSectors = Sector::all();
        $patrimony = $request->patrimony;
        return view('usage\create', ['sectors' => $sectors], ['patrimony' => $patrimony]);
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
        $reg = $this->obgUsage->create([
            'user_id'=>$user_id,
            'sector_id'=>$request->sector_id,
            'patrimony'=>$request->patrimony,
            'start_date'=>$request->start_date
        ]);
        
        $computerTest = $this->obgComputer = Computer::where('patrimony', $request->patrimony)->get();
        $monitorTest =  $this->obgMonitor = Monitor::where('patrimony', $request->patrimony)->get();

        if ($monitorTest == "[]") {
            $computer = $this->obgComputer = Computer::where(['patrimony'=>$request->patrimony])->update([
                'sector_id'=>$request->sector_id
            ]);
            $id = DB::table('computers')->where('patrimony', $request->patrimony)->first();
            $computer =  $this->obgComputer = Computer::findOrFail($id->id);
            $usages = $this->obgUsage = Usage::where('patrimony', $computer->patrimony)->orderBy('id', 'desc')->take(5)->get();
            return view('computer/show', ['computer' => $computer], ['usages' => $usages]);
        }
        if ($computerTest == "[]") {
            $monitor = $this->obgMonitor = Monitor::where(['patrimony'=>$request->patrimony])->update([
                'sector_id'=>$request->sector_id
            ]);
            $id = DB::table('monitors')->where('patrimony', $request->patrimony)->first();
            $monitor =  $this->obgMonitor = Monitor::findOrFail($id->id);
            $usages = $this->obgUsage = Usage::where('patrimony', $monitor->patrimony)->orderBy('id', 'desc')->take(5)->get();
            return view('monitor/show', ['monitor' => $monitor], ['usages' => $usages]);
        }
        return redirect('usage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usage =  $this->obgUsage = Usage::find($id);
        return view('usage\show', ['usage' => $usage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usage =  $this->obgUsage = Usage::find($id);
        $sectors =  $this->obgSector = Sector::All();
        return view('usage\edit', ['usage' => $usage], ['sectors' => $sectors]);
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
        $usage =  $this->obgUsage = Usage::where(['id'=>$id])->update([
            'user_id'=>$user_id,
            'sector_id'=>$request->sector_id,
            'patrimony'=>$request->patrimony,
            'start_date'=>$request->start_date
        ]);

        $computerTest = $this->obgComputer = Computer::where('patrimony', $request->patrimony)->get();
        $monitorTest =  $this->obgMonitor = Monitor::where('patrimony', $request->patrimony)->get();

        if ($monitorTest == "[]") {
            $computer = $this->obgComputer = Computer::where(['patrimony'=>$request->patrimony])->update([
                'sector_id'=>$request->sector_id
            ]);
            $id = DB::table('computers')->where('patrimony', $request->patrimony)->first();
            $computer =  $this->obgComputer = Computer::findOrFail($id->id);
            $usages = $this->obgUsage = Usage::where('patrimony', $computer->patrimony)->orderBy('id', 'desc')->take(5)->get();
            return view('computer/show', ['computer' => $computer], ['usages' => $usages]);
        }
        if ($computerTest == "[]") {
            $monitor = $this->obgMonitor = Monitor::where(['patrimony'=>$request->patrimony])->update([
                'sector_id'=>$request->sector_id
            ]);
            $id = DB::table('monitors')->where('patrimony', $request->patrimony)->first();
            $monitor =  $this->obgMonitor = Monitor::findOrFail($id->id);
            $usages = $this->obgUsage = Usage::where('patrimony', $monitor->patrimony)->orderBy('id', 'desc')->take(5)->get();
            return view('monitor/show', ['monitor' => $monitor], ['usages' => $usages]);
        }
        //return redirect('usage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->obgUsage = Usage::destroy($id);
        return redirect('usage');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        //$usages = DB::select('select * from usages where patrimony = ?', [$search]);
        $usages = $this->obgUsage = Usage::where('patrimony', $search)->orderBy('id', 'desc')->get();
        return view('usage\search', ['usages' => $usages]);
    }
}