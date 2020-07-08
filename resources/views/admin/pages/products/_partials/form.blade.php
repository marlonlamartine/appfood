@include('admin.includes.alerts')

@csrf                
<div class="form-group">
    <label for="title">* Título:</label>
    <input type="text" name="title" class="form-control" placeholder="Informe um título" value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label for="price">* Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Informe um preço" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="name">* Imagem:</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label for="description">* Descrição:</label>
    <textarea name="description" cols="39" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">                    
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>