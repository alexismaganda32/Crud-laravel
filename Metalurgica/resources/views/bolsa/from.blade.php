<h1>{{$modo}} Usuario</h1>

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
<ul>
    @foreach ($errors->all() as $error)
       <li> {{$error}}</li>
    @endforeach
</ul>
    </div>
    
@endif

<div class="form-group">
<label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($bolsa->Nombre)?$bolsa->Nombre:old('Nombre')}}" id="Nombre">
</div>

<div class="form-group">
    <label for="Apellidos">Apellidos</label>
    <input type="text"class="form-control" name="Apellidos" value="{{isset($bolsa->Apellidos)?$bolsa->Apellidos:old('Apellidos')}}" id="Apellidos">
</div>

<div class="form-group">
    <label for="CorreoElectronico">Correo Electronico</label>
    <input type="text" class="form-control" name="CorreoElectronico" value="{{isset($bolsa->CorreoElectronico)?$bolsa->CorreoElectronico:old('CorreoElectronico')}}" id="CorreoElectronico">
</div>

<div class="form-group">
    <label for="Número">Número</label>
    <input type="text" class="form-control" name="Número" value="{{isset($bolsa->Número)?$bolsa->Número:old('Número')}}" id="Número">
</div>

<div class="form-group">
    <label for="Habilidades">Habilidades</label> 
    <input type="text" class="form-control" name="Habilidades" value="{{isset($bolsa->Habilidades)?$bolsa->Habilidades:old('Habilidades')}}" id="Habilidades">
    <br>
    <label for="Foto">Foto</label>
</div>

<div class="form-group">
    @if (isset($bolsa->Foto))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$bolsa->Foto}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Foto"  id="Foto">
</div>


    <input class="btn btn-success" type="submit" value="{{$modo}} datos">
    <a class="btn btn-primary" href="{{url('bolsa/')}}">Regresar</a>