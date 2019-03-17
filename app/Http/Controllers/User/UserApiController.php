<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\User;
use DB;
class UserApiController extends Controller{

    /**
     * @method método para poder hacer el login del usuario y traer informacion del usuario
     * */    
    function userlogin(){
    
        $data = json_decode(file_get_contents('php://input'), true);
    
        $user = User::where('email', $data['email'])->where('password',$data['password'])->first();
        if(isset($user->id) && is_numeric($user->id) ){
            $user->boss_name = "";
            $user->boss_role =  "";
            if(isset($user->number_boss) && is_numeric($user->number_boss)){
                $boss = User::where('employee_number', $user->number_boss)->first();
                $user->boss_name =$boss->name.' '.$boss->last_name_one.' '.$boss->last_name_two;
                $user->boss_role =  $boss->role;
            }
            if($user->role !== "Ejecutivo Comercial"){
                $sales = 0;
                // se trae a empleados que lo tiene como jefe
                $userEmployees = User::where('number_boss',$user->employee_number)->get();
                foreach($userEmployees as $userEmployee){
                    if($userEmployee!= null){
                        $sales += $userEmployee->sales;
                    }
                    // se trae emplados de quien es jefe pero tambien es jefe y así sucesivamente
                    $userMiniors = User::where('number_boss',$userEmployee->employee_number)->get();
                    while(count($userMiniors) > 0){
                        foreach($userMiniors as $userMini){
                            if($userEmployee!= null){
                                $sales += $userMini->sales;
                            }
                        }
                        $userMiniors = User::where('number_boss',$userMini->employee_number)->get();
                    }
                }

                $user->sales = $sales;
            }
            $user->sales = "$".number_format($user->sales, 0,',','.');
            return response(["success" => true, "msg" => "Usuario encontrado satisfactoriamente", "data" => $user])
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');    
        }
        return response(["success" => false, "msg" => "Usuario no encontrado", "data" => null])
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*');    
    }

    /**
     * @method Métdo para traer los subalternos en caso de tenerlos
     * 
    */
    function getSubalerns(){
        $data = json_decode(file_get_contents('php://input'), true);
        
    }

    public function getInfoUser(){

    }

    



}