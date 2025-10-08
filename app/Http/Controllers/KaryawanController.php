<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Models\Departemen;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $karyawan = Karyawan::with('departemen')->get();
        $karyawan = karyawan::all();
        return view('karyawan.index',['karyawan'=>$karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $departemen = Departemen::all();
        return view('karyawan.create', compact('departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'departemen_id' => 'required',
        ],[
            'nip.required' => 'nip tidak boleh kosong',
            'nama_karyawan.required' => 'nama_karyawanp tidak boleh kosong',
            'gaji_karyawan.required' => 'gaji_karyawan tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin tidak boleh kosong',
            'departemen_id.required' => 'Departemen id tidak boleh kosong',
        ]);
        $data = [
            'nip' => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'departemen_id' => $request->input('departemen_id'),
        ];
        karyawan::create($data);
        return redirect('karyawan')->with('karyawan',' berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($nip)
{
    $data = Karyawan::where('nip', $nip)->first();
    $departemen = Departemen::all();

    if (!$data) {
        return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan');
    }

    return view('karyawan.edit', compact('data', 'departemen'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$nip)
    {
        //
         $request->validate([
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'departemen_id' => 'required',
        ],[
            'nip.required' => 'nip tidak boleh kosong',
            'nama_karyawan.required' => 'nama_karyawanp tidak boleh kosong',
            'gaji_karyawan.required' => 'gaji_karyawan tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin tidak boleh kosong',
            'departemen_id.required' => 'Departemen id tidak boleh kosong',
        ]);
        $data = [
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'gaji_karyawan' => $request->gaji_karyawan,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'departemen_id' => $request->departemen_id,
        ];
          Karyawan::where('nip', $request->nip)->update($data);


    return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        karyawan::where('nip', $id)->delete();
         return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
