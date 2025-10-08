@extends('layout.app')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $err)    
<p class="alert alert-danger">{{$err}}</p>    
@endforeach
@endif
    <form action="{{ route('karyawan.update', $data->nip) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="Row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3>Formulir edit Karyawan </h3>
                    </div>
                    <div class="card-body">
                        <label for="formGroup" class="form-label">NIP</label>
                        <input type="number" class="form-control mb-3" id="formGroup" name="nip" value="{{$data->nip}}">
                        <label for="formGroup" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control mb-3" id="formGroup" name="nama_karyawan" value="{{$data->nama_karyawan}}">
                        <label for="formGroup" class="form-label">Gaji Karyawan</label>
                        <input type="number" class="form-control mb-3" id="formGroup" name="gaji_karyawan" value="{{$data->gaji_karyawan}}">
                        <label for="departemen">Departemen</label>
                        <select name="departemen_id" class="form-control">
                            <option value="" disabled selected>-- Pilih Departemen --</option>
                            @foreach ($departemen as $d)
                                <option value="{{ $d->id }}" {{ $data->departemen_id == $d->id ? 'selected' : '' }}>{{ $d->nama_departemen }}</option>
                            @endforeach
                        </select>
                        <label for="formGroup" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat"  value="{{$data->alamat}}"></textarea>
                        <label for="formGroup" class="form-label">Jenis kelamin</label>
                        <select name="jenis_kelamin" class="custom-select">
                            <option value="" selected disabled hidden>--Pilih Jenis Kelamin--</option>
                            <option value="pria" {{$data->jenis_kelamin == 'Pria' ? 'selected': ''}}>Pria</option>
                            <option value="wanita" {{$data->jenis_kelamin == 'Wanita' ? 'selected': ''}}>wanita</option>
                        </select>
                        <div class="card-foter pt-4">
                            <button type="submit" class="btn btn-primary ">simpan</button>
                        </div>
                    </div>
                </div>
    </form>
@endsection
