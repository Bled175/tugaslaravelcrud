@extends('layout.app')
@section('content')

    <form action="{{ route('departemen.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nama_departemen">Nama Departemen</label>
        <input type="text" 
               name="nama_departemen" 
               class="form-control" 
               value="{{ old('nama_departemen', $data->nama_departemen) }}">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
