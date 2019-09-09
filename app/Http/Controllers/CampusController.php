<?php

namespace UIMS\Http\Controllers;
use UIMS\Campus;
use UIMS\University;
use Gate;

use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __constuct(){
         $this->middleware('auth');
     }
    public function index()
    {
        $camp = Campus::latest()->paginate(5);

        return view('campuses.index',compact('camp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(!Gate::allows('isAdmin')){
            abort(404,"sorry youre not logged in as admin");
        }
        $university=University::pluck('name','id');
        return view('campuses.create',compact('university'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $this->validate($request,[
          'name'=>'required',
          'university_id'=>'required',
        ]);
        $camp=new Campus;
        $camp->name=$request->input('name');
        $camp->university_id=$request->input('university_id');
        $camp->save();


        return redirect('/campuses')->with('success','campus added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp=Campus::find($id);
        return view('campuses.show')->with('camp',$camp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(!Gate::allows('isAdmin')){
            abort(404,"sorry youre not logged in as admin");
        }
        $camp=Campus::find($id);
        $university=University::pluck('name','id');

        return view('campuses.edit')->with('camp',$camp)
               ->with('university', $university);
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
        $this->validate($request,[
            'name'=>'required',
            'university_id'=>'required',
          ]);
          $camp=Campus::find($id);
          $camp->name=$request->input('name');
          $camp->university_id=$request->input('university_id');
          $camp->save();
  
  
          return redirect('/campuses')->with('success','campus update');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(404,"sorry youre not logged in as admin");
        }
        $camp=Campus::find($id);
        $camp->delete();

        return redirect('/campuses')->with('success','campus deleted');
    }
}
