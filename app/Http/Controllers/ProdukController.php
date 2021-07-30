<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Brandimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.produk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'namaProduk' => 'required|unique:brands,produk',
            'imgProduk' => 'required|mimes:png,jpg,jpeg'
        ]);

        $produk = new Brand;

        $produk->produk = $request->namaProduk;
        $produk->user_id = Auth::user()->id;

        $produk->save();

        $imgProduk = Brand::where('produk',$request->namaProduk)->first();

        $img = new Brandimg;

        $i = 0;

        dd($request->imgProduk);

        foreach($request->imgProduk as $imgs){

            $imgname = $request->namaProduk.uniqid().$imgs->extension();
            Image::make($imgs)
                    ->resize(200,200)
                    ->save('public/img/produk/'.$imgname,60);

            $img->img = $imgname;
            $img->brand_id = $imgProduk->id;

        }

        return redirect()->route('produk')->with('scs','tambah data sukses');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
