@extends('layouts.admin')

@section('title', 'Gerenciamento de Categorias')

@section('content')
    <h1>Gerenciamento de Categorias</h1>

    {!! Form::open(['method' => 'POST', 'route' => 'categories.store', 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome da categoria') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Breve descrição da categoria') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>

        <div class="btn-group pull-right">
            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
            {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
        </div>

    {!! Form::close() !!}
@endsection
