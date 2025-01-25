<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
use Illuminate\Support\Facades\Log;

class BukuTamuController extends Controller
{
    public function index()
    {
        return view('buku-tamu.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'telpon_organisasi' => 'required|string|max:255',
            'sosmed_organisasi' => 'nullable|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'tanggal_berkunjung' => 'required|date',
            'tujuan' => 'required|string',
            'nama_tamu' => 'required|string|max:255',
            'alamat_organisasi' => 'required|string',
        ]);
    
        // Log data request untuk memastikan semua data diterima
        Log::info('Data diterima di backend:', $request->all());
    
        try {
            BukuTamu::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data tamu berhasil disimpan.',
            ]);
        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            Log::error('Error menyimpan data:', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data. Silakan coba lagi.',
            ], 500);
        }
    }

    public function detail()
    {
        $bukuTamu = BukuTamu::all();
        return view('buku-tamu.detail', compact('bukuTamu'));
    }
    
}