@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" id="" placeholder="Nome: " class="form-control" value="{{$detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>