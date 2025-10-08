@extends('layout.app')
@section('content')
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="Row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3>Formulir Tambah Karyawan </h3>
                    </div>
                    <div class="card-body">
                        <label for="formGroup" class="form-label">NIP</label>
                        <input type="number" class="form-control mb-3" id="formGroup" name="nip">
                        <label for="formGroup" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control mb-3" id="formGroup" name="nama_karyawan">
                        <label for="formGroup" class="form-label">Gaji Karyawan</label>
                        <input type="number" class="form-control mb-3" id="formGroup" name="gaji_karyawan">
                        <label for="departemen">Departemen</label>
                        <select name="departemen_id" class="form-control">
                            <option value="" disabled selected>-- Pilih Departemen --</option>
                            @foreach ($departemen as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                            @endforeach
                        </select>
                        <label for="formGroup" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                        <label for="formGroup" class="form-label">Jenis kelamin</label>
                        <select name="jenis_kelamin" class="custom-select">
                            <option value="" selected disabled hidden>--Pilih Jenis Kelamin--</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">wanita</option>
                        </select>
                        <div class="card-foter pt-4">
                            <button type="submit" class="btn btn-primary ">simpan</button>
                        </div>
                    </div>
                </div>
    </form>
@endsection
