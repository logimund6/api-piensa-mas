<?php

namespace App\Http\Controllers;

use App\Models\escecoment;
use Illuminate\Http\Request;
use Validator;
class EscecomentController extends Controller
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

    public function insertacomesce(Request $request){
        $validator =  Validator::make($request->all(),[
                'idescenario' => 'required|string|max:255',
                'comentario' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'idadmin'=>'required|string|max:255',
             
        ]);

        
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = escecoment::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
    public function getcomentid($id) {
        $obten=escecoment::where([['comentario', '!=' , 'no data'],['idescenario', '=', $id]] )->orderBy('created_at', 'desc')->get(); 
        return $obten;  
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
     * @param  \App\Models\escecoment  $escecoment
     * @return \Illuminate\Http\Response
     */
    public function show(escecoment $escecoment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\escecoment  $escecoment
     * @return \Illuminate\Http\Response
     */
    public function edit(escecoment $escecoment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escecoment  $escecoment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, escecoment $escecoment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escecoment  $escecoment
     * @return \Illuminate\Http\Response
     */
    public function destroy(escecoment $escecoment)
    {
        //
    }
}
