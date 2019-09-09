<?php

namespace UIMS\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use UIMS\University;
use UIMS\Organization_type;
use Gate;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('universities.index');
       //$uni=University::all();
      // return view('universities.index')->with('uni',$uni);
      $uni = University::latest()->paginate(5);

      return view('universities.index',compact('uni'))
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
       // $uni=University::where('university_type_id',Organization_type::university()->id);
        //$uni=University::get();
        $organizationTypes=Organization_type::pluck('name','id');
        return view('universities.create',compact('organizationTypes'));
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
            'telephone'=>'required',
            'email'=>['required','email','unique:universities'],
            'physical_address'=>'required',
            'organization_type_id'=>'required',

        ]);
        $uni=new University;
        $uni->name=$request->input('name');
        $uni->telephone=$request->input('telephone');
        $uni->email=$request->input('email');
        $uni->physical_address=$request->input('physical_address');
        $uni->organization_type_id=$request->input('organization_type_id');
        $uni->save();

        return redirect('/universities')->with('success','university added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
    
        $uni=University::find($id);

        return view('universities.show')->with('uni',$uni);
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
        $uni=University::find($id);
        $organizationTypes=Organization_type::pluck('name','id');

       

        return view('universities.edit')->with('uni',$uni)
               ->with('organizationTypes', $organizationTypes);
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
            'telephone'=>'required',
            'email'=>['required','email','unique:universities'],
            'physical_address'=>'required',
            'organization_type_id'=>'required',

        ]);
        $uni=University::find($id);
       
        $uni->name=$request->input('name');
        $uni->telephone=$request->input('telephone');
        $uni->email=$request->input('email');
        $uni->physical_address=$request->input('physical_address');
        $uni->organization_type_id=$request->input('organization_type_id');
        $uni->save();

        return redirect('/universities')->with('success','univesity updated');
                                     
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
        $uni=University::findorFail($id);
        $uni->delete();

        return redirect('/universities')->with('success','university deleted');
    }
}
