<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-sm-8 col-xl-7">
                    {!! Form::label('employee_id', 'Empleado') !!}
                    <select name="employee_id" id="employee_id" class="form-control {{ $errors->has('employee_id') ? 'is-invalid':'' }}" wire:model="employee_id" wire:change='calcular_salario( $event.target.value )'>
                        <option>Seleccione el empleado...</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}} ">{{$employee->full_name}}</option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-4 col-xl-2">
                    {!! Form::label('salary_per_day', 'Salario por Día') !!}
                    {!! Form::text('salary_per_day', '$'.number_format($this->salary_per_day,2) , ['class' => 'form-control font-weight-bold text-center text-success', 'readonly']) !!}
                </div>

                <div class="form-group col-sm-7 col-xl-3">
                    {!! Form::label('incapacity_type_id', 'Tipo de Incapacidad') !!}
                    {!! Form::select('incapacity_type_id', $listaIncapacidades, null, ['class' => 'form-control' . ($errors->has('incapacity_type_id') ? ' is-invalid':''), 'placeholder' => 'Seleccione el tipo de incapacidad...', 'wire:model' => 'incapacity_type_id', 'wire:change' => 'calcular_pago()']) !!}
                    @error('incapacity_type_id')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-5 col-xl-3">
                    {!! Form::label('clasification', 'Clasificación') !!}
                    {!! Form::select('clasification', ['Inicial' => 'Inicial', 'Prorroga' => 'Prorroga'], null, ['class' => 'form-control'.($errors->has('clasification') ? ' is-invalid':''), 'placeholder' => 'Seleccione la clasificación...', 'wire:model' => 'clasification']) !!}
                    @error('clasification')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-xl-9">
                    {!! Form::label('cie_10_id', 'Código CIE10') !!}
                    <select name="cie_10_id" id="cie_10_id" class="form-control {{ $errors->has('cie_10_id') ? 'is-invalid':'' }}" wire:model='cie_10_id'>
                        <option>Seleccione el código...</option>
                        @foreach ($cie_10s as $cie_10)
                            <option value="{{$cie_10->id}} ">{{$cie_10->code}} {{$cie_10->name}}</option>
                        @endforeach
                    </select>
                    @error('cie_10_id')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6 col-md-4 col-xl-3">
                    {!! Form::label('start_date', 'Fecha Inicio Incapacidad') !!}
                    {!! Form::date('start_date', null, ['class' => 'form-control'.($errors->has('start_date') ? ' is-invalid':null), 'wire:model' => 'start_date', 'wire:change' => 'calcular_dias()']) !!}
                    @error('start_date')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-6 col-md-4 col-xl-3">
                    {!! Form::label('end_date', 'Fecha Fin Incapacidad') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-control'.($errors->has('end_date') ? ' is-invalid':null), 'wire:model' => 'end_date', 'wire:change' => 'calcular_dias()']) !!}
                    @error('end_date')
                        <span class="invalid-feedback font-weight-bold" role="alert">*{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('total_per_day', 'Días de Incapacidad', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('total_per_day', $this->total_per_day , ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>

                <div class="col-12 col-sm-8 col-md-12 d-flex align-items-end justify-content-center justify-content-sm-end justify-content-md-center">
                    <a class="btn bg-navy my-3" wire:click="store()">Crear incapacidad</a>
                </div>
                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('paid_total', 'Pago total', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('paid_total', '$'.number_format($this->paid_total,2) , ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>
                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('paid_company', 'Pago empresa', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('paid_company', '$'.number_format($this->paid_company,2) , ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>
                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('paid_eps', 'Pago EPS', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('paid_eps', '$'.number_format($this->paid_eps,2), ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>
                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('paid_arl', 'Pago ARL', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('paid_arl', '$'.number_format($this->paid_arl,2) , ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>
                <div class="form-group col-5 col-sm-4 col-xl-2">
                    {!! Form::label('paid_afp', 'Pago AFP', ['class' => 'text-nowrap']) !!}
                    {!! Form::text('paid_afp', '$'.number_format($this->paid_afp,2) , ['class' => 'form-control font-weight-bold text-center text-danger', 'readonly']) !!}
                </div>
                
                <div class="col-12 col-sm-8 col-md-12 d-flex align-items-end justify-content-center justify-content-sm-end justify-content-md-center">
                    <a class="btn bg-navy my-3" wire:click="calcular_pago()">Refresh</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

