@extends('base')

@section('main')
<div>
    <h3>Atualizar uma tarefa</h3>
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
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" value="{{ $task->title }}" />
        </div>
        <div>
            <label for="description">Descrição</label>
            <input type="text" name="description" value="{{ $task->description }}" />
        </div>
        <div>
            <label for="employee_id">Funcionário(a)</label>
            <select name="employee_id">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $task->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Atualizar</button>
    </form>
</div>
@endsection
