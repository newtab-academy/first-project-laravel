@extends('base')

@section('main')
<div>
    <h3>Atualizar funcionário(a)</h3>
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
    <form method="post" action="{{ route('employees.update', $employee->id) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ $employee->name }}" />
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $employee->email }}" />
        </div>
        <button type="submit">Atualizar</button>
    </form>
    <hr>
    <div>
        @if(count($employee->tasks) > 0)
            <h3>Tarefas atribuídas</h3>
            <ul>
                @foreach ($employee->tasks as $task)
                <li>Título: {{ $task->title }} | Descrição: {{ $task->description }}</li>
                @endforeach
            </ul>
        @else
            <h3>Nenhuma tarefa atribuída.</h3>
        @endif
    </div>
</div>
@endsection
