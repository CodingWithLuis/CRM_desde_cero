@extends('layouts.admin')

@section('content')

<div class="content-header mb-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administración de Clientes</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Nuevo Cliente</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered mt-3" id="clients_table">
                            <thead>
                                <tr>
                                    <th>Nombre Contacto</th>
                                    <th>Email Contacto</th>
                                    <th>Teléfono Contacto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->contact_name}}</td>
                                    <td>{{$client->contact_email}}</td>
                                    <td>{{$client->contact_phone_number}}</td>
                                    <td>
                                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-success">
                                            Editar
                                        </a>

                                        <form action="{{ route('admin.clients.destroy', $client->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#clients_table').DataTable();
    });
</script>
@endsection
