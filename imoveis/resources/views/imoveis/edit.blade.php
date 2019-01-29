@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite o Imóvel</h3></div>
        <div class="panel-body">
            <form method="post" action="">
                <h4>Dados do imóvel</h4>
                <hr>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" placeholder="Descricao" name="descricao" required value="{{$imovel->descricao}}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preco"> Preço </label>
                                <input type="text" class="form-control" placeholder="Preço" name="preco" required value="{{$imovel->preco}}">
                            </div>
                            <div class="cold-md-6">
                                <div class="form-group">
                                    <label for="qtdQuartos">Quantidade de Quartos</label>
                                    <input type="number" class="form-control" placeholder="Quantidade de Quartos" name="qtdQuartos"  required value="{{$imovel->qtdQuartos}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo de imóvel</label>
                                    <select class="form-control" name="tipo" value="{{$imovel->tipo}}" required>
                                        <option {{($imovel->tipo == 'apartamento' ? 'selected': '')}}>Apartamento</option>
                                        <option {{($imovel->tipo == 'casa' ? 'selected': '')}}>Casa</option>
                                        <option {{($imovel->tipo == 'kitnet' ? 'selected' : '')}}>Kitnet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finalidade">Finalidade do imóvel</label>
                                    <select class="form-control" name="finalidade" required>
                                        <option {{($imovel->finalidade == 'venda' ? 'selected' : '')}}>Venda</option>
                                        <option {{($imovel->finalidade == 'locação' ? 'selected': '')}}>Locação</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h4>Endereço</h4>
                        <hr>
                            <div class="form-group">
                                <label for="logradouroEndereco">Logradouro</label>
                                <input type="text" class="form-control" placeholder="Logradouro" required name="logradouroEndereco" value="{{$imovel->logradouroEndereco}}">
                            </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="bairroEndereco">Bairro</label>
                                    <input type="text" class="form-control" placeholder="Bairro" required name="bairroEndereco" value="{{$imovel->numeroEndereco}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Número</label>
                                    <input type="number" class="form-control" placeholder="Número" required name="numeroEndereco" value="{{$imovel->numeroEndereco}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cidadeEndereco">Cidade</label>
                                    <input type="text" class="form-control" placeholder="Cidade" required name="cidadeEndereco" value="{{$imovel->cidadeEndereco}}">
                                </div>                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cepEndereco">CEP</label>
                                <input type="text" class="form-control" placeholder="CEP" required name="cepEndereco" value="{{$imovel->cepEndereco}}">
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    @endsection
