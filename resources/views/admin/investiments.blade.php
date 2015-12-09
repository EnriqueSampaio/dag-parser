@extends('layouts.admin')

@section('title', 'Parser')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Parser</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.investimentos.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <div class="form-group">
                {!! Form::label('file', 'Enviar Planilha') !!}
                {!! Form::file('file', ['class' => 'required']) !!}
                <p class="help-block">Envie a planilha da qual os dados devem ser extraídos</p>
                <small class="text-danger">{{ $errors->first('file') }}</small>
            </div>
            <div class="form-group">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::select('city', $cities, null, ['placeholder' => 'Selecione a cidade à qual pertencem os dados', 'class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('city') }}</small>
            </div>
            <div class="form-group">
                {!! Form::label('month', 'Mês') !!}
                {!! Form::selectMonth('month', null, ['placeholder' => 'Selecione o mês ao qual pertence os dados', 'class' => 'form-control']) !!}
                <small class="help-block">Caso os dados sejam do ano inteiro, não selecione nenum mês</small>
                <small class="text-danger">{{ $errors->first('month') }}</small>
            </div>
            <div class="form-group">
                {!! Form::label('year', 'Ano') !!}
                {!! Form::selectYear('year', 2010, 2015, null, ['placeholder' => 'Selecione o ano ao qual pertence os dados', 'class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('year') }}</small>
            </div>
            {!! Form::submit('Analisar', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#loadingModal']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="Carregando...">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Carregando...</h4>
                </div>
                <div class="modal-body">
                    Aguarde enquanto o parser classifica os dados :)
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
@endsection
