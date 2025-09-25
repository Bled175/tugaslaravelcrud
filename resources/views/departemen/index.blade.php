@extends('layout/app')
@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Data Departemen</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Sisfo pegawai</h6>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ route('departemen.create') }}">Tambah Data</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama departemen</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($departemen as $departemen)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $departemen->nama_departemen }}</td>
                                                    <td>
                                                        <!-- Tombol Edit -->
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ route('departemen.edit', $departemen->id) }}">
                                                            Edit
                                                        </a>
                                                        <!--End Tombol Edit -->

                                                        <!-- Tombol Delete -->
                                               <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                     @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?')">
                                                        Delete
                                                        </button>
                                                        <!--End Tombol Delete -->
                                                </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
            @endsection
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->
