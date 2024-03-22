<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor.index', [
        'distributor' => $distributor
        ]);
    }

    public function create()
    {
        return view('distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required'
            ]);
            $array = $request->only([
                'nama_distributor',
                'alamat',
                'notelepon'
            ]);
            $distributor = Distributor::create($array);
            return redirect()->route('distributor.index')
            ->with('success_message', 'Berhasil menambah distributor
            baru');
    }

    public function edit(string $id)
    {
        $distributor = Distributor::find($id);
        if (!$distributor) return redirect()->route('distributor.index')->with('error_message', 'Distributor dengan id = '.$id.' tidak ditemukan');
            return view('distributor.edit', [
            'distributor' => $distributor
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required'
            ]);
            $distributor = Distributor::find($id);
            $distributor->nama_distributor = $request->nama_distributor;
            $distributor->alamat = $request->alamat;
            $distributor->notelepon = $request->notelepon;
            $distributor->save();
            return redirect()->route('distributor.index')->with('success_message', 'Berhasil mengubah distributor');
    }

    public function destroy(string $id)
    {
        $distributor = Distributor::find($id);
        if ($distributor) $distributor->delete();return redirect()->route('distributor.index')->with('success_message', 'Berhasil menghapus distributor');
    }
}
