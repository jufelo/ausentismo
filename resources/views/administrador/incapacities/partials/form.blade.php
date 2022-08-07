@if (!empty($incapacity))
    <div class="form-group">
        {!! Form::label('employee', 'Empleado') !!}
        {!! Form::text('employee', $employee->full_name , ['class' => 'form-control', 'readonly']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::label('employee', 'Empleado') !!}
        <select name="employee" id="employee_id" class="form-control">
            <option>Seleccione el empleado...</option>
            @foreach ($employees as $employee)
                <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
            @endforeach
        </select>
    </div>
    
@endif
<div class="form-group">
    {!! Form::label('incapacity_type_id', 'Tipo de incapacidad') !!}
    {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de incapacidad...']) !!}
</div>
@if (!empty($incapacity))
    <div class="form-group">
        {!! Form::label('cie_10', 'Código CIE10') !!}
        {!! Form::text('cie_10', $cie_10->full_cie, ['class' => 'form-control', 'readonly']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::label('cie_10', 'Código CIE10') !!}
        <select name="cie_10" id="cie_10_id" class="form-control">
            <option>Seleccione el código...</option>
            @foreach ($cie_10s as $cie_10)
                <option value="{{$cie_10->id}} ">{{$cie_10->code}} {{$cie_10->name}}</option>
            @endforeach
        </select>
    </div>
@endif





<div class="form-group">
    {!! Form::label('start_date', 'Fecha inicio incapacidad') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::date('start_date', null , ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha inicial...']) !!}
    @error('start_date')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('end_date', 'Fecha finalización incapacidad') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::date('end_date', null , ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha final...']) !!}
    @error('end_date')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('clasification', 'Clasificación') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione el tipo de clasificación...']) !!}
    @error('clasification')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>
