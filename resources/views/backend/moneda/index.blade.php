@extends('backend.base') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content') 


@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif


<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="box-title">Monedas </h4>
        </div>
        <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nombre</th>
                            <th scope="col">simbolo</th>
                            <th scope="col">pais</th>
                            <th scope="col">valor</th>
                            <th scope="col">fecha</th>
                            <th scope="col">show</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monedas as $moneda)
                        <tr>
                            <td scope="row">{{ $moneda->id }}</td>
                            <td>{{ $moneda->nombre }}</td>
                            <td>{{ $moneda->simbolo }}
                                <td>{{ $moneda->pais }}</td>
                                <td>{{ $moneda->valor }}</td>
                                <td>{{ date('d-m-Y', strtotime($moneda->fecha)) }}</td>

                                <td><a class="btn btn-info" href="{{ url('backend/moneda/' . $moneda->id) }}">show</a></td>
                                <td><a class="btn btn-warning" href="{{ url('backend/moneda/' . $moneda->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$moneda->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
            <!-- /.table-stats -->
        </div>
    </div>
    <!-- /.card -->
</div>

<form id="formDelete" action="{{ url('backend/moneda') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection