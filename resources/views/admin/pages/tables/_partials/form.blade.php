@include('admin.includes.alerts')

@csrf                
<div class="form-group">
    <label for="identify">Identificador da Mesa:</label>
    <input type="text" name="identify" class="form-control" placeholder="Informe um identificador" value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" cols="39" rows="5" class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>
<div class="form-group">                    
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>