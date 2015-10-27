@extends('layouts.admin')

@section('title', 'Atualizar Categoria')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Atualizar Categoria</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'PATCH', 'route' => array('admin.categorias.update', $category->id), 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome da categoria') !!}
                    {!! Form::text('name', $category->name, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Breve descrição da categoria') !!}
                    {!! Form::textarea('description', $category->description, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::reset("Restaurar", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit("Atualizar", ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
