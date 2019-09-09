<?php

namespace UIMS\Http\Controllers;

use Illuminate\Http\Request;
use UIMS\Programme;
use UIMS\Department;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $pro = Programme::latest()->paginate(5);

        return view('programmes.index',compact('pro'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create()
    {
        $department=Department::pluck('name','id');
        return view('programmes.create',compact('department'));
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
            'department_id'=>'required',
          ]);
          
          $pro=new Programme;
          $pro->name=$request->input('name');
          $pro->department_id=$request->input('department_id');
          $pro->save();
  
  
          return redirect('/programmes')->with('success',' added');
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
        $pro=Programme::find($id);
        $department=Department::pluck('name','id');

        return view('programmes.edit')->with('pro',$pro)
               ->with('department', $department);
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
            'department_id'=>'required',
          ]);
          
          $pro=Programme::find($id);
          $pro->name=$request->input('name');
          $pro->department_id=$request->input('department_id');
          $pro->save();
  
  
          return redirect('/programmes')->with('success',' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Programme::find($id);
        $pro->delete();

        return redirect('/programmes')->with('success','programme deleted');
    }
}
