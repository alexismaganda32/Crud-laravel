@extends('layouts.app')

@section('content')
<div class="container">

    
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" roles="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" arial-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif

    


<a href="{{url('bolsa/create')}}" class="btn btn-success">Registrar Nuevo Usuario</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo Electronico</th>
            <th>Número</th>
            <th>Habilidades</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bolsa as $miembro)
        <tr>
            <td>{{$miembro->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$miembro->Foto}}" width="100" alt="">
            </td>

            <td>{{$miembro->Nombre}}</td>
            <td>{{$miembro->Apellidos}}</td>
            <td>{{$miembro->CorreoElectronico}}</td>
            <td>{{$miembro->Número}}</td>
            <td>{{$miembro->Habilidades}}</td>
            <td> <a href="{{url('/bolsa/'.$miembro->id.'/edit')}}"class="btn btn-warning" >Editar</a> | 
                <form action="{{url('/bolsa/'.$miembro->id)}}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrarlo')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $bolsa->links()!!}
</div>
@endsection