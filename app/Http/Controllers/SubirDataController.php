<?php

namespace App\Http\Controllers;

use App\Models\subir_data;
use Illuminate\Http\Request;
use Validator;
class SubirDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function subirarchivo(Request $request,$id){
        if($request->hasFile('file')){
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $name_file=str_replace(" ","_",$filename);
            $extension=$file->getClientOriginalExtension();
            $picture=$name_file.'.'.$extension;
            $file->move(public_path('Files/'),$picture);
            return response()->json(["mensaje"=>"carga correcta"]) ;

            

        }else{
            return response()->json(["mensaje"=>"carga incorrecta"]) ;
        }
    }
    public function subirbanco(Request $request,$id){
        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ruta' => 'required|string|max:255',
     
            ]);        
            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ]);
            }
            try{
        
                $user = subir_data::create($request->all());
                return response()->json(['status','registered exitoso'],200);
            
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "No fue registrado",
                    "message" => "No fue posible registrar el usuario"
                ]);
            }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subir_data  $subir_data
     * @return \Illuminate\Http\Response
     */
    public function show(subir_data $subir_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subir_data  $subir_data
     * @return \Illuminate\Http\Response
     */
    public function edit(subir_data $subir_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subir_data  $subir_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subir_data $subir_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subir_data  $subir_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(subir_data $subir_data)
    {
        //
    }
}
