<div class="row">
    <div class="form-group col-6">
        <label for="_nome">Empresa: </label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="_nome" value="{{old('nome', !empty($empresa->nome) ? $empresa->nome : '')}}" placeholder="nome">
        @error('nome')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group col-3">
        <label for="_cnpj">CNPJ: </label>
        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" id="_cnpj" value="{{old('cnpj', !empty($empresa->cnpj) ? $empresa->cnpj : '')}}" placeholder="cnpj">
        @error('cnpj')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
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
    <label for="_email">E-mail:</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="_email" value="{{old('email', !empty($empresa->email) ? $empresa->email : '')}}" placeholder="Preço">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
