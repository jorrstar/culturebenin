<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function edit($id)  {
  return view('edit',compact('id'));  
 } //
}
