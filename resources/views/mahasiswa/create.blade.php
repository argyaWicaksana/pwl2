@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>
                            There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                        @csrf
                        <div class="mb-3">
                            <label for="Nim">Nim</label>
                            <input type="text" name="nim" class="form-control" id="Nim" aria-describedby="Nim">
                        </div>
                        <div class="mb-3">
                            <label for="Nama">Nama</label>
                            <input type="Nama" name="nama" class="form-control" id="Nama"
                                aria-describedby="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="Kelas">Kelas</label>
                            <input type="Kelas" name="kelas" class="form-control" id="Kelas"
                                aria-describedby="password">
                        </div>
                        <div class="mb-3">
                            <label for="Jurusan">Jurusan</label>
                            <input type="Jurusan" name="jurusan" class="form-control" id="Jurusan"
                                aria-describedby="Jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="No_Handphone">No_Handphone</label>
                            <input type="No_Handphone" name="no_hp" class="form-control" id="No_Handphone"
                                aria-describedby="No_Handphone">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="rgl_lahir" class="form-control" id="tgl_lahir"
                                aria-describedby="tgl_lahir">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
