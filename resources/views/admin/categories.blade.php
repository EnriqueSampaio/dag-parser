@extends('layouts.admin')

@section('title', 'Gerenciamento de Categorias')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Gerenciamento de Categorias</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Adicionar nova categoria</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.categories.store', 'class' => 'form-horizontal']) !!}
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
                    {!! Form::reset("Limpar", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit("Adicionar", ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h2>Editar categorias</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Alterar
                        </th>
                        <th>
                            Remover
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                {{$category->description}}
                            </td>
                            <td>
                                {!! Html::decode(link_to_route('admin.categories.edit', '<i class="fa fa-pencil-square-o"></i>', $category->id, ['class' => 'btn btn-sm btn-warning'])) !!}
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => array('admin.categories.destroy', $category->id)]) !!}
                                        {!! Form::button('<i class="fa fa-times"></i>', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
