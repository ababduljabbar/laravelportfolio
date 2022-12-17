<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainpageController extends Controller
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
        $main = Main::first();
        return view('backEnd.page.main', compact('main'));
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

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'sub_title' => 'required|max:255',
            'title' => 'required|max:255',
            'button_link' => 'required|max:255',
            'button_text' => 'required|max:255',
            
        ]);
        $main = Main::first();
        
        if( $request->file('bg_image') ){
            $file = $request->file('bg_image');
            $file->storeAs('public/image','header-bg.' .$file->getClientOriginalExtension());
            $main->bg_image = 'storage/image/header-bg.' .$file->getClientOriginalExtension();
        }

        $main->sub_title = $request->sub_title;
        $main->title = $request->title;
        $main->button_text = $request->button_text;
        $main->button_link = $request->button_link;
  
        $main->save();

        return redirect()->route('admin.main')->with('success','Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
