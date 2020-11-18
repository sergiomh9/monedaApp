@extends('backend.base') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/moneda') }}" class="btn btn-secondary">Monedas</a>
            <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->name }}" class="btn btn-danger" id="enlaceBorrar">Borrar Moneda</a>
        </div>

    </div>
</div>

@if(session()->has('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h2>Error ...</h2>
        </div>
    </div>
</div>
@endif



<div class="col-lg-12">
    <div class="card">
        <form role="form" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post" id="editMonedaForm" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" maxlength="45" minlength="2" required class="form-control" id="nombre" placeholder="Nombre de la Moneda" name="nombre" value="{{ old('nombre', $moneda->nombre) }}">
                </div>
                <div class="form-group">
                    <label for="simbolo">Simbolo</label>
                    <input type="text" maxlength="15" minlength="9" required class="form-control" id="simbolo" placeholder="Simbolo de la Moneda" name="simbolo" value="{{ old('simbolo', $moneda->simbolo) }}">
                </div>
                <div class="form-group">
                    <label for="pais">Pais</label>
                    <input type="text" maxlength="100" minlength="2" required class="form-control" id="pais" placeholder="Pais de la Moneda" name="pais" value="{{ old('pais', $moneda->pais) }}">
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="decimal" required class="form-control" id="valor" placeholder="Valor de la Moneda en Euros" name="valor" value="{{ old('valor', $moneda->valor) }}">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de entrada en vigor</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $moneda->fecha) }}">
                </div>
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
                <!--<div class="form-group">-->
                <!--    <label for="logo">Logo</label>-->
                <!--    <input type="file" class="form-control" id="logo"  name="logo">-->
                <!--</div>-->
            </div>

            <!-- /.card-body -->

        </form>

    </div>
</div>
@endsection