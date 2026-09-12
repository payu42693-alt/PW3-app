<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-3">
                    <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari NIM / Nama..."
                            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <button type="submit" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 text-sm">
                            Cari
                        </button>
                    </form>

                    <a href="{{ route('mahasiswa.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">NIM</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">Nama</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">Jenis Kelamin</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">Program Studi</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">No HP</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-600">Email</th>
                                <th class="px-4 py-2 text-center font-medium text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($mahasiswas as $index => $mhs)
                                <tr>
                                    <td class="px-4 py-2">{{ $mahasiswas->firstItem() + $index }}</td>
                                    <td class="px-4 py-2">{{ $mhs->nim }}</td>
                                    <td class="px-4 py-2">{{ $mhs->nama_mahasiswa }}</td>
                                    <td class="px-4 py-2">{{ $mhs->jenis_kelamin }}</td>
                                    <td class="px-4 py-2">{{ $mhs->program_studi }}</td>
                                    <td class="px-4 py-2">{{ $mhs->no_hp }}</td>
                                    <td class="px-4 py-2">{{ $mhs->email }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('mahasiswa.show', $mhs) }}"
                                                class="px-3 py-1 bg-gray-500 text-white rounded text-xs hover:bg-gray-600">
                                                Detail
                                            </a>
                                            <a href="{{ route('mahasiswa.edit', $mhs) }}"
                                                class="px-3 py-1 bg-yellow-500 text-white rounded text-xs hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data {{ $mhs->nama_mahasiswa }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
