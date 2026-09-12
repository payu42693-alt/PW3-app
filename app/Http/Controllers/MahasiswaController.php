<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Aturan validasi form, dipakai bersama untuk store & update.
     */
    private function rules(?Mahasiswa $mahasiswa = null): array
    {
        $nimUnique = 'unique:mahasiswas,nim' . ($mahasiswa ? ',' . $mahasiswa->id : '');
        $emailUnique = 'unique:mahasiswas,email' . ($mahasiswa ? ',' . $mahasiswa->id : '');

        return [
            'nim' => ['required', 'string', 'max:20', $nimUnique],
            'nama_mahasiswa' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required', 'string'],
            'program_studi' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^[0-9+\-\s]+$/'],
            'email' => ['required', 'email', 'max:255', $emailUnique],
        ];
    }

    /**
     * Menampilkan seluruh data mahasiswa (Read).
     */
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::when($request->search, function ($query, $search) {
                $query->where('nama_mahasiswa', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%");
            })
            ->orderBy('nama_mahasiswa')
            ->paginate(10)
            ->withQueryString();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form tambah data (Create - form).
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru (Create - simpan).
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data mahasiswa.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan form edit data (Update - form).
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Menyimpan perubahan data mahasiswa (Update - simpan).
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate($this->rules($mahasiswa));

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa (Delete).
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}

