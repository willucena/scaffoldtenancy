
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Dominio') !!}
    {!! Form::text('domain', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Host Banco') !!}
    {!! Form::text('bd_hostname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Banco de Dados') !!}
    {!! Form::text('bd_database', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Usuário do banco') !!}
    {!! Form::text('bd_username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Senha do banco') !!}
    {!! Form::text('bd_password', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
