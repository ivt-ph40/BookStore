<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use BD;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->orderBy('created_at','ASC')->get();
        // $users = BD::table('users')
                    // ->join('roles',function($join){
                    //     $join->on('users.role_id', '=', 'roles.id');
                    // })
                    // ->orderBy('users.id','ASC')
                    // ->get();
        return view('dashboards.users.list_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboards.users.create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('dashboards.users.list_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id', '=', $id)
                    ->first();
        return view('dashboards.users.detail_user', compact('users'));
        // dd($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $users = User::where('id','=', $id)
                    ->first();
        return view('dashboards.users.edit_user', compact('users','roles'));
                    //dd($users);
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
        $data = $request->except('_token', '_method');
        $data['password'] = bcrypt($data['password']);
        User::where('id', '=', $id)->first()->update($data);
        return redirect()->route('dashboards.users.list_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->reviews()->delete();
        $users->orders()->delete();
        return redirect()->route('dashboards.users.list_user');
    }
}
