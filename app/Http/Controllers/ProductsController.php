<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\product;
use Illuminate\Support\Str;
class ProductsController extends Controller
{
    public function index()
    {   
        $products = product::all();
        return view('product', compact('products'));

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_barang' =>'required',
            'nama_barang'=>'required|string|min:5|max:80',
            'harga_barang'=>'required|numeric',
            'jumlah_barang'=>'required|numeric',
            'foto_barang' =>'required|image|mimes:jpeg,png,jpg'
        ]);

    

       

        // $request->foto_barang->store('public');

        //mencegah nama samaan (nama.waktu.formatfile)
        // $imgname= $request->foto_barang->getClientOriginalName()."-".time(). '.'. $request->foto_barang->extension();
        // $request->foto_barang->move(public_path('image'), $imgname);

    $files = $request->file('foto_barang');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $Image = $fileName . "-" . Str::random(10) . "-" . date('YmdHis') . "." . $extension;
        $files->storeAs('public/images/', $Image);

    
        // product::create($request->all());

         product::create ([
            'kategori_barang'=> $request->kategori_barang,
            'nama_barang'=> $request->nama_barang,
            'harga_barang'=> $request->harga_barang,
            'jumlah_barang'=> $request->jumlah_barang,
            'foto_barang'=> $Image
        ]);

        return redirect ('/product')->with ('status' , 'barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $products = product::find($id);
        return view ('edit', compact('products'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_barang' =>'required',
            'nama_barang'=>'required|string|min:5|max:80',
            'harga_barang'=>'required|numeric',
            'jumlah_barang'=>'required|numeric',
            'foto_barang' =>'required'
        ]);

    

        $products = product::find($id);
        $products->update($request->all());
            return redirect ('/product')->with ('status' , 'update success');
    }

    public function delete($id)
    {
        product::destroy($id);
        return redirect ('/product');
    }


}
