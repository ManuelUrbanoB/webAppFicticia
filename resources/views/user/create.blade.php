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
    <div class="container center">
        <h2>Crear Usuario</h2>
        <br>
        <div class="center">
            <div class="alert alert-info">
                Los campos con asteriscos (*) son obligatorios
            </div>
            <br>
            {!!Form::open(['route'=>'user.store','method'=>'POST','class'=>'form-horizontal','id'=>'form-user'])!!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Nombre: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','id'=>'nombre'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Primer apellido: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('last_name_one',null,['class'=>'form-control','placeholder'=>'Primer Apellido','id'=>'last_name_one'])!!}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Segundo apellido: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('last_name_two',null,['class'=>'form-control','placeholder'=>'Segundo Apellido','id'=>'last_name_two'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Cedula de ciudadania: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('cc_user',null,['class'=>'form-control','id'=>'cc_user'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Fecha de nacimineto: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('born_date',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Gènero: *</label>
                        <div class="col-md-9">
                            {!! Form::select('gender', array('M' => 'Masculino', 'F' => 'Femenino'),null,['class'=>'form-control col-md-8']);  !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Fecha de ingreso: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('entry_date',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Nùmero empleado: *</label>
                        <div class="col-sm-9">
                            {!!Form::number('employee_number',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Cargo: *</label>
                        <div class="col-sm-9">
                            <select name="role" class="form-control">
                                <option value="Gerente Comercial">Gerente Comercial</option>
                                <option value="Gerente Regional">Gerente Regional</option>
                                <option value="Subgerente Regional">Subgerente Regional</option>
                                <option value="Ejecutivo Comercial">Ejecutivo Comercial</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Zona: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('zone',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jefe: *</label>
                        <div class="col-sm-9">
                            <select name="number_boss" class="form-control">
                                <option value="">Ninguno</option>
                                @foreach($users as $user)
                                    <option value="{!!$user->empleyee_number!!}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Municipio: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('municipality',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Departamento: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('department',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Link de la imagen: *</label>
                        <div class="col-sm-9">
                            {!!Form::text('url_img',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Ventas: *</label>
                        <div class="col-sm-9">
                            {!!Form::number('sales',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Correo electronico: *</label>
                        <div class="col-sm-9">
                            {!!Form::email('email',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Nùmero de tèlefono: *</label>
                        <div class="col-sm-9">
                            {!!Form::number('cel_phone',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Contraseña: *</label>
                        <div class="col-sm-9">
                            {!!Form::password('password',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center col-md-12">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>


            {!!Form::close()!!}


        </div>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>
    </div>
@endsection
