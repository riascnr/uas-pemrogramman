<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Session;


class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('barang', compact('data'))->with('i');
    }

    public function simpan(Request $request)
    {
        
        $data = new Barang();
            $data->kode_barang = $request->kode_barang;
            $data->nama_barang = $request->nama_barang;
            $data->harga_beli = $request->harga_beli;
            $data->harga_jual = $request->harga_jual;
        $data->save();
        Session::flash('sukses', 'Data berhasil disimpan');
        return back();

    }

    public function hapus($id)
    {
        $data = Barang::find($id);
        $data->delete();
        Session::flash('sukses', 'Data Berhasil Dihapus');
        return back();
    }

    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
            $data->kode_barang = $request->kode_barang;
            $data->nama_barang = $request->nama_barang;
            $data->harga_beli = $request->harga_beli;
            $data->harga_jual = $request->harga_jual;
        $data->save();
        Session::flash('sukses', 'Data Berhasil Diupdate');
        return back();
    }
}