<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
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
        return view('backEnd.page.abouts.aboutcreate');
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
            'time' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
         
            
        ]);

        $abouts = new About;
        
        $abouts->time = $request->time;
        $abouts->title = $request->title;
        if( $request->file('a_image') ){
            $file = $request->file('a_image');
            Storage::putFile('public/image/',$file);
            $abouts->a_image = 'storage/image/'.$file->hashName();
        }
        $abouts->description = $request->description;
        $abouts->save();
        return redirect()->route('admin.about.create')->with('success','Update Successfully');
    }
    public function list()
    {
        $abouts = About::all();
        return view('backEnd.page.abouts.aboutlist', compact('abouts'));
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
        $about = About::find($id);
        return view('backEnd.page.abouts.aboutedit', compact('about'));
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

        $about = About::find($id);

        $validated = $request->validate([
            'time' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
         
            
        ]);
     
        $about->time = $request->time;
        $about->title = $request->title;
        if( $request->file('a_image') ){
            $file = $request->file('a_image');
            Storage::putFile('public/image/',$file);
            $abouts->a_image = 'storage/image/'.$file->hashName();
        }
        $about->description = $request->description;
        $about->save();
        return redirect()->route('admin.about.edit',$about->id)->with('success','Update Successfully');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('admin.about.list')->with('success','delete Successfully');
    }
}
