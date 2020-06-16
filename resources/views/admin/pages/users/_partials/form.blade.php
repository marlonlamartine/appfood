@include('admin.includes.alerts')

@csrf                
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Informe um nome" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email" class="form-control" placeholder="Informe um email" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="password">Senha:</label>
    <input type="text" name="password" class="form-control" placeholder="Informe uma senha">
</div>
<div class="form-group">                    
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>