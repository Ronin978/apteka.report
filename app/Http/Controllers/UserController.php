<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSuperAdmin', ['except' => ['index','myedit', 'update']]);
    }

    public function index()
    {
        $user=\Auth::user();

        return view('user.index',['user'=>$user]);
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
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
            
        return view('user.myedit',['user'=>$user]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        flash('Користувача деактивовано.');
        return back();
    }

    public function restore($id)
    {
        $user=User::withTrashed()->find($id);
        $user->restore();

        flash('Користувача відновлено.');
        return back();
    }

    public function delete($id)
    {
        $user=User::withTrashed()->find($id);
        $user->forceDelete();

        flash('Користувача видалено повністю.');
        return back();
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->update($request->all());
                
        flash('Дані змінено');
        return back();
    }
    
    public function myedit()
    {
        $user=\Auth::user();
        return view('user.myedit',['user'=>$user]);
    }

    public function myshow()
    {
        $users=User::withTrashed()->orderBy('created_at', 'DESC')->paginate(20);
        return view('user.allUsers',['users'=>$users]);
    }
}
