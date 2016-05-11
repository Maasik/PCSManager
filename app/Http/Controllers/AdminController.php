<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller {

//     public function __construct()
//    {
//        $this->middleware('auth');
//    }
    
    public function index() {
   //     $user = Auth::user();
     //   $userCount = User::count();
        if (\Illuminate\Support\Facades\Auth::user()->isAdmin() == 1)
//            return view('admin.index', compact('userCount'));
            return 'is admin';
        else
//            return redirect('');
            return 'Not admin';
    }

}
