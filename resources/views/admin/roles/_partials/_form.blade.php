<div class="form-group">
    <label for="_nome">Função</label>
    <input type="text" class="form-control  @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($perfil->nome) ? $perfil->nome : '')}}" placeholder="Nome da função">
    @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_descricao">Descrição</label>
    <textarea class="form-control  @error('descricao') is-invalid @enderror" name="descricao" id="_descricao" >{{old('descricao', !empty($perfil->descricao) ? $perfil->descricao : '')}}
    </textarea>
    @error('descricao')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
