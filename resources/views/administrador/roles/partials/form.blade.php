<div class="form-row">
    <div class="form-group col-12 col-lg-4 col-sm-6">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
    </div>
    <div class="form-group col-12"><h2 class="h3">Asignación de permisos</h2>
        @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{$permission->description}}
                </label>
            </div>
        @endforeach
    </div>
</div>


























