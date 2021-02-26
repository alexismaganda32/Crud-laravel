@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/bolsa/'.$bolsa->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('bolsa.from',['modo'=>'Editar']);
</form>
</div>
@endsection