<div class="form-row">
    <div class="form-group col-sm-6 col-xl-3">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null , ['class' => 'form-control'.($errors->has('name') ? ' is-invalid':null), 'placeholder' => 'Ingrese el nombre']) !!}
        @error('name')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-xl-3">
        {!! Form::label('lastname', 'Apellido') !!}
        {!! Form::text('lastname', null , ['class' => 'form-control'.($errors->has('lastname') ? ' is-invalid':null), 'placeholder' => 'Ingrese el  apellido']) !!}
        @error('lastname')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-3">
        {!! Form::label('ti', 'Tipo de Identificación') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::select('ti', ['Cédula' => 'Cédula', 'Pasaporte' => 'Pasaporte'], null, ['class' => 'form-control'.($errors->has('ti') ? ' is-invalid':''), 'placeholder' => 'Seleccione tipo...']) !!}
        @error('ti')
            <span class ="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-3">
        {!! Form::label('identification', 'Número de Identificación') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::text('identification', null , ['class' => 'form-control'.($errors->has('identification') ? ' is-invalid':null), 'placeholder' => 'Ingrese el número de identificación']) !!}
        @error('identification')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group col-sm-5 col-md-4 col-xl-4">
        {!! Form::label('salary', 'Salario') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::text('salary', null , ['class' => 'form-control'.($errors->has('salary') ? ' is-invalid':null), 'placeholder' => 'Ingrese el salario']) !!}
        @error('salary')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-7 col-md-6 col-xl-4">
        {!! Form::label('position', 'Cargo') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::text('position', null , ['class' => 'form-control'.($errors->has('position') ? ' is-invalid':null), 'placeholder' => 'Ingrese el cargo']) !!}
        @error('position')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-xl-4">
        {!! Form::label('work_area', 'Area de Trabajo') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::text('work_area', null , ['class' => 'form-control'.($errors->has('work_area') ? ' is-invalid':null), 'placeholder' => 'Ingrese el área de trabajo']) !!}
        @error('work_area')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-4">
        {!! Form::label('eps', 'EPS') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::select('eps', ['Sura' => 'Sura', 'Nueva Eps' => 'Nueva Eps'], null, ['class' => 'form-control'.($errors->has('eps') ? ' is-invalid':''), 'placeholder' => 'Seleccione eps...']) !!}
        @error('eps')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-4">
        {!! Form::label('arl', 'ARL') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::select('arl', ['Sura' => 'Sura', 'Axa Colpatria' => 'Axa Colpatria'], null, ['class' => 'form-control'.($errors->has('arl') ? ' is-invalid':''), 'placeholder' => 'Seleccione arl...']) !!}
        @error('arl')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-4">
        {!! Form::label('afp', 'AFP') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::select('afp', ['Protección' => 'Protección', 'Colfondos' => 'Colfondos'], null, ['class' => 'form-control'.($errors->has('afp') ? ' is-invalid':''), 'placeholder' => 'Seleccione afp...']) !!}
        @error('afp')
            <span class="invalid-feedback" role="alert">
                <strong>*{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
