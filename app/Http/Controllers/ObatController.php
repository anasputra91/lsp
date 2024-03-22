<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index', [
        'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'golongan' => 'required',
            'kemasan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
            ]);
            $array = $request->only([
                'kode_obat',
                'nama_obat',
                'merk',
                'jenis',
                'satuan',
                'golongan',
                'kemasan',
                'harga_jual',
                'stok'
            ]);
            $obat = Obat::create($array);
            return redirect()->route('obat.index')
            ->with('success_message', 'Berhasil menambah obat
            baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::find($id);
        if (!$obat) return redirect()->route('obat.index')->with('error_message', 'Obat dengan id = '.$id.' tidak ditemukan');
            return view('obat.edit', [
            'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'golongan' => 'required',
            'kemasan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            ]);
            $obat = Obat::find($id);
            $obat->kode_obat = $request->kode_obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->merk = $request->merk;
            $obat->jenis = $request->jenis;
            $obat->satuan = $request->satuan;
            $obat->golongan = $request->golongan;
            $obat->kemasan = $request->kemasan;
            $obat->harga_jual = $request->harga_jual;
            $obat->stok = $request->stok;
            $obat->save();
            return redirect()->route('obat.index')->with('success_message', 'Berhasil mengubah obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::find($id);
        if ($obat) $obat->delete();return redirect()->route('obat.index')->with('success_message', 'Berhasil menghapus obat');
    }
}
