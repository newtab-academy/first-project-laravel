@extends('base')

@section('main')
<div>
    <a href="/employees">Ir para Funcionários</a>
    <h2>Listagem de Tarefas</h2>
    @if(session()->get('success'))
        <div>
        {{ session()->get('success') }}
        </div>
    @endif
    <div>
        <a href="{{ route('tasks.create') }}">Criar Tarefa</a>
    </div>
    <br />
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titulo</td>
                <td>Descrição</td>
                <td>Email Funcionário(a)</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->employee->email}}</td>
                <td>
                    <a href="{{ route('tasks.edit',$task->id)}}">Editar</a>
                </td>
                <td>
                    <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
