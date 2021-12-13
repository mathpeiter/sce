<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    private $obgComputer;
    private $obgSector;

    public function __construct()
    {
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
        return view('report\index');
    }
    public function report1()
    {
        $sectors = $this->obgSector = Sector::all();
        return view('report\report1', ['sectors' => $sectors]);
    }
    public function search1(Request $request)
    {
        $search = $request->search1;
        $sectors = $this->obgSector = Sector::all();
        $computers = $this->obgComputer = Computer::where('sector_id', $search)->get();
        return view('report\search1', ['sectors' => $sectors], ['computers' => $computers]);
    }
}