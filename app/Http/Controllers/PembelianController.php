<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Distributor;
use App\Models\User;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', [
        'pembelian' => $pembelian
        ]);
    }

public function create()
    {
    return view(
    'pembelian.create', [
    'distributor' => Distributor::all(),
    'users' => User::all()
        ]);
    }

public function store(Request $request)
    {
    $request->validate([
    'nonota_beli' => 'required',
    'tgl_beli'=> 'required',
    'total_beli'=> 'required',
    'id_distributor'=> 'required',
    'id_user'=> 'required'
    ]);
    $array = $request->only([
    'nonota_beli',
    'tgl_beli',
    'total_beli',
    'id_distributor',
    Auth::id()
    ]);
    dd($array);
    Pembelian::create($array);
    return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menambah Pembelian baru');
    }

public function edit($id)
    {
    $pembelian = Pembelian::find($id);
    if (!$pembelian) return redirect()->route('pembelian.index')->with('error_message', 'Pembelian dengan id = '.$id.'tidak ditemukan');
    return view('pembelian.edit', [
    'pembelian' => $pembelian,
    'distributor' => Distributor::all(),
    'users' => User::all()
    ]);
    }

public function update(Request $request, Int $id) // itu dikasih Int sebelum variable $id biar diubah yang string jadi Int bisa cegah sql injection juga
    {
        $request->validate([
            'nonota_beli' => 'required',
            'tgl_beli' => 'required',
            'total_beli' => 'required',
            'id_distributor' => 'required',
            'id_user' => 'required'
            ]);

            // ! Ini error bel
            // $pembelian = Pembelian::find($id);
            // $pembelian->nonota_beli = $request->nonota_beli;
            // $pembelian->tgl_beli = $request->tgl_beli;
            // $pembelian->total_beli = $request->total_beli;
            // $pembelian->id_distributor = $request->id_distributor;
            // $pembelian->id_user = $request->id_user;
            // $pembelian->save();

            // ? Bisa lebih gampang gini
            $array = $request->only([
                'nonota_beli',
                'tgl_beli',
                'total_beli',
                'id_distributor',
                'id_user'
            ]);
            Pembelian::where('id', $id)->update($array);

            return redirect()->route('pembelian.index')->with('success_message', 'Berhasil mengubah pembelian');
    }

    public function destroy(Request $request, $id)
    {
        $pembelian = Pembelian::find($id);
        if ($pembelian) $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menghapus pembelian');
    }
}
