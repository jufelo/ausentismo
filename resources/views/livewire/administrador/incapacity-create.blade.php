<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-body">
{{--}}        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid':null), 'wire:model' => 'name']) !!}
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
--}}        
        <div class="form-group">
            {!! Form::label('employee', 'Empleado') !!}
            <select name="employee" id="employee_id" class="form-control" wire:keyup='calcular_salario()'>
                <option>Seleccione el empleado...</option>
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
                @endforeach
            </select>
        </div>

        {{--<div class="form-group">
            {!! Form::label('salary', 'Salario') !!}
            {!! Form::text('salary', $employee->salary , ['class' => 'form-control', 'wire:model' => 'salary', 'wire:keyup' => 'calcular_salario()', 'readonly']) !!}
        </div>--}}

        <div class="form-group">
            {!! Form::label('salary_per_day', 'Salario por día') !!}
            {!! Form::text('salary_per_day', $salary_per_day , ['class' => 'form-control', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('incapacity_type_id', 'Tipo de incapacidad') !!}
            {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de incapacidad...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('start_date', 'Fecha inicio incapacidad') !!}
            {!! Form::date('start_date', null, ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'wire:model' => 'start_date']) !!}
            @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('end_date', 'Fecha finalización incapacidad') !!}
            {!! Form::date('end_date', null, ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'wire:model' => 'end_date', 'wire:keyup' => 'calcular_dias()']) !!}
            @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('total_per_day', 'Total días de incapacidad') !!}
            {!! Form::text('total_per_day', $total_per_day , ['class' => 'form-control', 'readonly']) !!}
        </div>

        
        <div class="form-group">
            {!! Form::label('clasification', 'Clasificación') !!}
            {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione el tipo de clasificación...']) !!}
            @error('clasification')
                <span class ="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>

        

        {{--<div class="form-group">
            {!! Form::label('salary', 'Salario') !!}
            {!! Form::text('salary', null, ['class' => 'form-control'.($errors->has('salary') ? ' is-invalid':null), 'wire:model' => 'salary' , 'wire:keyup' => 'calcular_salario()']) !!}
            @error('salary')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('employee', 'Salario por día') !!}
            {!! Form::text('employee', $salary_per_day , ['class' => 'form-control', 'readonly']) !!}
        </div>--}}
        
        <a class="btn btn-primary btn-sm" wire:click="store()">Crear incapacidad</a>
        </div>
        
       


        </div>
        
    </div>
</div>
