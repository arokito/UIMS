<?php

namespace UIMS\Http\Controllers;

use Illuminate\Http\Request;
use UIMS\Department;
use UIMS\Fuculty;
use Gate;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        
        $dep = Department::latest()->paginate(5);

        return view('departments.index',compact('dep'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $fuculty=Fuculty::pluck('name','id');
        return view('departments.create',compact('fuculty'));
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
            'fuculty_id'=>'required',
          ]);
          
          $dep=new Department;
          $dep->name=$request->input('name');
          $dep->fuculty_id=$request->input('fuculty_id');
          $dep->save();
  
  
          return redirect('/departments')->with('success',' added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dep=Department::find($id);
        return view('departments.show')->with('dep',$dep);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep=Department::find($id);
        $fuculty=Fuculty::pluck('name','id');

        return view('departments.edit')->with('dep',$dep)
               ->with('fuculty', $fuculty);
        
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
            'fuculty_id'=>'required',
          ]);
          
          $dep=Department::find($id);
          $dep->name=$request->input('name');
          $dep->fuculty_id=$request->input('fuculty_id');
          $dep->save();

          return redirect('/departments')->with('success','department updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep=Department::find($id);
        $dep->delete();

        return redirect('/departments')->with('success','depertment deleted');
    }
}
