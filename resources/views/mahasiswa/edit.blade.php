<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    @include('mahasiswa._form')

                    <div class="flex items-center gap-4 pt-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                        <a href="{{ route('mahasiswa.index') }}" class="text-sm text-gray-600 underline">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
