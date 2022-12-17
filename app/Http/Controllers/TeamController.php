<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;


class TeamController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.page.teams.teamcreate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'tw_link' => 'required|max:255',
            'fb_link' => 'required|max:255',
            'le_link' => 'required|max:255'
          
            
        ]);

        $teams = new Team;
        
        $teams->title = $request->title;
        $teams->sub_title = $request->sub_title;
        if( $request->file('t_image') ){
            $file = $request->file('t_image');
            Storage::putFile('public/image/',$file);
            $teams->t_image = 'storage/image/'.$file->hashName();
        }
        $teams->tw_link = $request->tw_link;
        $teams->fb_link = $request->fb_link;
        $teams->le_link = $request->le_link;
        $teams->save();
        return redirect()->route('admin.team.create')->with('success','Update Successfully');
    }
    public function list()
    {
        $teams = Team::all();
        return view('backEnd.page.teams.teamlist', compact('teams'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('backEnd.page.teams.teamedit', compact('team'));
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

        $team = Team::find($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'tw_link' => 'required|max:255',
            'fb_link' => 'required|max:255',
            'le_link' => 'required|max:255'
          
            
        ]);

        $teams = new Team;
        
        $teams->title = $request->title;
        $teams->sub_title = $request->sub_title;
        if( $request->file('t_image') ){
            $file = $request->file('t_image');
            Storage::putFile('public/image/',$file);
            $teams->t_image = 'storage/image/'.$file->hashName();
        }
        $teams->tw_link = $request->tw_link;
        $teams->fb_link = $request->fb_link;
        $teams->le_link = $request->le_link;
        $teams->save();
        
        return redirect()->route('admin.team.edit',$team->id)->with('success','Update Successfully');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('admin.team.list')->with('success','delete Successfully');
    }
}
