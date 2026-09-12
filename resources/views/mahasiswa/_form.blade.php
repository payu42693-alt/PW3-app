@php
    // $mahasiswa hanya ada saat mode edit
    $mhs = $mahasiswa ?? null;
    $prodiOptions = [
        'Teknik Informatika',
        'Sistem Informasi',
        'Manajemen Informatika',
        'Teknik Komputer',
        'Ilmu Komputer',
    ];
@endphp

<div>
    <x-input-label for="nim" value="NIM" />
    <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full"
        value="{{ old('nim', $mhs->nim ?? '') }}" required autofocus />
    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
</div>

<div>
    <x-input-label for="nama_mahasiswa" value="Nama Mahasiswa" />
    <x-text-input id="nama_mahasiswa" name="nama_mahasiswa" type="text" class="mt-1 block w-full"
        value="{{ old('nama_mahasiswa', $mhs->nama_mahasiswa ?? '') }}" required />
    <x-input-error :messages="$errors->get('nama_mahasiswa')" class="mt-2" />
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <x-input-label for="tempat_lahir" value="Tempat Lahir" />
        <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full"
            value="{{ old('tempat_lahir', $mhs->tempat_lahir ?? '') }}" required />
        <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="tanggal_lahir" value="Tanggal Lahir" />
        <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full"
            value="{{ old('tanggal_lahir', isset($mhs->tanggal_lahir) ? $mhs->tanggal_lahir->format('Y-m-d') : '') }}"
            required />
        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
    </div>
</div>

<div>
    <x-input-label value="Jenis Kelamin" />
    <div class="flex gap-6 mt-1">
        @foreach (['Laki-laki', 'Perempuan'] as $jk)
            <label class="inline-flex items-center">
                <input type="radio" name="jenis_kelamin" value="{{ $jk }}"
                    class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    {{ old('jenis_kelamin', $mhs->jenis_kelamin ?? '') === $jk ? 'checked' : '' }} required>
                <span class="ml-2 text-sm text-gray-700">{{ $jk }}</span>
            </label>
        @endforeach
    </div>
    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
</div>

<div>
    <x-input-label for="alamat" value="Alamat" />
    <textarea id="alamat" name="alamat" rows="3"
        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        required>{{ old('alamat', $mhs->alamat ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <x-input-label for="program_studi" value="Program Studi" />
        <select id="program_studi" name="program_studi"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach ($prodiOptions as $prodi)
                <option value="{{ $prodi }}"
                    {{ old('program_studi', $mhs->program_studi ?? '') === $prodi ? 'selected' : '' }}>
                    {{ $prodi }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="no_hp" value="Nomor HP" />
        <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
            value="{{ old('no_hp', $mhs->no_hp ?? '') }}" required />
        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
    </div>
</div>

<div>
    <x-input-label for="email" value="Email" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
        value="{{ old('email', $mhs->email ?? '') }}" required />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>
