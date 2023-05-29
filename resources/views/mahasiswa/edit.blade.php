@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your i
                            nput.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Nim">Nim</label>
                            <input type="text" name="nim" class="form-control" id="Nim"
                                value="{{ $mahasiswa->nim }}" aria-describedby="Nim">
                        </div>
                        <div class="mb-3">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="Nama"
                                value="{{ $mahasiswa->nama }}" aria-describedby="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="Foto">Foto</label>
                            <input type="file" name="photo" class="form-control" id="Foto"
                                aria-describedby="Foto">
                        </div>
                        <div class="mb-3">
                            <label for="Kelas">Kelas</label>
                            <select name="kelas_id" class="form-control">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $k->id === $mahasiswa->kelas_id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="Jurusan"
                                value="{{ $mahasiswa->jurusan }}" aria-describedby="Jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="No_Handphone">No_Handphone</label>

                            <input type="tel" name="no_hp" class="form-control" id="No_Handphone"
                                value="{{ $mahasiswa->no_hp }}" aria-describedby="No_Handphone">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $mahasiswa->email }}" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                                value="{{ $mahasiswa->tgl_lahir }}" aria-describedby="tgl_lahir">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
