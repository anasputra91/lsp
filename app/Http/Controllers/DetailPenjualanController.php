<?php

namespace App\Http\Controllers;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Obat;
use Illuminate\Http\Request;
use PDF;
class DetailPenjualanController extends Controller
{
    public function index()
    {
        $detail_penjualan = DetailPenjualan::all();
        return view('detail_penjualan.index', [
        'detail_penjualan' => $detail_penjualan
        ]);
    }

public function create()
    { 
    return view( 
    'detail_penjualan.create', [ 
    'penjualan' => Penjualan::all(),
    'obat' => Obat::all()
        ]);
    }

public function store(Request $request)
    { 
    $request->validate([
    'jumlah_jual' => 'required', 
    'harga_jual'=> 'required',
    'sub_total_jual'=> 'required',
    'id_penjualan'=> 'required',
    'id_obat'=> 'required'
    ]);
    $array = $request->only([
    'jumlah_jual', 
    'harga_jual', 
    'sub_total_jual', 
    'id_penjualan',
    'id_obat'
    ]);
    DetailPenjualan::create($array);
    return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah Detail Penjualan baru');
    }

public function edit($id)
    {
    $detail_penjualan = DetailPenjualan::find($id);
    if (!$detail_penjualan) return redirect()->route('detail_penjualan.index')->with('error_message', 'Detail Penjualan dengan id = '.$id.'tidak ditemukan');
    return view('detail_penjualan.edit', [
    'detail_penjualan' => $detail_penjualan,
    'penjualan' => Penjualan::all(),
    'obat' => Obat::all() 
    ]);
    }

public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_jual' => 'required', 
            'harga_jual'=> 'required',
            'sub_total_jual'=> 'required',
            'id_penjualan'=> 'required',
            'id_obat'=> 'required'
            ]);
            $detail_penjualan = DetailPenjualan::find($id);
            $detail_penjualan->jumlah_jual = $request->jumlah_jual;
            $detail_penjualan->harga_jual = $request->harga_jual;
            $detail_penjualan->sub_total_jual = $request->sub_total_jual;
            $detail_penjualan->id_penjualan = $request->id_penjualan;
            $detail_penjualan->id_obat = $request->id_obat;
            $detail_penjualan->save();
            return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil mengubah Detail Penjualan');
    }

    public function destroy(string $id)
    {
        $detail_penjualan = DetailPenjualan::find($id);
        if ($detail_penjualan) $detail_penjualan->delete();
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menghapus detail penjualan');
    }

    public function exportpdf2(){
        $data = DetailPenjualan::all();
    
        view()->share('data',$data);
        $pdf = PDF::loadview('detailpenjualan-pdf');
        return $pdf->download('Datadetailpenjualan.pdf');
    }
}
