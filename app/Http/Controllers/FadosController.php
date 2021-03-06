<?php

namespace App\Http\Controllers;

use App\Models\fados;
use Illuminate\Http\Request;
use Validator;
class FadosController extends Controller
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
    public function insertafados(Request $request,$id){
        $validator =  Validator::make($request->all(),[
                'fa2p1' => 'required|string|max:255',
                'fa2p2' => 'required|string|max:255',
                'fa2p3_1' => 'required|string|max:255',
                'fa2p3_2' => 'required|string|max:255',
                'fa2p3_3' => 'required|string|max:255',
                'fa2p3_4' => 'required|string|max:255',
                'fa2p3_5' => 'required|string|max:255',
                'fa2p3_6' => 'required|string|max:255',
                'fa2p3_7' => 'required|string|max:255',
                'idescenario' => 'required|string|max:255',
        ]);
 
        $usermit =fados::where('idescenario', '=', $id)->get();
        if(count($usermit)==0){
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = fados::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }}else{
            $patientData = $request->all();
            fados::where('idescenario', '=', $id)->update($patientData);
  
            $return = ['data' => ['msg' => 'fase 2 actualizada exitosamente!']];
            return response()->json($return, 201) ;
        }
    }

    public function getfadosfiltro($id) {

        $usermit =fados::where('idescenario', '=', $id)->get();
        return $usermit;  
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
     * @param  \App\Models\fados  $fados
     * @return \Illuminate\Http\Response
     */
    public function show(fados $fados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fados  $fados
     * @return \Illuminate\Http\Response
     */
    public function edit(fados $fados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fados  $fados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fados $fados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fados  $fados
     * @return \Illuminate\Http\Response
     */
    public function destroy(fados $fados)
    {
        //
    }
}
