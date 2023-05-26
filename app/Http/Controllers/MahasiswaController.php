<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::orderBy('nim', 'desc')->with('kelas');
        if ($request->get('s')) {
            $mahasiswa = $mahasiswa->where('nama', 'LIKE', '%'.$request->get('s').'%');
        }
        $mahasiswa = $mahasiswa->paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
        ]);

        Mahasiswa::create($validatedData);
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->with('kelas');
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa->with('kelas');
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
        ]);

        Mahasiswa::where('nim', $mahasiswa->nim)->update($validatedData);
        
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::where('nim', $mahasiswa->nim)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
