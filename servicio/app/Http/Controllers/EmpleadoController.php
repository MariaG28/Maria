<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['employees']=Empleado::paginate(5);
        return view('empleado.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data=request()->all();


        $fields=[
            'first_name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'email'=>'required|email',
        ];

        $message=[
            'required'=> 'The :attribute is required',
        ];

        if($request->hasFile('photo')){
            $fields=[ 'photo'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $message=['photo.required'=>'Photo is required'];
        }

        $this->validate($request,$fields,$message);

        $data=request()-> except('_token');

        if($request->hasFile('photo')){
            $data['photo']=$request->file('photo')->store('uploads','public');
        }

        Empleado::insert($data);
        //return response()->json($data);
        return redirect('employee')->with('message','Employee successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee=Empleado::findOrFail($id);
        return view('empleado.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=request()-> except(['_token','_method']);
        Empleado::where('id','=',$id)->update($data);

        if($request->hasFile('photo')){
            $employee=Empleado::findOrFail($id);
            Storage::delete('public/'.$employee->photo);
            $data['photo']=$request->file('photo')->store('uploads','public');
        }    

        $employee=Empleado::findOrFail($id);
        //return view('empleado.edit',compact('employee'));
        return redirect('employee')->with('message','Employee edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee=Empleado::findOrFail($id);
        if(Storage::delete('public/'.$employee->photo)){
            Empleado::destroy($id);
        }

       // return redirect('employee');
       return redirect('employee')->with('message','Employee successfully deleted');

    }

    public function form(){
        return view("empleado.form");
    }
}
