<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
    
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt,pdf,xlx,csv,jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            $destinationPath = 'files/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = "$profileFile";
            $name=$file->getClientOriginalName();
            $files = $name;  

        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                                  ->with('success','Įrašas sukurtas');    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'file' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            $destinationPath = 'files/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = "$profileFile";
        }else{
            unset($input['file']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Įrašas atnaujintas');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('products.index')
                        ->with('success','Įrašas ištrintas');
    }
}