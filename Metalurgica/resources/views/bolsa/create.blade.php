@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/bolsa')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('bolsa.from',['modo'=>'Crear']);
</form>
</div>
@endsection