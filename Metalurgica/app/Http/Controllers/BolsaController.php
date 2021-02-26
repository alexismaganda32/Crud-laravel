<?php

namespace App\Http\Controllers;

use App\Bolsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BolsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['bolsa']=Bolsa::paginate(1);
        return view('bolsa.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bolsa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'CorreoElectronico'=>'required|email',
            'Habilidades'=>'required|string|max:100',
            'Foto'=>'required|max:1000|mimes:jpeg,png,jpg'

        ];
        $mensaje=[
            'required'=>'El :attributo es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        $this->validate($request,$campos,$mensaje);


        //$datosBolsa = request()->all();
        $datosBolsa = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosBolsa['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Bolsa::insert($datosBolsa);
        //return response()->json($datosBolsa);
        return redirect('bolsa')->with('mensaje','Empleado agregado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function show(Bolsa $bolsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bolsa = Bolsa::findOrFail($id);
        return view('bolsa.edit',compact('bolsa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'CorreoElectronico'=>'required|email',
            'Habilidades'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attributo es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        //
        $datosBolsa = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $bolsa = Bolsa::findOrFail($id);
            Storage::delete('public/'.$bolsa->Foto);
            $datosBolsa['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Bolsa::where('id','=',$id)->update($datosBolsa);
        $bolsa = Bolsa::findOrFail($id);
        //return view('bolsa.edit',compact('bolsa'));
        return redirect('bolsa')->with('mensaje','Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bolsa = Bolsa::findOrFail($id);
        if(Storage::delete('public/'.$bolsa->Foto)){
            Bolsa::destroy($id);
        }
        
        return redirect('bolsa')->with('mensaje','Empleado Borrado');
    }
}
