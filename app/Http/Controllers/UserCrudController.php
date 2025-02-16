<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserSignup;

class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::getUsers();
        return view('admin.user.list' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::getAll();
        return view('admin.user.add' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSignup $request)
    {
        User::store($request);
        return redirect('admin/users')->with('status', 'the user was added successfuly');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::getUser($id);
        $data['roles'] = Role::getAll(); 
        
        return view('admin.user.edit', $data);
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSignup $request, $id)
    {
       User::editUser($request, $id);
       
        return redirect('admin/users')->with('status', 'the user was edited successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == session('id')){
              return redirect('admin/users')->with('status-fail', 'To delete your self please ask a frined');
        }
        
       User::deletUser($id);
       
       return redirect('admin/users')->with('status', 'the user was deleted successfuly');
    }
}
