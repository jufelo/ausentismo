<div class="form-group col-sm-6 col-md-4 order-2">
    {!! Form::label('email', 'Correo Electrónico') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::email('email', null , ['class' => 'form-control'.($errors->has('email') ? ' is-invalid' : null), 'placeholder' => 'Ingrese el correo']) !!}
    @error('email')
        <span class ="font-weight-bold invalid-feedback" role="alert">*{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-sm-7 col-md-4 order-3">
    {!! Form::label('password', 'Contraseña') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : null), 'placeholder' => 'Ingrese la contraseña']) !!}
    @error('password')
    <span class ="font-weight-bold invalid-feedback" role="alert">*{{ $message }}</span>
@enderror
</div>

