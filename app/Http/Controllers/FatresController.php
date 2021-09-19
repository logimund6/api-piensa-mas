<?php

namespace App\Http\Controllers;

use App\Models\fatres;
use Illuminate\Http\Request;
use Validator;
class FatresController extends Controller
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
    public function insertafatres(Request $request,$id){
        $validator =  Validator::make($request->all(),[
                'fa3p1' => 'required|string|max:255',
                'fa3p2_1' => 'required|string|max:255',
                'fa3p2_2' => 'required|string|max:255',
                'fa3p2_3' => 'required|string|max:255',
                'fa3p2_4' => 'required|string|max:255',
                'fa3p2_5' => 'required|string|max:255',
                'fa3p3_1' => 'required|string|max:255',
                'fa3p3_2' => 'required|string|max:255',
                'fa3p3_3' => 'required|string|max:255',
                'fa3p3_4' => 'required|string|max:255',
                'fa3p3_5' => 'required|string|max:255',
                'idescenario' => 'required|string|max:255',
        ]);
   
 
        $usermit =fatres::where('idescenario', '=', $id)->get();
        if(count($usermit)==0){
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = fatres::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }}else{
            $patientData = $request->all();
            fatres::where('idescenario', '=', $id)->update($patientData);
  
            $return = ['data' => ['msg' => 'fase 3 actualizada exitosamente!']];
            return response()->json($return, 201) ;
        }
    }

    public function getfatresfiltro($id) {

        $usermit =fatres::where('idescenario', '=', $id)->get();
        return $usermit;  
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
     * @param  \App\Models\fatres  $fatres
     * @return \Illuminate\Http\Response
     */
    public function show(fatres $fatres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fatres  $fatres
     * @return \Illuminate\Http\Response
     */
    public function edit(fatres $fatres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fatres  $fatres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fatres $fatres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fatres  $fatres
     * @return \Illuminate\Http\Response
     */
    public function destroy(fatres $fatres)
    {
        //
    }
}
