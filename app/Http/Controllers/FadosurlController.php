<?php

namespace App\Http\Controllers;

use App\Models\fadosurl;
use Illuminate\Http\Request;
use Validator;
class FadosurlController extends Controller
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
    public function insertafadosurl(Request $request){
        $validator =  Validator::make($request->all(),[
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'url' => 'required|string|max:255',
                'idescenario' => 'required|string|max:255',
                'parte' => 'required|string|max:255',
        ]);
     
 
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = fadosurl::create($request->all());
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
     * @param  \App\Models\fadosurl  $fadosurl
     * @return \Illuminate\Http\Response
     */
    public function show(fadosurl $fadosurl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fadosurl  $fadosurl
     * @return \Illuminate\Http\Response
     */
    public function edit(fadosurl $fadosurl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fadosurl  $fadosurl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fadosurl $fadosurl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fadosurl  $fadosurl
     * @return \Illuminate\Http\Response
     */
    public function destroy(fadosurl $fadosurl)
    {
        //
    }
}
