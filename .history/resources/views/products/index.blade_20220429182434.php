@extends('products.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Failo ikelimas</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}">Kurti nauja įraša</a>
            </div>
            <br>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Failas</th>
            <th>Pavadinimas</th>
            <th>Persisiuti</th>
            <th width="280px">Veiksmai</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/files/{{ $product->file }}" width="100px"></td>
            <td>{{ $product->file }}</td>
            <td><a href="{{'public/'.$product->path}}"   download>{{'public/'.$product->path}}</a></td>
            <td><a href="get/{{$product->koduotas_pavadinimas}}">Parsisiusti</a></td>
            <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
               <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Perziura</a>

               <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Redagavimas</a>
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Trinti</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}
        
@endsection