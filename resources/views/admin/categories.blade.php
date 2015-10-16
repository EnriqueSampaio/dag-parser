@extends('layouts.admin')

@section('title', 'Gerenciamento de Categorias')

@section('content')
    <h1>Gerenciamento de Categorias</h1>

    <div class="row">
        <h2>Adicionar nova categoria</h2>

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
    </div>

    <div class="row">
        <h2>Remover categoria</h2>

        {!! Form::open(['method' => 'DELETE', 'route' => 'categories.destroy', 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Categoria a ser excluída') !!}
                {!! Form::select('name', $categories, ['class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>

            <div class="btn-group pull-right">
                {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection
