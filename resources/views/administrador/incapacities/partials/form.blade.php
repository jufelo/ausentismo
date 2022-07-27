<div class="form-group">
    {!! Form::label('employee', 'Empleado') !!}
    <select name="employee" id="employee_id" class="form-control">
        <option value="">Seleccione un empleado...</option>
        @foreach ($employees as $employee)
        {{--<option value="{{$employee->id}} ">{{$employee->full_name}}</option>--}}
        <option value="{{$employee->id}} ">{{$employee->name}} {{$employee->lastname}}</option>
        @endforeach
    </select>
</div> 

<div class="form-group">
    {!! Form::label('incapacity_type_id', 'Tipo de incapacidad') !!}
    {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de incapacidad...']) !!}
</div>

{{--}}
<div class="form-group">
    {!! Form::label('cie10', 'Código enfermedad CIE10') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('cie10', null , ['class' => 'form-control'.($errors->has('cie10') ? ' is-invalid':null), 'placeholder' => 'Seleccione el código de enfermedad CIE10...']) !!}
    @error('cie10')
    <span class ="invalid-feedback" role="alert">
        <strong>*{{ $message }}</strong>
    </span>
@enderror
</div>--}}

<div class="form-group">
    {!! Form::label('start_date', 'Fecha inicio incapacidad') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('start_date', null , ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha inicial...']) !!}
    @error('start_date')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('end_date', 'Fecha finalización incapacidad') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::text('end_date', null , ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'placeholder' => 'Ingrese la fecha final...']) !!}
    @error('end_date')
        <span class="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('Clasification', 'Clasificación') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione tipo de clasificación...']) !!}
    @error('clasification')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>
