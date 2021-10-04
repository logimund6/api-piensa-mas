<?php

namespace App\Http\Controllers;

use App\Models\escenario;
use Illuminate\Http\Request;
use Validator;
class EscenarioController extends Controller
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

     public function insertaescenario(Request $request){
        $validator =  Validator::make($request->all(),[
                'titulo' => 'required|string|max:255',
                'nivel' => 'required|string|max:255',
                'educacion' => 'required|string|max:255',
                'tema' => 'required|string|max:255',
                'palabras_clave' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'idusuario'=> 'required|string|max:255',
                'ruta'=>'required|string|max:255',
                'nombre'=>'required|string|max:255',
                'correo'=>'required|string|max:255'
        ]);

        
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = escenario::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
    public function getescenarios($id) {
        //$obten=escenario::all()->where( 'idusuario', '=', $id);  
        $obten=escenario::where('idusuario', '=', $id)->get();
        return $obten;  
    }
    public function getescenariosall() {
        $obten=escenario::where( 'estado', '=', 'f')->get(); 
        return $obten;  
    }

    
    public function updatefase(Request $request, $id)
    {
        try {
    
            $patientData = $request->all();
            $usu= escenario::find($id);  
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
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function show(escenario $escenario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function edit(escenario $escenario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, escenario $escenario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(escenario $escenario)
    {
        //
    }
}
