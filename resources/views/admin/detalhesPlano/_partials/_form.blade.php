
<div class="form-group">
    <label for="_nome">Detalhes: </label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($detalhe->nome) ? $detalhe->nome : '')}}" placeholder="Nome">
    @error('nome')
        <div class="alert alert-danger">{{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>