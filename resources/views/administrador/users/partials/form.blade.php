<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
</div>

