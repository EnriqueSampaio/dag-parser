@extends('layouts.admin')

@section('title', 'Atualizar Cidade')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Atualizar Cidade</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'PATCH', 'route' => array('admin.cidades.update', $city->id), 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome da cidade') !!}
                    {!! Form::text('name', $city->name, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('population', 'População') !!}
                            {!! Form::text('population', $city->population, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('population') }}</small>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('founded', 'Fundação') !!}
                            {!! Form::date('founded', $city->founded, ['class' => 'form-control', 'required' => 'required']) !!}
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
@endsection

@section('custom-js')
    <script type="text/javascript">
        $("#founded").mask("99/99/9999", {placeholder: "DD/MM/AAAA"});
    </script>
@endsection
