<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\tabla_archivo;
use Illuminate\Http\Request;

class TablaArchivoController extends Controller
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
    public function insertarchivo(Request $request){
        $validator =  Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'autor' => 'required|string|max:255',
                'palabrasclave' => 'required|string|max:255',
                'tematica' => 'required|string|max:255',
                'tipo_cat' => 'required|string|max:255',
                'op_disponible' => 'required|string|max:255',
                'estatus'=> 'required|string|max:255',
                'id_admin'=> 'required|string|max:255',
                'id_archivo'=> 'required|string|max:255',
        ]);
        
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ]);
        }
        try{
    
            $user = tabla_archivo::create($request->all());
            return response()->json(['status','registered exitoso'],200);
        
        }
        catch(Exception $e){
            return response()->json([
                "error" => "No fue registrado",
                "message" => "No fue posible registrar el usuario"
            ]);
        }
    }
  
    public function getmibancoA($id){
        $usermit =tabla_archivo::select('tabla_archivos.id','tabla_archivos.name','tabla_archivos.descripcion','tabla_archivos.autor','tabla_archivos.palabrasclave','tabla_archivos.tipo_cat','subir_archivos.tipoarchivo')->where( [['idusuario', '=', $id],
        ['op_disponible','=','2'],])->join('subir_archivos', 'subir_archivos.id', '=', 'tabla_archivos.id_archivo')->get();
        return $usermit;  
    }
    public function getmibancoC($id){
        $usermit =tabla_archivo::select('tabla_archivos.id','tabla_archivos.name','tabla_archivos.descripcion','tabla_archivos.autor','tabla_archivos.palabrasclave','tabla_archivos.tipo_cat','subir_archivos.tipoarchivo')->where( [['tabla_archivos.idusuario', '=', $id],
        ['op_disponible','=','3'],])->join('subir_archivos', 'subir_archivos.id', '=', 'tabla_archivos.id_archivo')->get();
        return $usermit;  
    }
    public function getmibancoR(){
        $usermit =tabla_archivo::select('tabla_archivos.id','tabla_archivos.name','tabla_archivos.descripcion','tabla_archivos.autor','tabla_archivos.palabrasclave','tabla_archivos.tipo_cat','subir_archivos.tipoarchivo')->where('op_disponible','=','1')->join('subir_archivos', 'subir_archivos.id', '=', 'tabla_archivos.id_archivo')->get();
        return $usermit;  
    }

    public function getaudios(){
        $usermit =tabla_archivo::select('tabla_archivos.id','tabla_archivos.name','tabla_archivos.descripcion','tabla_archivos.autor','tabla_archivos.palabrasclave','tabla_archivos.tipo_cat','subir_archivos.tipoarchivo','subir_archivos.ruta_archivo')->where([['op_disponible','=','3'],['subir_archivos.tipoarchivo','=','Audio']]
        )->join('subir_archivos', 'subir_archivos.id', '=', 'tabla_archivos.id_archivo')->get();
        return $usermit;  
    }
    public function getmibancoP($id){
        $usermit =tabla_archivo::select('tabla_archivos.id','tabla_archivos.name','tabla_archivos.descripcion','tabla_archivos.autor','tabla_archivos.palabrasclave','tabla_archivos.tipo_cat','subir_archivos.tipoarchivo')->where( [['idusuario', '=', $id],
        ['op_disponible','=','0'],])->join('subir_archivos', 'subir_archivos.id', '=', 'tabla_archivos.id_archivo')->get();
        return $usermit;  
    }

    public function updatebanco(Request $request, $id)
    {
        try {
    
            $patientData = $request->all();
            $usu= tabla_archivo::find($id);  
            if($usu == null){
                $return = ['data' => ['msg' => 'No existe el banco dado']];
                return response()->json($return, 404);
            }
            $usu->update($patientData);
            $return = ['data' => ['msg' => 'banco actualizado!']];
            return response()->json($return, 201);
            
    
    
        } catch (Exception $e) {
            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
            }
            return response()->json(ApiError::errorMessage('There was an error performing the update operation', 1011), 500);
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
     * @param  \App\Models\tabla_archivo  $tabla_archivo
     * @return \Illuminate\Http\Response
     */
    public function show(tabla_archivo $tabla_archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tabla_archivo  $tabla_archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(tabla_archivo $tabla_archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tabla_archivo  $tabla_archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tabla_archivo $tabla_archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tabla_archivo  $tabla_archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(tabla_archivo $tabla_archivo)
    {
        //
    }
}
