<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\User;
class UserApiController extends Controller{

    /**
     * @method Función que obtiene la información de un usuario
     * */    
    function create(){
    
        echo "hola";
    }

    function userlogin(){
    
        $data = json_decode(file_get_contents('php://input'), true);
        $user = User::where('email', $data['email'])->where('password',$data['password'])->first();
        if(isset($user->id) && is_numeric($user->id) ){
            return ["success" => false, "msg" => "Usuario no encontrado", "data" => null];
        }
        return ["success" => true, "msg" => "Usuario encontrado satisfactoriamente", "data" => $user->name];

    }

    



}