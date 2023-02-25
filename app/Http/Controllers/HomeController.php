<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Quest;
use App\Galeri;
use App\Blog;
use App\Tour;
use DB;
use Auth;
use File;
use DataTables;
use Js;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('dashboard.dashboard');
    }

     public function adminHome()
    {
    //     $users = DB::table('users')
    //    ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name")) 
    //    ->whereYear('created_at', date('Y'))
    //     ->groupBy(DB::raw("Month(created_at)"), DB::raw("created_at"))
    //     ->pluck('count', 'month_name');
    //     $labels = $users->keys();
    //     $data = $users->values();


        // $quest = DB::table('quests')
        // ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("created_at"))
        // ->pluck('count', 'month_name');
        // $labels2 = $quest->keys();
        // $data2 = $quest->values();
        $user = DB::table('users')->count();
        $quest = DB::table('quests')->count();
        $galeris = DB::table('galeris')->count();
        $blog = DB::table('blogs')->count();
        $tour = DB::table('tours')->count();

       
        return view('admin.dashboard.dashboard', compact('user','quest','galeris','blog','tour'));  
    }


    
}
