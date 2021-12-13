<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    private $objUser;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objUser=new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('userController', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($this->objUser = User::find(1)->relComputer);
        //$user = DB::select('select * from users where id = ?', [$id]);
        $user =  $this->objUser = User::find($id);
        return view('userControllerShow', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  $this->obgUser = User::find($id);
        return view('userControllerEdit', ['user' => $user]);
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
        if (isset($request->password)) {
            $user =  $this->objUser = User::where(['id'=>$id])->update([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'cell' => $request->cell,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'permission' => $request->permission
            ]);
        }
        else{
            $user =  $this->objUser = User::where(['id'=>$id])->update([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'cell' => $request->cell,
                'email' => $request->email,
                'permission' => $request->permission
            ]);
        }

        return redirect('user');
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
}