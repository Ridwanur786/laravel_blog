<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    public function index(){
        $title = 'WELCOME TO LARAVEL FRAMEWORK';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about(){
          $title = 'WELCOME TO About US';
        //return view('pages.index', compact('title'));
        return view('pages.about')->with('title',$title);
    }
     public function services(){
          $data = array(
              'title'=> 'Our Services',
              'services'=>['Programming','web design','Out Sourceing']
          );
        //return view('pages.index', compact('title'));
        return view('pages.services')->with($data);
    }
}
