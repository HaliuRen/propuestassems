@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb ">
      <li class="breadcrumb-item "><h4>{{$perfil->usuario->name}}</h4></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$perfil->nombre}} {{$perfil->apaterno}} {{$perfil->amaterno}}</li>
    </ol>
  </nav>
@stop

@section('content')
      <div class="container p-2 mt-2">
        {{-- Perfil --}}
        <div id="containerPerfil" class="row p-4 d-flex align-items-baseline">
          <div class="col-md-2">
            @if($perfil->imagen)
              <img src="/storage/{{$perfil->imagen}}" class="w-20 rounded-circle" alt="foto perfil" width="150px" height="150px">
            @endif
          </div>
          <div class="col-md-10">
            <h4 class=" text-primary-dark">{{$perfil->usuario->name}}</h4>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item"><i class="fas fa-user-circle"></i> Admin </li>
              <li class="list-group-item"><i class="fas fa-address-card"></i> 210021016 </li>
              <li class="list-group-item"><i class="fas fa-envelope"></i>  {{$perfil->usuario->dcontacto->email}} </li>
            </ul>
            {{-- <a href="{{$perfil->usuario->url}}"> visitar Sitio Web</a> --}}
          </div>
        </div>

        {{-- Menu perfil  --}}
        <div id="navPerfil" class="row p-3">
          <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-informacion-tab" data-bs-toggle="pill" data-bs-target="#pills-informacion" type="button" role="tab" aria-controls="pills-informacion" aria-selected="true">Información</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-dadmin-tab" data-bs-toggle="pill" data-bs-target="#pills-dadmin" type="button" role="tab" aria-controls="pills-dadmin" aria-selected="false">Datos Administrativos</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-nombramientos-tab" data-bs-toggle="pill" data-bs-target="#pills-nombramientos" type="button" role="tab" aria-controls="pills-nombramientos" aria-selected="false">Nombramientos</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-cuenta-tab" data-bs-toggle="pill" data-bs-target="#pills-cuenta" type="button" role="tab" aria-controls="pills-cuenta" aria-selected="false">Cuenta</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-archivos-tab" data-bs-toggle="pill" data-bs-target="#pills-archivos" type="button" role="tab" aria-controls="pills-archivos" aria-selected="false">Archivos</button>
              </li>
            </ul>
          </div>
        </div>
  
        {{-- contenido --}}
        <div class="row">
          <div class="col-md-12">
            <div class="tab-content my-4" id="pills-tabContent">
              {{-- INFORMACION --}}
              <div class="tab-pane fade show active" id="pills-informacion" role="tabpanel" aria-labelledby="pills-informacion-tab">
                <!--DATOS PERSONALES-->
                <div class="row navPerfil2">
                  <div class="col-md-12 borderB px-4 pt-4 pb-3 d-flex justify-content-between">
                    <h5 class="perfTitle">Datos Personales</h5>
                    <a class="btn btn-primary" href="{{ route('perfiles.edit', ['perfil' => $perfil->id]) }}" role="button">Editar Perfil</a>
                  </div>
                
                  <div class="col-md-12 p-4" id="datosPersonales">
                    <div class="mb-3 row">
                      <label for="staticNombre" class="col-sm-3 col-form-label">Nombre Completo:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticNombre" value="{{$perfil->nombre}} {{$perfil->apaterno}} {{$perfil->amaterno}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticCurp" class="col-sm-3 col-form-label">CURP:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticCurp" value="{{$perfil->usuario->username}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticRfc" class="col-sm-3 col-form-label">RFC:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticRfc" value="{{$perfil->rfc}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticSexo" class="col-sm-3 col-form-label">Sexo:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticSexo" value="{{$perfil->sexo}}">
                      </div>
                    </div>
                  </div>
                </div>

                <!--DATOS CONTACTO-->
                <div class="row navPerfil2 mt-4">
                  <div class="col-md-12 borderB px-4 pt-4 pb-3">
                    <h5 class="perfTitle">Datos de Contacto</h5>
                  </div>
                  
                  <div class="col-md-12 p-4" id="datosContacto">
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-3 col-form-label">Email:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$perfil->usuario->dcontacto->email}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticTelefono" class="col-sm-3 col-form-label">Telefono:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticTelefono" value="{{$perfil->usuario->dcontacto->telefono}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticTelefono2" class="col-sm-3 col-form-label">Telefono Contacto:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticTelefono2" value="{{$perfil->usuario->dcontacto->telefono_contacto}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticDireccion" class="col-sm-3 col-form-label">Dirección:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticDireccion" value="{{$perfil->usuario->dcontacto->calle}} {{$perfil->usuario->dcontacto->numero}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticColonia" class="col-sm-3 col-form-label">Colonia:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticColonia" value="{{$perfil->usuario->dcontacto->colonia}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticMunicipio" class="col-sm-3 col-form-label">Municipio:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticMunicipio" value="{{$perfil->usuario->dcontacto->municipio}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEstado" class="col-sm-3 col-form-label">Estado:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticEstado" value="{{$perfil->usuario->dcontacto->estado}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticcp" class="col-sm-3 col-form-label">C.P.:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticcp" value="{{$perfil->usuario->dcontacto->cp}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticfb" class="col-sm-3 col-form-label">Facebook:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticfb" value="{{$perfil->usuario->dcontacto->fb}}">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="statictwitter" class="col-sm-3 col-form-label">Twitter:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="statictwitter" value="{{$perfil->usuario->dcontacto->twitter}}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              {{-- DATOS ADMINISTRATIVOS --}}
              <div class="tab-pane fade" id="pills-dadmin" role="tabpanel" aria-labelledby="pills-archivos-tab">
                <!--DATOS PERSONALES-->
                <div class="row navPerfil2">
                  <div class="col-md-12 borderB px-4 pt-4 pb-3">
                    <h5 class="perfTitle">Datos Administrativos</h5>
                  </div>
                  
                  <div class="col-md-12 p-4" id="datosPersonales">
                    <div class="mb-3 row">
                      <label for="staticCsp" class="col-sm-3 col-form-label">Clave Servidor Publico:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticCsp" value="210021016">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticIngreso" class="col-sm-3 col-form-label">Tipo Ingreso:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticIngreso" value="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticUsicamm" class="col-sm-3 col-form-label">Folio USICAMM:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticUsicamm" value="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticIngresoGob" class="col-sm-3 col-form-label">Fecha de ingreso a gobierno:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticIngresoGob" value="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticIngresoGob" class="col-sm-3 col-form-label">Fecha de ingreso a nivel:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticIngresoGob" value="">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              {{-- NOMBRAMIENTOS --}}
              <div class="tab-pane fade" id="pills-nombramientos" role="tabpanel" aria-labelledby="pills-archivos-tab">N</div>
          
              {{-- CUENTA --}}
              <div class="tab-pane fade" id="pills-cuenta" role="tabpanel" aria-labelledby="pills-archivos-tab">C</div>

              {{-- CUENTA --}}
              <div class="tab-pane fade" id="pills-archivos" role="tabpanel" aria-labelledby="pills-archivos-tab">Archivos</div>
            </div>
          </div>
        </div>

      </div>
@stop
