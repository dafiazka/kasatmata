<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function product()
    {
        $barangs = DB::table('barangs')->get();

        return view('product.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('product.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'kategori' => ['required'],
        ]);


        $post = new Barang;
        $post->nama_barang = $request->nama_barang;
        $post->deskripsi = $request->deskripsi;
        $post->harga = $request->harga;
        $post->stok = $request->stok;
        $post->kategori = $request->kategori;

        if($request->file('gambar')){
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post', $name);
            $post->gambar = $name;
        }


        $post->save();

        return redirect('product')->with('status', 'Barang Berhasil Di Tambah');
        // dd($request->all());
    }

    public function edit($id)
    {
        $barangs = DB::table('barangs')->where('id', $id)->first();

        return view('product.edit', compact('barangs'));
        // dd($barangs);
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'kategori' => ['required'],
        ]);

        $post = Barang::findorfail($id);

        $post->nama_barang = $request->nama_barang;
        $post->deskripsi = $request->deskripsi;
        $post->harga = $request->harga;
        $post->stok = $request->stok;
        $post->kategori = $request->kategori;

        if($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post', $name);
            $post->gambar = $name;
        }

        $post->update();

        // dd($request->all());
        return redirect('product')->with('status', 'Barang Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barangs')->where('id', $id)->delete();
        return back()->with('status', 'Barang Berhasil Di Hapus');
    }
}
