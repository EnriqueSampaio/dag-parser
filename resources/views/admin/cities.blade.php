@extends('layouts.admin')

@section('title', 'Gerenciamento de Cidades')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Gerenciamento de Cidades</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Adicionar nova cidade</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.cidades.store', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome da cidade') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('populations', 'População') !!}
                            {!! Form::text('populations', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('populations') }}</small>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('founded', 'Fundação') !!}
                            {!! Form::date('founded', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('founded') }}</small>
                        </div>
                    </div>
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
                            Cidade
                        </th>
                        <th>
                            População
                        </th>
                        <th>
                            Fundação
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
                    @foreach($cities as $city)
                        <tr>
                            <td>
                                {{$city->name}}
                            </td>
                            <td>
                                {{$city->population}}
                            </td>
                            <td>
                                {{$city->founded}}
                            </td>
                            <td>
                                {!! Html::decode(link_to_route('admin.cidades.edit', '<i class="fa fa-pencil-square-o"></i>', $city->id, ['class' => 'btn btn-sm btn-warning'])) !!}
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => array('admin.cidades.destroy', $city->id)]) !!}
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

@section('custom-js')
    <script type="text/javascript">
        $("#founded").mask("99/99/9999", {placeholder: "DD/MM/AAAA"});
    </script>
@endsection
