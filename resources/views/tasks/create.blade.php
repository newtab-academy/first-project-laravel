@extends('base')

@section('main')
<div>
    <h3>Adiciona tarefa</h3>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
    @endif

    @if(count($employees) > 0)
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf
            <div>
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title"/>
            </div>

            <div>
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description"/>
            </div>

            <div>
                <label for="employee_id">Funcionário</label>
                <select name="employee_id">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->email }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary-outline">Adiciona tarefa</button>
        </form>
    @else
        <p>Nenhum funcionário(a) cadastrado =/</p>
        <p>Clique para
            <a href="{{ route('employees.create') }}">Criar Funcionário(a)</a>
        </p>
    @endif
</div>
@endsection
