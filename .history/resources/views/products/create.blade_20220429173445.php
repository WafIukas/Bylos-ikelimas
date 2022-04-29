@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
           <h2>Naujas įrašas</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('products.index') }}">Atgal</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
    <strong>Klaida!</strong> Kažka suvedėte netaip<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">         
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Failas:</strong>
                <input type="file" name="file" class="form-control" placeholder="failas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br>
        <button type="submit" class="btn btn-primary">Patvirtinti</button>               
        </div>
    </div>
     
</form>
@endsection