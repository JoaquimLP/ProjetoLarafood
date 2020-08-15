
<div class="form-group">
    <label for="_titulo">Produto: </label>
    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="_nome" value="{{old('titulo', !empty($produto->titulo) ? $produto->titulo : '')}}" placeholder="titulo">
    @error('titulo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_image">Image: </label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="_image">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_preco">Preço:</label>
    <input type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" id="_preco" value="{{old('preco', !empty($produto->preco) ? $produto->preco : '')}}" placeholder="Preço">
    @error('preco')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_descricao">Descrição</label>
    <textarea class="form-control  @error('descricao') is-invalid @enderror" name="descricao" id="_descricao" >{{old('descricao', !empty($produto->descricao) ? $produto->descricao : '')}}</textarea>
    @error('descricao')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>