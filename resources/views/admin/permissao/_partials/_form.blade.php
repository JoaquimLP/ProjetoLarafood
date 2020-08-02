<div class="form-group">
    <label for="_nome">Permissão</label>
    <input type="text" class="form-control  @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($permissao->nome) ? $permissao->nome : '')}}" placeholder="Nome da Permissão">
    @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_descricao">Descrição</label>
    <textarea class="form-control  @error('descricao') is-invalid @enderror" name="descricao" id="_descricao" >{{old('descricao', !empty($permissao->descricao) ? $permissao->descricao : '')}}
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