@include('admin.includes.alerts')

@csrf                
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Informe um nome" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Informe uma descrição" value="{{ $profile->description ?? old('description') }}">
</div>
<div class="form-group">                    
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>