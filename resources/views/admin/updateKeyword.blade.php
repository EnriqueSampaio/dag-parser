@extends('layouts.admin')

@section('title', 'Atualizar Tag')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Atualizar Tag</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'PATCH', 'route' => array('admin.tags.update', $tag->id), 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Tag') !!}
                    {!! Form::text('name', $tag->name, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Categoria mãe') !!}
                    {!! Form::select('category', $categories, $tag->category_id, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('category') }}</small>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::reset("Limpar", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit("Adicionar", ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
