<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;

class ControllerDepartemen extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departemen = departemen::all();
        return view('departemen.index',['departemen'=>$departemen]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //untuk membuat data baru
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //untuk menyimpan data setelah create
        $request->validate([
            'nama_departemen'=>'required',
        ]);
        departemen::create([
            'nama_departemen'=> $request->nama_departemen,
        ]);
        return redirect('departemen')->with('departemen','berhasil ditambahkan');
        }

    /**
     * Display the specified resource.
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //melakukan perubahan edit
        $data=departemen::where('id',$id)->first();
        return view('departemen.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //melakukan Update penampilan
        $request->validate([
            'nama_departemen'=>'required',
        ]);
        $data =([
            'nama_departemen'=> $request->nama_departemen,
        ]);
        departemen::where('id',$id)->update($data);
        return redirect('departemen')->with('succes','berhasil diupdate');
    }

    /*
     Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //untuk delete data
        departemen::where('id',$id)->delete();
        return redirect('departemen')->with('departemen','berhasil dihapus');
    }
}

