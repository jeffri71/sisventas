@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<h3>Nuevo Articulo</h3>
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors-> all() as $error)
					<li>
					{{$error}}
					</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
		{!!Form::open(array('url'=>'almacen/articulo','metodo'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
		{{Form::token()}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">	
<div class="col-lg-6 col-md-6 col-dm-12 col-xs-12">
	<div class="form-group">
			<label for="codigo">codigo</label>
			<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo del articulo...">
		</div>
</div>
<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			<label>Categoria</label>
			<select name="idcategoria" class="form-control">
				@foreach ($categorias as $cat)
				<option value="{{$cat->idcategoria}}"> {{$cat->Nombre}} </option>
				@endforeach
			</select>
		</div>
</div>
<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			<label for="stock">Stock</label>
			<input type="text" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stok del articulo...">
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
		<label for="impuesto">impuesto</label>
			<select name="impuesto" id="impuesto" class="form-control">
			@foreach($impuestos as $impuesto)
			<option value= "{{$impuesto->porcentaje}}">{{$impuesto->descripccion}}</option>
			@endforeach
			</select>
		</div>
	</div>
<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="form-group"> 
			<label for="descripccion">Descripcción </label>
  			<textarea name=descripccion wrap=physical class="form-control"
 onKeyDown="textCounter(this.form.descripccion,this.form.remLen,200);" 
 onKeyUp="textCounter(this.form.descripccion,this.form.remLen,200);"
    ></textarea>
<br>
<input readonly type=text name=remLen size=3 maxlength=3 value="0"> Total Caracteres - Maximo 200 caracteres</div>
</div>

<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="form-group">
			<label for="imagen">Imagen</label>
			<input type="file" name="imagen"  class="form-control">
		</div>
</div>
<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a class="btn btn-danger" href="/almacen/articulo" role="button">Cancelar</a>
	</div>
</div>
</div>
{!!Form::close()!!}  
         @push ('scripts')
<script>

	function textCounter (field, countfield, maxlimit) {
    if (field.value.length > maxlimit) {
        field.value = field.value.substring(0, maxlimit);
        countfield.value = 'max characters';
    } else { // otherwise, update 'characters left' counter
        countfield.value = field.value.length;
    }
}

</script>
@endpush
@endsection