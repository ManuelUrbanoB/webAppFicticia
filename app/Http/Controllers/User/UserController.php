<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * @function función para lstar a los usuarios
     *
     */
    public function index()
    {
        $users = User::get();
        return view('user.list', ['users' => $users]);
    }

    /**
     * @function función para lstar a los usuarios
     * 
    */
    public function list()
    {
        $users = User::get();
        return view('user.list', ['users' => $users]);
    }

    public function create(){

        $users = User::where('role','!=','Ejecutivo Comercial')->get();
        return view('user.create',['users' => $users]);
    }

    public function store(UserRequest $request){
        try{
            $user = new User();
            $user->name = $request->name;
            $user->last_name_one = $request->last_name_one;
            $user->last_name_two = $request->last_name_two;
            $user->cc_user = $request->cc_user;
            $user->born_date = $request->born_date;
            $user->gender = $request->gender;
            $user->entry_date = $request->entry_date;
            $user->employee_number = $request->employee_number;
            $user->role = $request->role;
            $user->zone = $request->zone;
            $user->number_boss = $request->number_boss;
            $user->municipality = $request->municipality;
            $user->department = $request->department;
            $user->sales = $request->sales;
            $user->email = $request->email;
            $user->cel_phone = $request->cel_phone;
            $user->password = $request->password;
            $user->url_img = $request->url_img;
            if($user->save()){
                return Redirect::to('/user');
            }else{
                Session::flash('message','Hubo un error al guardar usuario');
                return Redirect::to('/user');
            }


        }catch (\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/user');
        }
    }

    public function editUser($id){
        $users = User::where('role','!=','Ejecutivo Comercial')->get();
        $user = User::find($id);
        return view('user.edit',['users' => $users, 'user'=>$user]);
    }

    public function updateUser(UserRequest $request, $id){
        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->last_name_one = $request->last_name_one;
            $user->last_name_two = $request->last_name_two;
            $user->cc_user = $request->cc_user;
            $user->born_date = $request->born_date;
            $user->gender = $request->gender;
            $user->entry_date = $request->entry_date;
            $user->employee_number = $request->employee_number;
            $user->role = $request->role;
            $user->zone = $request->zone;
            $user->number_boss = $request->number_boss;
            $user->municipality = $request->municipality;
            $user->department = $request->department;
            $user->sales = $request->sales;
            $user->email = $request->email;
            $user->cel_phone = $request->cel_phone;
            if($request->password != null){
                $user->password = $request->password;
            }
            $user->url_img = $request->url_img;
            if($user->save()){
                return Redirect::to('/user');
            }else{
                return Redirect::to('/user');
            }
        }catch(\Exception $e){

            return Redirect::to('/user');
        }
    }

    public function destroyUser($id){
        try{
            User::find($id)->delete();
            return Redirect::to('/user');
        }catch(\Exception $e){
            Session::flash('message','No se pudo conectar a base de datos');
            return Redirect::to('/user');
        }
    }


}