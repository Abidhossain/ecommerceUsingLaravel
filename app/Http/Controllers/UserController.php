<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class UserController extends Controller
{ 
    public function manageUser()
    {
        $allUser = User::paginate(10);
        return view('admin.user.manageUser',compact('allUser'));
    }  
    public function destroy($id)
    {
        //
    }
}
