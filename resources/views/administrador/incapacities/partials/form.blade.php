<div class="form-row">
    @if (!empty($incapacity))
        <div class="form-group col-md-6 col-xl-5">
            {!! Form::label('employee', 'Empleado') !!}
            {!! Form::text('employee', $employee->full_name , ['class' => 'form-control', 'readonly']) !!}
        </div>
    @else
        <div class="form-group col-md-6 col-xl-5">
            {!! Form::label('employee', 'Empleado') !!}
            <select name="employee" id="employee_id" class="form-control {{ $errors->has('employee_id') ? ' is-invalid':'' }}">
                <option selected disabled>Seleccione el empleado...</option>
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
                @endforeach
            </select>
            @error('employee_id')
                <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
            @enderror
        </div>

    @endif
    <div class="form-group col-sm-6 col-xl-4">
        {!! Form::label('incapacity_type_id', 'Tipo de incapacidad') !!}
        {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control'.($errors->has('incapacity_type_id') ? ' is-invalid':''), 'placeholder' => 'Seleccione el tipo de incapacidad...']) !!}
        @error('incapacity_type_id')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6 col-md-4 col-xl-3">
        {!! Form::label('clasification', 'Clasificación') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione la clasificación...']) !!}
        @error('clasification')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>

    @if (!empty($incapacity))
        <div class="form-group col-md-8 col-xl-6">
            {!! Form::label('cie_10', 'Diagnóstico') !!}
            {!! Form::text('cie_10', $cie_10->full_cie, ['class' => 'form-control', 'readonly']) !!}
        </div>
    @else
        <div class="form-group col-md-8 col-xl-6">
            {!! Form::label('cie_10', 'Diagnóstico') !!}
            <select name="cie_10" id="cie_10_id" class="form-control {{ $errors->has('cie_10_id') ? 'is-invalid':'' }}">
                <option selected disabled>Seleccione el código...</option>
                @foreach ($cie_10s as $cie_10)
                    <option value="{{$cie_10->id}} ">{{$cie_10->code}} {{$cie_10->name}}</option>
                @endforeach
            </select>
            @error('cie_10_id')
                <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
            @enderror
        </div>
    @endif

    <div class="form-group col-6 col-xl-3">
        {!! Form::label('start_date', 'Fecha inicio incapacidad') !!}
        <!--<label name="name">Nombre</label>-->
        {!! Form::date('start_date', null , ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha inicial...']) !!}
        @error('start_date')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-6 col-xl-3">
        {!! Form::label('end_date', 'Fecha fin incapacidad') !!}
        {!! Form::date('end_date', null , ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha final...']) !!}
        @error('end_date')
            <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
        @enderror
    </div>
</div>
