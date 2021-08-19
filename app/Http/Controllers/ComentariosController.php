<?php

namespace App\Http\Controllers;

use App\Models\comentarios;
use Illuminate\Http\Request;
use Validator;
class ComentariosController extends Controller
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
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentarios $comentarios)
    {
        //
    }
    public function insercoment(Request $request){
        $validator =  Validator::make($request->all(),[
        'comadmin' => 'required|string',
        'idarchivo' => 'required|string|max:255'
        ]);
    
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = comentarios::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
    public function getcoments() {
        $obten=comentarios::all();  
        return $obten;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentarios $comentarios)
    {
        //
    }
}
