@extends('layouts.principal')
@section('head')
@endsection
@section('content')
@if(count($errors)>0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
        <ui>
            @foreach($errors->all() as $error)
                <li>{!!$error!!}</li>
            @endforeach
        </ui>
    </div>
@endif
<div class="row">
    <div class="container-table container">
        <h2>Lista de usuarios</h2>
        <a href="user/create"><i class="fas fa-plus"></i> Creación de usuarios</a>
    </div>
    <div class="container-table container">
        <table class="table table-bordered table-hover" id="lista-de-usuarios">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cédula</th>
                <th>Fecha de nacimiento</th>
                <th>Género</th>
                <th>Fecha de ingreso</th>
                <th>Cargo</th>
                <th>Zona</th>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Ventas</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name_one.' '.$user->last_name_two}}</td>
                    <td>{{$user->cc_user}}</td>
                    <td>{{$user->born_date}}</td>
                    <td>{{$user->gender =='M'?'Masculino': 'Femenino'}}</td>
                    <td>{{$user->entry_date}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->zone}}</td>
                    <td>{{$user->department}}</td>
                    <td>{{$user->municipality}}</td>
                    <td>{{$user->sales== null? 0 :"$".number_format($user->sales, 0,',','.')}}</td>
                    <td>
                        {!! link_to_route('user.editUser', $title = '' , $parameters = $user->id, $attributes= ['class'=>'fa fa-pencil-square-o fa-2x', 'aria-hidden'=>'true'])!!}
                        {!!Form::open(['route'=>['user.destroyUser',$user->id],'method'=>'DELETE'])!!}
                        <button class=" btn btn-link fa fa-trash fa-2x"></button>
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection