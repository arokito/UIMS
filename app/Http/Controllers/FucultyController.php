<?php

namespace UIMS\Http\Controllers;
use UIMS\Fuculty;
Use UIMS\Campus;
use Gate;

use Illuminate\Http\Request;

class FucultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fac = Fuculty::latest()->paginate(5);

        return view('fuculties.index',compact('fac'))
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
        $campus=Campus::pluck('name','id');
        return view('fuculties.create',compact('campus'));
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
            'campus_id'=>'required',
          ]);
          $fac=new Fuculty;
          $fac->name=$request->input('name');
          $fac->campus_id=$request->input('campus_id');
          $fac->save();
  
  
          return redirect('/fuculties')->with('success',' added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fac=Fuculty::find($id);
        return view('fulcuties.show')->with('fac',$fac);
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
        $fac=Fuculty::find($id);
        $campus=Campus::pluck('name','id');

        return view('fuculties.edit')->with('fac',$fac)
               ->with('campus', $campus);
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
            'campus_id'=>'required',
          ]);
          $fac=Fuculty::find($id);
          $fac->name=$request->input('name');
          $fac->campus_id=$request->input('campus_id');
          $fac->save();
  
  
          return redirect('/fuculties')->with('success','fuculties updated');
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
        $fac=Fuculty::find($id);
        $fac->delete();

        return redirect('/fuculties')->with('success','fuculty deleted');
    }
}
