<div class="table-responsive-sm">
    <table class="table table-striped" id="companies-table">
        <thead>
            <tr>
                <th>Nome da empresa</th>
                <th>Dominio</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{!! $company->name !!}</td>
                <td>{!! $company->domain !!}</td>

                <td>
                    {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$company->id]) }}" class='btn btn-ghost-success'><i class="fa fa-lg fa-eye"></i></a>
                        <a href="{{ route('companies.edit', [$company->id]) }}" class='btn btn-ghost-info'><i class="fa fa-lg fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-lg fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
