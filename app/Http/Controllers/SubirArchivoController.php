<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\subir_archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SubirArchivoController extends Controller
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

    public function subirarchivo(Request $request,$tip,$id){
        if($request->hasFile('file')){
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $name_file=str_replace(" ","_",$filename);
            $extension=$file->getClientOriginalExtension();
            $tipofile=$file->getMimeType();
            $ldate = date('Y-m-d');
            $d=rand(10000000,99999999);
            $picture=$ldate.'_'.$d.'.'.$extension;
           
            if (strpos($tipofile, 'pdf') !== false) {
                $file->move(public_path('Pdf/'),$picture);
                $tipofile='pdf';    
            }else if(strpos($tipofile, 'application') !== false){
                $file->move(public_path('Documentostexto/'),$picture);   
                $tipofile='Documento';   
            }else if(strpos($tipofile, 'audio') !== false || $extension=='mp3' || $extension=='m4a' || $extension=='wma' || $extension=='wav' ){
                $file->move(public_path('Audio/'),$picture);   
                $tipofile='Audio';   
            }else if(strpos($tipofile, 'video') !== false){
                $file->move(public_path('Video/'),$picture);  
                $tipofile='Video';    
            }else if(strpos($tipofile, 'image') !== false){
                $file->move(public_path('Imagen/'),$picture);
                $tipofile='Imagen';      
            }else{
                $file->move(public_path('Files/'),$picture);   
                $tipofile='Otro';   
            }

            
            $ruta='public/'.$tipofile.'/'.$picture;

            $user = subir_archivo::create([
                'name' =>$picture ,
                'tipoarchivo' =>$tipofile,
                'tipocat'=>$tip,
                'id_usuario' =>$id ,
                'ruta_archivo' => $ruta,
            ]);
         

            return $user ;

            

        }else{
            return response()->json(["mensaje"=>"carga incorrecta"]) ;
        }
    }

    public function subirarchivoimg(Request $request){
        if($request->hasFile('file')){
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $name_file=str_replace(" ","_",$filename);
            $extension=$file->getClientOriginalExtension();
            $tipofile=$file->getMimeType();
            $ldate = date('Y-m-d');
            $d=rand(10000000,99999999);
            $picture='imgesce'.$d.'.'.$extension;
  
            $tipofile='Imagenesce';      
          
            $file->move(public_path('Imagenesce/'),$picture); 
            
            $ruta='public/'.$tipofile.'/'.$picture;

            return $ruta ;

            

        }else{
            
            return 'public/Imagenesce/def.jpg' ;
        }
    }
  
    public function subirarchivoaudio(Request $request,$id){
        if($request->hasFile('file')){
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $name_file=str_replace(" ","_",$filename);
            $extension=$file->getClientOriginalExtension();
            $tipofile=$file->getMimeType();
            $ldate = date('Y-m-d');
            $d=rand(10000000,99999999);
            $picture='imgesce'.$d.'.'.$extension;
            $tipofile='Audioesce';      
            $file->move(public_path('Audioesce/'),$picture); 

           if( $id=='s'){

           }else{
            unlink(public_path('Audioesce/'.$id));
          
         
    
           }

            
            
            $ruta=$picture;

            return $ruta ;

            

        }else{
            
            return '' ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subir_archivo  $subir_archivo
     * @return \Illuminate\Http\Response
     */
    public function show(subir_archivo $subir_archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subir_archivo  $subir_archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(subir_archivo $subir_archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subir_archivo  $subir_archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subir_archivo $subir_archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subir_archivo  $subir_archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(subir_archivo $subir_archivo)
    {
        //
    }
}
