<?php

namespace App\Http\Controllers;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Obat;
use PDF;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
{
    public function index()
    {
        $detail_pembelian = DetailPembelian::all();
        return view('detail_pembelian.index', [
        'detail_pembelian' => $detail_pembelian
        ]);
    }

public function create()
    {
    return view(
    'detail_pembelian.create', [
    'pembelian' => Pembelian::all(),
    'obat' => Obat::all()
        ]);
    }

public function store(Request $request)
    {
    $request->validate([
    'tgl_kadarluarsa' => 'required',
    'harga_beli'=> 'required',
    'jumlah_beli'=> 'required',
    'sub_total_beli'=> 'required',
    'persen_margin_jual'=> 'required',
    'id_pembelian'=> 'required',
    'id_obat'=> 'required'
    ]);
    $array = $request->only([
    'tgl_kadarluarsa',
    'harga_beli',
    'jumlah_beli',
    'sub_total_beli',
    'persen_margin_jual',
    'id_pembelian',
    'id_obat'
    ]);
    DetailPembelian::create($array);
    return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian baru');
    }

public function edit($id)
    {
    $detail_pembelian = DetailPembelian::find($id);
    if (!$detail_pembelian) return redirect()->route('detail_pembelian.index')->with('error_message', 'Detail Pembelian dengan id = '.$id.'tidak ditemukan');
    return view('detail_pembelian.edit', [
    'detail_pembelian' => $detail_pembelian,
    'pembelian' => Pembelian::all(),
    'obat' => Obat::all()
    ]);
    }

public function update(Request $request, Int $id)
    {
        $request->validate([
            'tgl_kadarluarsa' => 'required',
            'harga_beli'=> 'required',
            'jumlah_beli'=> 'required',
            'sub_total_beli'=> 'required',
            'persen_margin_jual'=> 'required',
            'id_pembelian'=> 'required',
            'id_obat'=> 'required'
            ]);
            // $detail_pembelian = DetailPembelian::find($id);

            $array = $request->only([
                'tgl_kadarluarsa',
                'harga_beli',
                'jumlah_beli',
                'sub_total_beli',
                'persen_margin_jual',
                'id_pembelian',
                'id_obat'
                ]);
            DetailPembelian::where('id', $id)->update($array);
            // $detail_pembelian->tgl_kadarluarsa = $request->tgl_kadarluarsa;
            // $detail_pembelian->harga_beli = $request->harga_beli;
            // $detail_pembelian->jumlah_beli = $request->jumlah_beli;
            // $detail_pembelian->sub_total_beli = $request->sub_total_beli;
            // $detail_pembelian->persen_margin_jual = $request->persen_margin_jual;
            // $detail_pembelian->id_pembelian = $request->id_pembelian;
            // $detail_pembelian->id_obat = $request->id_obat;
            // $detail_pembelian->save();
            return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil mengubah Detail Pembelian');
    }

    public function destroy(string $id)
    {
        $detail_pembelian = DetailPembelian::find($id);
        if ($detail_pembelian) $detail_pembelian->delete();
        return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menghapus detail pembelian');
    }

    public function exportpdf(){
        $data = DetailPembelian::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('detailpembelian-pdf');
        return $pdf->download('Datadetailpembelian.pdf');
    }
}
