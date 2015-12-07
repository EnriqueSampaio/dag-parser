@extends('layouts.admin')

@section('title', 'Confirmar ações do parser')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Confirmar ações do parser</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.investimentos.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Domínio
                                    </th>
                                    <th>
                                        Categoria
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investiments as $idx => $investiment)
                                    <tr>
                                        <td>
                                            {{$investiment[1]->name}}
                                        </td>
                                        <td>
                                            {!! Form::select('category', $categories, $investiment[1]->category_id, ['class' => 'form-control', 'required' => 'required']) !!}
                                            <small class="text-danger">{{ $errors->first('category') }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! Form::submit('Confirmar', ['class' => 'btn btn-success pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
