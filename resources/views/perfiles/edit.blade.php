@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item "><h4>Editar Perfil</h4></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('perfiles.show',['perfil' => $perfil->id])}}">{{$perfil->nombre}} {{$perfil->apaterno}} {{$perfil->amaterno}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
        </ol>
    </nav>
@stop

@section('content')

<div class="container p-2 mt-2">
    {{-- {{ $perfil->usuario->dcontacto->email }} --}}
    {{-- Menu perfil  --}}
    <div id="navPerfil" class="row p-4">
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
                <form 
                    action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row navPerfil2">
                        <div class="col-md-12 borderB px-4 pt-4 pb-3">
                            <h5 class="perfTitle">Datos Personales</h5>
                        </div>
                        <div class="col-md-12 p-4" id="datosPersonales">
                            <div class="form-group mb-3 row">
                                <label for="nombre" class="col-sm-3 col-form-label">Nombre Completo:</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                        name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        id="nombre"
                                        placeholder="Tu nombre"
                                        value="{{ $perfil->nombre}}"
                                    >

                                    @error('nombre')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input type="text"
                                    name="apaterno"
                                    class="form-control @error('apaterno') is-invalid @enderror"
                                    id="apaterno"
                                    placeholder="Apellido Paterno"
                                    value="{{ $perfil->apaterno}}"
                                    >

                                    @error('apaterno')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input type="text"
                                    name="amaterno"
                                    class="form-control @error('amaterno') is-invalid @enderror"
                                    id="amaterno"
                                    placeholder="Apellido Materno"
                                    value="{{ $perfil->amaterno}}"
                                    >

                                    @error('amaterno')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="rfc" class="col-sm-3 col-form-label">RFC:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="rfc"
                                    class="form-control @error('rfc') is-invalid @enderror"
                                    id="rfc"
                                    placeholder="Tu rfc"
                                    value="{{ $perfil->rfc}}"
                                    >

                                    @error('rfc')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="sexo" class="col-sm-3 col-form-label">Sexo:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="sexo"
                                    class="form-control @error('sexo') is-invalid @enderror"
                                    id="sexo"
                                    placeholder="Tu sexo"
                                    value="{{ $perfil->sexo}}"
                                    >

                                    @error('sexo')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="imagen">Tu foto de perfil:</label>

                                <input 
                                    id="imagen"
                                    type="file"
                                    class="form-control @error('imagen') is-invalid @enderror"
                                    name="imagen"
                                >
                                
                                @if( $perfil->imagen )
                                    <div class="mt-4">
                                        <p>Imagen actual:</p>

                                        <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                                    </div>

                                    <!-- mostrando mensaje de validacion -->
                                    @error('imagen')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div> 
                        </div>
                    </div>

                    <div class="row navPerfil2 mt-4">
                        <div class="col-md-12 borderB px-4 pt-4 pb-3">
                            <h5 class="perfTitle">Datos de Contacto</h5>
                        </div>
                        <div class="col-md-12 p-4" id="datosContacto">
                            <div class="form-group mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Tu email"
                                    value="{{ $perfil->usuario->dcontacto->email}}"
                                    >

                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="form-group mb-3 row">
                                <label for="telefono" class="col-sm-3 col-form-label">Telefono:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="telefono"
                                    class="form-control @error('telefono') is-invalid @enderror"
                                    id="telefono"
                                    placeholder="Tu telefono"
                                    value="{{ $perfil->usuario->dcontacto->telefono}}"
                                    >

                                    @error('telefono')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group mb-3 row">
                                <label for="telefono_contacto" class="col-sm-3 col-form-label">Telefono de contacto:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="telefono_contacto"
                                    class="form-control @error('telefono_contacto') is-invalid @enderror"
                                    id="telefono_contacto"
                                    placeholder="Tu telefono de contacto"
                                    value="{{ $perfil->usuario->dcontacto->telefono_contacto}}"
                                    >

                                    @error('telefono_contacto')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-group mb-3 row">
                                <label for="direccion" class="col-sm-3 col-form-label">Direccion:</label>
                                <div class="col-sm-6">
                                    <input type="text"
                                    name="calle"
                                    class="form-control @error('calle') is-invalid @enderror"
                                    id="calle"
                                    placeholder="Calle"
                                    value="{{ $perfil->usuario->dcontacto->calle}}"
                                    >

                                    @error('calle')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <input type="text"
                                    name="numero"
                                    class="form-control @error('numero') is-invalid @enderror"
                                    id="numero"
                                    placeholder="Numero"
                                    value="{{ $perfil->usuario->dcontacto->numero}}"
                                    >

                                    @error('numero')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="estado" class="col-sm-3 col-form-label">Estado:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="estado"
                                    class="form-control @error('estado') is-invalid @enderror"
                                    id="estado"
                                    placeholder="Estado"
                                    value="{{ $perfil->usuario->dcontacto->estado}}"
                                    >

                                    @error('estado')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="municipio" class="col-sm-3 col-form-label">Municipio:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="municipio"
                                    class="form-control @error('municipio') is-invalid @enderror"
                                    id="municipio"
                                    placeholder="Municipio"
                                    value="{{ $perfil->usuario->dcontacto->municipio}}"
                                    >

                                    @error('municipio')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="colonia" class="col-sm-3 col-form-label">Colonia:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="colonia"
                                    class="form-control @error('colonia') is-invalid @enderror"
                                    id="colonia"
                                    placeholder="Colonia"
                                    value="{{ $perfil->usuario->dcontacto->colonia}}"
                                    >

                                    @error('colonia')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="cp" class="col-sm-3 col-form-label">Codigo Postal:</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    name="cp"
                                    class="form-control @error('cp') is-invalid @enderror"
                                    id="cp"
                                    placeholder="C.P."
                                    value="{{ $perfil->usuario->dcontacto->cp}}"
                                    >

                                    @error('cp')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="redesSociales" class="col-sm-3 col-form-label">Redes Sociales:</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                    name="fb"
                                    class="form-control @error('fb') is-invalid @enderror"
                                    id="fb"
                                    placeholder="Facebook"
                                    value="{{ $perfil->usuario->dcontacto->fb}}"
                                    >

                                    @error('fb')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <input type="text"
                                    name="twitter"
                                    class="form-control @error('twitter') is-invalid @enderror"
                                    id="twitter"
                                    placeholder="Twitter"
                                    value="{{ $perfil->usuario->dcontacto->twitter}}"
                                    >

                                    @error('twitter')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row navPerfil2 mt-4">
                        <div class="form-group mt-3 d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Actualizar Perfil">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop