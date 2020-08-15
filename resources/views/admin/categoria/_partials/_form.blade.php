
<div class="form-group">
    <label for="_nome">Nome: </label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($categoria->nome) ? $categoria->nome : '')}}" placeholder="nome">
    @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_descricao">Descrição</label>
    <textarea class="form-control  @error('descricao') is-invalid @enderror" name="descricao" id="_descricao" >{{old('descricao', !empty($categoria->descricao) ? $categoria->descricao : '')}}</textarea>
    @error('descricao')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>