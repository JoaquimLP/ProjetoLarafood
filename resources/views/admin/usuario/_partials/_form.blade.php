
<div class="form-group">
    <label for="_name">Nome: </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="_name" value="{{old('name', !empty($usuario->name) ? $usuario->name : '')}}" placeholder="name">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_email">E-mail:</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="_email" value="{{old('email', !empty($usuario->email) ? $usuario->email : '')}}" placeholder="E-mail">
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_password">Senha:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="_password" value="{{old('password')}}" placeholder="password">
    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="_password1">Repita a senha:</label>
    <input type="password" class="form-control @error('password1') is-invalid @enderror" name="password1" id="_password" value="{{old('password1')}}" placeholder="senha">
    @error('password1')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>