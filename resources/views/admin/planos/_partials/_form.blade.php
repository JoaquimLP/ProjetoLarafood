
<div class="form-group">
    <label for="_nome">Nome: </label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($plano->nome) ? $plano->nome : '')}}" placeholder="Nome">
    @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_preco">Preço:</label>
    <input type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" id="_preco" value="{{old('preco', !empty($plano->preco) ? $plano->preco : '')}}" placeholder="Preço">
    @error('preco')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_descricao">Descrição:</label>
    <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="_descricao" value="{{old('descricao', !empty($plano->descricao) ? $plano->descricao : '')}}" placeholder="descricao">
    @error('descricao')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>