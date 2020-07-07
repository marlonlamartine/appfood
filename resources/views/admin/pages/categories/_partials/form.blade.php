@include('admin.includes.alerts')

@csrf                
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Informe um nome" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" cols="39" rows="5" class="form-control">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">                    
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>