<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\About;
use App\Models\Team;

class FrontendController extends Controller
{
  public function index(){
     
     $main = Main::first();
     $services = Service::all();
     $portfolios = Portfolio::all();
     $abouts = About::all();
     $teams = Team::all();
     
     return view('frontEnd.index', compact('main','services','portfolios','abouts','teams'));
  }
}
