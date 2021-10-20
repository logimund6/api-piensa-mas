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
            return $user;
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
    public function getescenarios($id) {
        $obten=escenario::all()->where( 'idusuario', '=', $id);  
        return $obten;  
    }

    public function getescenario($id) {
        $obten=escenario::where( 'id', '=', $id)->get(); 
        return $obten;  
    }

    public function getescenariosall() {
        $obten=escenario::where( 'estado', '=', 'f')->orWhere('estado', '=', 'r')->orWhere('estado', '=', 'a')->get(); 
        return $obten;  
    }


    public function getescenariosallf($var) {
        if($var=='f1'){
            $obten=escenario::where( 'estado', '=', 'f')->orWhere('estado', '=', 'r')->orWhere('estado', '=', 'a')->orderBy('created_at', 'desc')->get(); 
        }
        if($var=='f2'){
            $obten=escenario::where( 'estado', '=', 'f')->orWhere('estado', '=', 'r')->orWhere('estado', '=', 'a')->orderBy('created_at', 'asc')->get(); 
        }
        if($var=='0'){
            $obten=escenario::where( 'estado', '=', 'f')->orWhere('estado', '=', 'r')->orWhere('estado', '=', 'a')->orderBy('created_at', 'asc')->get(); 
        }
        $obten=escenario::where( 'estado', '=', 'f')->orWhere('estado', '=', 'r')->orWhere('estado', '=', 'a')->get(); 
        return $obten;  
    }

    public function getescenariosf($id,$var,$op) {

        if($var=='f1'){
             
            if($op=='0'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '0g0']])->orWhere( [['idusuario', '=', $id],['estado', '=', '0']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='1'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '1g1']])->orWhere( [['idusuario', '=', $id],['estado', '=', '1']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='2'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '2g2']])->orWhere( [['idusuario', '=', $id],['estado', '=', '2']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='3'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '3g3']])->orWhere( [['idusuario', '=', $id],['estado', '=', '3']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='4'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '4g4']])->orWhere( [['idusuario', '=', $id],['estado', '=', '4']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='a'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'a']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='r'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'r']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='f'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'f']])->orderBy('created_at', 'desc')->get();            
             }
             if($op=='100'){
                $obten=escenario::where('idusuario', '=', $id)->orderBy('created_at', 'desc')->get();            
             }
          
       
            }
        if($var=='f2'){
            if($op=='0'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '0g0']])->orWhere( [['idusuario', '=', $id],['estado', '=', '0']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='1'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '1g1']])->orWhere( [['idusuario', '=', $id],['estado', '=', '1']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='2'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '2g2']])->orWhere( [['idusuario', '=', $id],['estado', '=', '2']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='3'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '3g3']])->orWhere( [['idusuario', '=', $id],['estado', '=', '3']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='4'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '4g4']])->orWhere( [['idusuario', '=', $id],['estado', '=', '4']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='a'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'a']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='r'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'r']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='f'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'f']])->orderBy('created_at', 'asc')->get();            
             }
             if($op=='100'){
                $obten=escenario::where('idusuario', '=', $id)->orderBy('created_at', 'asc')->get();            
             } 
        }
        if($var=='100'){
            if($op=='0'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '0g0']])->orWhere( [['idusuario', '=', $id],['estado', '=', '0']])->get();            
             }
             if($op=='1'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '1g1']])->orWhere( [['idusuario', '=', $id],['estado', '=', '1']])->get();            
             }
             if($op=='2'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '2g2']])->orWhere( [['idusuario', '=', $id],['estado', '=', '2']])->get();            
             }
             if($op=='3'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '3g3']])->orWhere( [['idusuario', '=', $id],['estado', '=', '3']])->get();            
             }
             if($op=='4'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', '4g4']])->orWhere( [['idusuario', '=', $id],['estado', '=', '4']])->get();            
             }
             if($op=='a'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'a']])->get();            
             }
             if($op=='r'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'r']])->get();            
             }
             if($op=='f'){
                $obten=escenario::where( [['idusuario', '=', $id],['estado', '=', 'f']])->get();            
             }
             if($op=='100'){
                $obten=escenario::where('idusuario', '=', $id)->get();            
             } 
        }
   

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
