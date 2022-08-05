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
            {!! Form::label('employee', 'Elije un empleado') !!}
            <select name="employee" id="employee_id" class="form-control">
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
                @endforeach
            </select>
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
            {!! Form::date('end_date', null, ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'wire:model' => 'end_date']) !!}
            @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{--Total días de incapacidad de este empleado es: <br>
        {{ date_format($total_per_day) }}<br><br>--}}
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
        <div class="form-group">
            {!! Form::label('salary', 'Salario') !!}
            {!! Form::text('salary', null, ['class' => 'form-control'.($errors->has('salary') ? ' is-invalid':null), 'wire:model' => 'salary' , 'wire:keyup' => 'calcular_salario()']) !!}
            @error('salary')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{--El salario por día de este empleado es: <br>
        $ {{ number_format($salary_per_day) }}<br><br>--}}
        
        <a class="btn btn-primary btn-sm" wire:click="store()">Crear incapacidad</a>
        </div>
        
        </div>
        {{--</div>
        El total de dias es: <br>
        $ {{ number_format($date_per_day) }}<br><br>
        <a class="btn btn-primary btn-sm" wire:click="store()">Crear incapacidad</a>
        </div>
        --}}
    </div>
</div>
