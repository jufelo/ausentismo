<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-sm-8 col-xl-5">
                    {!! Form::label('employee_id', 'Empleado') !!}
                    <select name="employee_id" id="employee_id" class="form-control" wire:model="employee_id" wire:change = 'calcular_salario( $event.target.value )'>
                        <option>Seleccione el empleado...</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group col-md-4">
                        {!! Form::label('salary_per_day', 'Salario por Día') !!}
                        {!! Form::text('salary_per_day', $this->salary_per_day , ['class' => 'form-control', 'readonly']) !!}
                    </div>

                    <div class="form-group col-md-4">
                        {!! Form::label('incapacity_type_id', 'Tipo de Incapacidad') !!}
                        {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de incapacidad...', 'wire:model' => 'incapacity_type_id']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('cie_10_id', 'Código CIE10') !!}
                        <select name="cie_10_id" id="cie_10_id" class="form-control" wire:model = 'cie_10_id'>
                        <option>Seleccione el código...</option>
                        @foreach ($cie_10s as $cie_10)
                                <option value="{{$cie_10->id}} ">{{$cie_10->code}} {{$cie_10->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col md-4">
                        {!! Form::label('start_date', 'Fecha Inicio Incapacidad') !!}
                        {!! Form::date('start_date', null, ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'wire:model' => 'start_date', 'wire:keyup' => 'calcular_dias()']) !!}
                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('end_date', 'Fecha Finalización Incapacidad') !!}
                        {!! Form::date('end_date', null, ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'wire:model' => 'end_date', 'wire:keyup' => 'calcular_dias()']) !!}
                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        {!! Form::label('total_per_day', 'Total Días de Incapacidad') !!}
                        {!! Form::text('total_per_day', $total_per_day , ['class' => 'form-control', 'readonly']) !!}
                    </div>


                    <div class="form-group col-md-4">
                        {!! Form::label('clasification', 'Clasificación') !!}
                        {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione el tipo de clasificación...', 'wire:model' => 'clasification']) !!}
                        @error('clasification')
                            <span class ="invalid-feedback" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                    <a class="btn btn-primary btn-sm" wire:click="store()">Crear incapacidad</a>
                </div>
            </div>
        </div>
    </div>
</div>

