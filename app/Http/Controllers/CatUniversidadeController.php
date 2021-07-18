<?php

namespace App\Http\Controllers;

use App\Models\cat_universidade;
use Illuminate\Http\Request;

class CatUniversidadeController extends Controller
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
     //obtiene uni
  public function getUni($id) {
    $obten=cat_universidade::find($id);  
    if($obten == null){
        $obten=response()->json(['error 400'=>'No existe un registro con el id dado']);
    }else{
    }
    return $obten;  
}

  //borra universidad
    public function borrauni($id){
        $obten=cat_universidade::find($id);  
        if($obten == null){
            $obten=response()->json(['error 400'=>'No existe un registro con el id dado']);
        }else{
            cat_universidade::destroy($id);
            $obten=response()->json([
                'res'=>true,
                'message'=>'Registro borrado correcto'
            ]);
    
        }
        return $obten;
    }

    public function insertuni(Request $request){
        $validator =  Validator::make($request->all(),[
        'code' => 'required|string|max:255',
        'idpais'=>'integer',
        ]);
    
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = cat_universidade::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
    
    //actualiza usuario
    public function updateusu(Request $request, $id)
    {
        try {
    
            $patientData = $request->all();
            $usu= User::find($id);  
            if($usu == null){
                $return = ['data' => ['msg' => 'No existe el usuario']];
                return response()->json($return, 404);
            }
            $usu->update($patientData);
            $return = ['data' => ['msg' => 'Usuario actualizado exitosamente!']];
            return response()->json($return, 201);
            
    
    
        } catch (Exception $e) {
            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
            }
            return response()->json(ApiError::errorMessage('There was an error performing the update operation', 1011), 500);
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
     * @param  \App\Models\cat_universidade  $cat_universidade
     * @return \Illuminate\Http\Response
     */
    public function show(cat_universidade $cat_universidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cat_universidade  $cat_universidade
     * @return \Illuminate\Http\Response
     */
    public function edit(cat_universidade $cat_universidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cat_universidade  $cat_universidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cat_universidade $cat_universidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cat_universidade  $cat_universidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(cat_universidade $cat_universidade)
    {
        //
    }
}
