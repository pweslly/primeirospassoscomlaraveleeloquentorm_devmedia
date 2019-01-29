@extends('shared.base')
@section('content')
    <div class="panel panel-default">
    <!-- Default Panel contentes -->
    <div class="panel-heading">Detalhes do Imóvel </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Sobre o imóvel</h4>
                <p>Descrição: {{$imovel->descricao}}</p>
                <p>Precço: R$ {{number_format($imovel->preco,2,',','.')}}</p>
                <p>Quantidade de quartos: {{$imovel->qtdQuartos}}</p>
                <p>Tipo: {{$imovel->tipo}}</p>
                <p>Finalidade: {{$imovel->finalidade}}</p>
                <hr>
                <h4>Endereço</h4>
                <p>Logradouro: {{$imovel->logradouroEndereco}} </p>
                <p>Bairro: {{$imovel->bairroEndereco}} </p>
                <p>Número: {{$imovel->numeroEndereco}}</p>
                <p>Cep: {{$imovel->cepEndereco}}</p>
            </div>
        </div>
    </div>
    <a href="{{url()->previous() }}" class="btn btn-default">Voltar</a>
    @endsection

    