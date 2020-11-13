
<!-- Email Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome da empresa:') !!}
    <p>{!! $company->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('domain', 'Dominio:') !!}
    <p>{!! $company->domain !!}</p>
</div>
<div class="form-group">
    {!! Form::label('bd_database', 'Banco de dados:') !!}
    <p>{!! $company->bd_database !!}</p>
</div>

<div class="form-group">
    {!! Form::label('bd_username', 'Usuario:') !!}
    <p>{!! $company->bd_password !!}</p>
</div><div class="form-group">

    {!! Form::label('bd_password', 'Senha:') !!}
    <p>{!! $company->bd_password !!}</p>
</div>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Data da criação') !!}
    <p>{{ $company->created_at }}</p>
</div>



