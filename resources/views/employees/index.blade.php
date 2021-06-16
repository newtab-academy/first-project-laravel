@extends('base')

@section('main')
<div>
    <a href="/tasks">Ir para Tarefas</a>
    <h2>Listagem de Funcionários(as)</h2>
    @if(session()->get('success'))
        <div>
        {{ session()->get('success') }}
        </div>
    @endif
    <div>
        <a href="{{ route('employees.create') }}">Criar Funcionário(a)</a>
    </div>
    <br />
    <table>
        <thead>
            <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Nº Tarefas</td>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{count($employee->tasks)}}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id)}}">Editar</a>
                </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
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
