<?php

namespace App\Http\Controllers;

use App\Models\fauno;
use Illuminate\Http\Request;
use Validator;
class FaunoController extends Controller
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
    public function insertafauno(Request $request,$id){
        $validator =  Validator::make($request->all(),[
                'fa1p1' => 'required|string|max:255',
                'fa1p2' => 'required|string|max:255',
                'idescenario' => 'required|string|max:255',
        ]);
     

        $usermit =fauno::where('idescenario', '=', $id)->get();
        if(count($usermit)==0){
            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ]);
            }
            try{
        
    
                $user = fauno::create($request->all());
                return response()->json(['status','registered exitoso'],200);
            
            }
            catch(Exception $e){
                return response()->json([
                    "error" => "No fue registrado",
                    "message" => "No fue posible registrar el usuario"
                ]);
            }
        }else{
            $patientData = $request->all();
            fauno::where('idescenario', '=', $id)->update($patientData);
  
            $return = ['data' => ['msg' => 'fase 1 actualizada exitosamente!']];
            return response()->json($return, 201) ;
            
        }
        
        
    }
    public function getfaunofiltro($id) {

        $usermit =fauno::where('idescenario', '=', $id)->get();
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
     * @param  \App\Models\fauno  $fauno
     * @return \Illuminate\Http\Response
     */
    public function show(fauno $fauno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fauno  $fauno
     * @return \Illuminate\Http\Response
     */
    public function edit(fauno $fauno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fauno  $fauno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fauno $fauno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fauno  $fauno
     * @return \Illuminate\Http\Response
     */
    public function destroy(fauno $fauno)
    {
        //
    }
}
