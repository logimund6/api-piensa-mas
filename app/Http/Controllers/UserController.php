<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\cat_universidade;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }
  //obtiene usuario

  public function login(Request $request)
  {
      $request->validate([
          'email' => 'required|string|email',
          'password' => 'required|string',
          'remember_me' => 'boolean',
      ]);

      $credentials = request(['email', 'password']);

      if (!Auth::attempt($credentials)) {
          return response()->json([
              'message' => 'Unauthorized'
          ], 401);
      }
      $user = $request->user();

      $tokenResult = $user->createToken('Personal Access Token ' . Str::random(10));

      $token = $tokenResult->token;

      if ($request->remember_me) {
          $token->expires_at = Carbon::now('America/Mexico_City')->addMinute(1);
      }

      $token->save();

      return response()->json([
          'access_token' => $tokenResult->accessToken,
          'token_type' => 'Bearer',
          'expires_at' => Carbon::parse(
              $tokenResult->token->expires_at)
              ->toDateTimeString(),
      ]);
  }

    public function getUsuario($id) {
        $obten=User::find($id);  
        if($obten == null){
            $obten=response()->json(['error 400'=>'No existe un registro con el id dado']);
        }else{
        }
        return $obten;  
    }

    //borra usuario
    public function borrausuario($id){
        $obten=User::find($id);  
        if($obten == null){
            $obten=response()->json(['error 400'=>'No existe un registro con el id dado']);
        }else{
            User::destroy($id);
            $obten=response()->json([
                'res'=>true,
                'message'=>'Registro borrado correcto'
            ]);
    
        }
        return $obten;
    }
 
//insertar usuario
public function insertusuario(Request $request){
    $validator =  Validator::make($request->all(),[
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:6',
    'apellido_pat'=>'required|string',
    'apellido_mat'=>'required|string',
    'edad'=>'integer',
    'genero'=>'integer',
    'entidad'=>'integer',
    'pais'=>'integer',
    'experiencia_anios'=>'integer',
    'nivel_cine'=>'integer',
    'disciplina'=>'integer',
    'universidad'=>'string',
    'periodo_escolar'=>'integer',
    'periodo'=>'integer',
    'tipo_usuario'=>'required',
    ]);

   

    if($validator->fails()){
        return response()->json([
            "error" => 'validation_error',
            "message" => $validator->errors(),
        ]);
    }

    $request->merge(['password' => Hash::make($request->password)]);

    try{
        $usermit =cat_universidade::where('code', '=', $request->universidad)->get();
       if($usermit->isEmpty()){
        $user = cat_universidade::create([
            'code' =>$request->universidad ,
            'descripcion' =>'empty' ,
            'idpais'=>$request->pais,
            'estado' =>'I' ,
        ]);
        $user = User::create($request->all());
        return response()->json(['status','se registro un nuevo usuairo y una nueva universidad'],200);
       
        
  
    }else{
        $user = User::create($request->all());
        return  response()->json(['status','se registro un nuevo usuairo '],200);
    }

        
        
       
    
    }
    catch(Exception $e){
        return response()->json([
            "error" => "No fue registrado",
            "message" => "No fue posible registrar el usuario"
        ]);
    }
}


//actualiza uni
public function updateuni(Request $request, $id)
{
    try {

        $patientData = $request->all();
        $usu= cat_universidade::find($id);  
        if($usu == null){
            $return = ['data' => ['msg' => 'No existe la universidad dada']];
            return response()->json($return, 404);
        }
        $usu->update($patientData);
        $return = ['data' => ['msg' => 'Universidad actualizada exitosamente!']];
        return response()->json($return, 201);
        


    } catch (Exception $e) {
        if(config('app.debug')) {
            return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
        }
        return response()->json(ApiError::errorMessage('There was an error performing the update operation', 1011), 500);
    }
}

//OBTIENE LOS USUARIOS 
public function getusuarios() {
    $obten=User::all();  
    return $obten;  
}
//OBTIENE LOS USUARIOS POR FILTRO
public function getusuariosfiltro($id) {
    $usermit =User::where('tipo_usuario', '=', $id)->get();
    return $usermit;  
}

//obtiene todas las universidades
    public function getUnis() {
        $obten=cat_universidade::all();  
        return $obten;  
    }
    //OBTIENE LOS USUARIOS POR FILTRO
public function getunifiltro($id) {
    $usermit =cat_universidade::where('estado', '=', $id)->get();
    return $usermit;  
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
