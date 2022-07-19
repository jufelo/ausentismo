<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('name', null , ['class' => 'form-control'.($errors->has('name') ? ' is-invalid':null), 'placeholder' => 'Ingrese el nombre completo']) !!}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ti', 'Tipo de Identificación') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('ti', ['Cédula' => 'Cédula', 'Pasaporte' => 'Pasaporte'], null, ['class' => 'form-control'.($errors->has('ti') ? ' is-invalid':''), 'placeholder' => 'Seleccione tipo...']) !!}
    @error('ti')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('identification', 'Número de Identificación') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('identification', null , ['class' => 'form-control'.($errors->has('identification') ? ' is-invalid':null), 'placeholder' => 'Ingrese el número de identificación']) !!}
    @error('identification')
    <span class ="invalid-feedback" role="alert">
        <strong>*{{ $message }}</strong>
    </span>
@enderror
</div>

<div class="form-group">
    {!! Form::label('salary', 'Salario') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('salary', null , ['class' => 'form-control'.($errors->has('salary') ? ' is-invalid':null), 'placeholder' => 'Ingrese el salario']) !!}
    @error('salary')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('position', 'Cargo') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('position', null , ['class' => 'form-control'.($errors->has('position') ? ' is-invalid':null), 'placeholder' => 'Ingrese el cargo']) !!}
    @error('position')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('work_area', 'Area de trabajo') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('work_area', null , ['class' => 'form-control'.($errors->has('work_area') ? ' is-invalid':null), 'placeholder' => 'Ingrese el área de trabajo']) !!}
    @error('work_area')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('eps', 'eps') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('eps', ['Sura' => 'Sura', 'Nueva Eps' => 'Nueva Eps'], null, ['class' => 'form-control'.($errors->has('eps') ? ' is-invalid':''), 'placeholder' => 'Seleccione eps...']) !!}
    @error('eps')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('arl', 'arl') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('arl', ['Sura' => 'Sura', 'Axa Colpatria' => 'Axa Colpatria'], null, ['class' => 'form-control'.($errors->has('arl') ? ' is-invalid':''), 'placeholder' => 'Seleccione arl...']) !!}
    @error('arl')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('afp', 'afp') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('afp', ['Protección' => 'Protección', 'Colfondos' => 'Colfondos'], null, ['class' => 'form-control'.($errors->has('afp') ? ' is-invalid':''), 'placeholder' => 'Seleccione afp...']) !!}
    @error('afp')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>