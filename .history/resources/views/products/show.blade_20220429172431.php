@extends('products.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2> Peržiura</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Atgal</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Vardas:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Komentaras:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Failas:</strong>
                <img src="/images/{{ $product->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection