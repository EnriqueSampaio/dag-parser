@extends('layouts.admin')

@section('title', 'Parser')

@section('content')
<?php setlocale(LC_TIME, "pt_BR.UTF-8"); ?>

    <div class="row">
        <div class="col-xs-12">
            <h1>Parser</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.investimentos.parser', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('sheet', 'Enviar Planilha') !!}
                    {!! Form::file('sheet', ['class' => 'required']) !!}
                    <p class="help-block">Envie a planilha da qual os dados devem ser extraídos</p>
                    <small class="text-danger">{{ $errors->first('sheet') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Cidade') !!}
                    {!! Form::select('city', $cities, null, ['placeholder' => 'Selecione a cidade à qual pertencem os dados', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('month', 'Mês') !!}
                    {!! Form::selectMonth('month', null, ['placeholder' => 'Selecione o mês ao qual pertence os dados', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('month') }}</small>
                </div>
                {!! Form::submit('Analisar', ['class' => 'btn btn-success pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
