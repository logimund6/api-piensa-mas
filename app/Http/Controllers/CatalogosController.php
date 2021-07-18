<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\cat_universidade;

use App\Models\cat_disciplina;
use App\Models\cat_entidad;
use App\Models\cat_niveleducativo;
use App\Models\cat_paises;
use DB;

use App\Models\catalogos;
use Illuminate\Http\Request;

class CatalogosController extends Controller
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
     * @param  \App\Models\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function show(catalogos $catalogos)
    {
        //
    }
    public function obtencatalogo($op,$tipo)
    {
    
        switch ($op) {
            case 6:
                $value=cat_disciplina::select('id','descripcion')->orderBy('id', 'ASC')->get();
                break;
            case 1:
                $value=cat_paises::select('id','descripcion')->orderBy('id', 'ASC')->get();
               
                break;
            case 2:
                $value=cat_universidade::select('id','code')->orderBy('id', 'ASC')->get();
               
                break;
            case 3:
                $value=cat_entidad::select('id','descripcion')->where('codeUniversidad', '=', $tipo)->orderBy('id', 'ASC')->get();

                break;
            case 4:
                $value=cat_niveleducativo::select('id','descripcion')->orderBy('id', 'ASC')->get();

                break;
    
             case 7:
                $value=cat_universidade::select('id','descripcion')->where('estado', '=', 'A')->orderBy('id', 'ASC')->get();

                break;
            case 8:
                $value=cat_entidad::select('id','descripcion')->orderBy('id', 'ASC')->get();

                break;

            default:
            $value=response()->json(['status','No exite una opcion para el dato dado'],200);
    
                
 
        }
        return $value;
    }
public function catalogosuno(){
    $datos=cat_universidade::select('cat_universidades.id',
    'cat_universidades.code',
    'cat_universidades.descripcion',
    'cat_paises.descripcion', 
    DB::raw('(CASE WHEN cat_universidades.estado="A" THEN "Activo"  WHEN cat_universidades.estado="I" THEN "Inactivo" END) AS estado'))
    ->join('cat_paises', 'cat_universidades.idpais', '=', 'cat_paises.id')
    ->get();
    return $datos;
}
public function catalogosdos($id){
    if($id=='A' || $id=='I'){
        $datos=cat_universidade::select('cat_universidades.id',
        'cat_universidades.code',
        'cat_universidades.descripcion',
        'cat_paises.descripcion', 
        DB::raw('(CASE WHEN cat_universidades.estado="A" THEN "Activo"  WHEN cat_universidades.estado="I" THEN "Inactivo" END) AS estado'))
        ->join('cat_paises', 'cat_universidades.idpais', '=', 'cat_paises.id')
        ->where('cat_universidades.estado', '=', $id)
        ->get();
        return $datos;
    }else if($id==0){
        $datos=cat_universidade::select('cat_universidades.id',
        'cat_universidades.code',
        'cat_universidades.descripcion',
        'cat_paises.descripcion', 
        DB::raw('(CASE WHEN cat_universidades.estado="A" THEN "Activo"  WHEN cat_universidades.estado="I" THEN "Inactivo" END) AS estado'))
        ->join('cat_paises', 'cat_universidades.idpais', '=', 'cat_paises.id')
        ->get();
        return $datos;
            
          
    }else{
        return response()->json(['error','No exite un tipo para ese valor'],200);
    }

 

}
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function edit(catalogos $catalogos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catalogos $catalogos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function destroy(catalogos $catalogos)
    {
        //
    }
}
