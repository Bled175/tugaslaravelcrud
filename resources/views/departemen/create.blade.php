@extends('layout.app')
@section('content')
    <form action="{{ route('departemen.store') }}" method="POST">
        @csrf
        <div class="Row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3>Formulir Tambah departemen </h3>
                    </div>
                        <div class="card-body">
                        <label for="formGroup" class="form-label">Nama Departemen</label>
                        <input type="text" class="form-control mb-3" id="formGroup" name="nama_departemen" value="{{ old('nama_departemen') }}">
                        <div class="card-foter">
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
@endsection
