{{-- <div class="form-group">
    {!! Form::label('employee', 'Eliga un empleado') !!}
    {!! Form::select('employee', $employees, null, ['class' => 'form-control', 'placeholder' => '-- Eliga un empleado --', 'style' => 'width:100%;']) !!}
</div> --}}


<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::email('email', null , ['class' => 'form-control'.($errors->has('email') ? ' is-invalid':null), 'placeholder' => 'Ingrese el correo']) !!}
    @error('email')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid':null), 'placeholder' => 'Ingrese la contraseña']) !!}
    @error('password')
    <span class ="invalid-feedback" role="alert">
        <strong>*{{ $message }}</strong>
    </span>
@enderror
</div>

