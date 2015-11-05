@extends('layouts.admin')

@section('title', 'Gerenciamento de Tags')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Gerenciamento de Tags</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Adicionar nova tag</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.tags.store', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Tag') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Categoria mãe') !!}
                    {!! Form::select('category', $categories, null, ['placeholder' => 'Selecione uma categoria', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('category') }}</small>
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
            <h2>Editar tags</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Categoria mãe
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>
                            <td>
                                {{$categories[$tag->category_id]}}
                            </td>
                            <td>
                                {!! Html::decode(link_to_route('admin.tags.edit', '<i class="fa fa-pencil-square-o"></i>', $tag->id, ['class' => 'btn btn-sm btn-warning'])) !!}
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => array('admin.tags.destroy', $tag->id)]) !!}
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
