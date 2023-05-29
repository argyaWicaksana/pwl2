@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="mt-2">
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <form class="d-flex" role="search" action="{{ route('mahasiswa.index') }}">
                        <input type="text" value="{{ request('s') }}" class="form-control rounded-0 rounded-start"
                            name="s" placeholder="Search..." />
                        <button type="submit" class="btn btn-light border rounded-0 rounded-end">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Input Mahasiswa</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No Handphone</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($mahasiswa as $m)
                <tr>

                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $m->photo) }}" width="100px" alt="Foto">
                    </td>
                    <td>{{ $m->kelas->nama_kelas }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>{{ $m->no_hp }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->tgl_lahir }}</td>
                    <td>
                        <form action="{{ route('mahasiswa.destroy', $m->nim) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('mahasiswa.show', $m->nim) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $m->nim) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a class="btn btn-warning" href="{{ route('mahasiswa.score', $m->nim) }}">Nilai</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $mahasiswa->links() }}
    </div>
@endsection
