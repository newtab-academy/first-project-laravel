@extends('base')

@section('main')
<div>
    <h3>Adiciona funcionário(a)</h3>
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
    <form method="post" action="{{ route('employees.store') }}">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name"/>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>

        <button type="submit">Criar</button>
    </form>
</div>
@endsection
