@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')

    <link rel="stylesheet" href="{{ asset('vendor/DataTables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/propuestas/css/propuestas.css') }}">
@stop

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item ">
                <h4>Usuarios</h4>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-12 mx-auto bg-white p-4 mt-4 rounded">
        <table class="table table-striped" id="usuarios" >
            <thead class="">
                <tr>
                    <th class="ffPoppins">Id</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans()}}</td>
                        
                        <td>
                            <a href="#"
                                class="btn btn-xs btn-default text-teal mx-1 shadow">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            <a href="#"
                                class="btn btn-xs btn-default text-primary mx-1 shadow">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>

@stop




@section('js')
    <script src="{{ asset('vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/js/dataTables.bootstrap5.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable({
                "ajax": "{{ route('usuarios.user') }}",
                "columns": [{
                        data: 'id'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'actions'

                    },
                ],
                "language": {
                    "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value = '10'>10</option>
                                    <option value = '25'>25</option>
                                    <option value = '50'>50</option>
                                    <option value = '100'>100</option>
                                    <option value = '-1'>Todos</option>
                                </select>` +
                        " registros por página",
                    "zeroRecords": "No se encuentra el registro - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": 'Buscar:',
                    "paginate": {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
      
    </script>
@stop
