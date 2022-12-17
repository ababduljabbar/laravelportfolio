<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
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
        return view('backEnd.page.portfolios.portfoliocreate');
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
            'description' => 'required',
            'client' => 'required|max:255',
            'category' => 'required|max:255'           
        ]);

        $portfolios = new Portfolio;
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;

        if( $request->file('p_image') ){
            $file = $request->file('p_image');
            Storage::putFile('public/image/',$file);
            $portfolios->p_image = 'storage/image/'.$file->hashName();
        }

        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;


    
        $portfolios->save();
        return redirect()->route('admin.portfolio.create')->with('success','Update Successfully');
    }
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('backEnd.page.portfolios.portfoliolist', compact('portfolios'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $portfolio = Portfolio::find($id);
         return view('backEnd.page.portfolios.portfolioedit', compact('portfolio'));
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

         $portfolios = Portfolio::find($id);

          
         $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'description' => 'required',
            'client' => 'required|max:255',
            'category' => 'required|max:255'
                
        ]);

    

        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;

        if( $request->file('p_image') ){
            $file = $request->file('p_image');
            Storage::putFile('public/image/',$file);
            $portfolios->p_image = 'storage/image/'.$file->hashName();
        }

        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;


    
        $portfolios->save();
        return redirect()->route('admin.portfolio.edit',$portfolios->id)->with('success','Update Successfully');
     }

    /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id) 
     {
         $portfolios = Portfolio::find($id);
         $portfolios->delete();
         return redirect()->route('admin.portfolio.list')->with('success','delete Successfully');
     }
    }