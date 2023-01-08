<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TodosController;

class HomeController extends Controller
{
  public function show(){
    return view('home', ['todos' => auth()->user()->todos()->get()]);
  }
}
