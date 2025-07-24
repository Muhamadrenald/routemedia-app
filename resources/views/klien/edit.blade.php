<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Data Klien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-800 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Header Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Edit Informasi Klien</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Perbarui data klien yang ada di sistem.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('klien.update', $klien->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Nama Klien -->
                        <div>
                            <label for="nama_klien" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Klien
                            </label>
                            <input type="text"
                                   id="nama_klien"
                                   name="nama_klien"
                                   class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                   value="{{ old('nama_klien', $klien->nama_klien) }}"
                                   required
                                   autofocus />
                            @error('nama_klien')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Alamat
                            </label>
                            <textarea id="alamat"
                                      name="alamat"
                                      class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                      rows="3"
                                      required>{{ old('alamat', $klien->alamat) }}</textarea>
                            @error('alamat')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor WhatsApp -->
                        <div>
                            <label for="no_whatsapp" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor WhatsApp
                            </label>
                            <input type="text"
                                   id="no_whatsapp"
                                   name="no_whatsapp"
                                   class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                   value="{{ old('no_whatsapp', $klien->no_whatsapp) }}"
                                   required />
                            @error('no_whatsapp')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Paket Internet -->
                        <div>
                            <label for="paket_internet_id" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Paket Internet
                            </label>
                            <select id="paket_internet_id"
                                    name="paket_internet_id"
                                    class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                    required>
                                @foreach($pakets as $paket)
                                    <option value="{{ $paket->id }}" {{ old('paket_internet_id', $klien->paket_internet_id) == $paket->id ? 'selected' : '' }}>
                                        {{ $paket->nama_paket }} ({{ $paket->kecepatan }})
                                    </option>
                                @endforeach
                            </select>
                            @error('paket_internet_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto KTP -->
                        <div>
                            <label for="foto_ktp" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Ganti Foto KTP (Opsional)
                            </label>
                            <input id="foto_ktp"
                                   name="foto_ktp"
                                   type="file"
                                   class="block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm cursor-pointer dark:border-gray-600 dark:text-white bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kosongkan jika tidak ingin mengganti foto KTP.</p>
                            @error('foto_ktp')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end pt-6 space-x-3 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('klien.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition duration-200 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-600 hover:text-gray-700 dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 ml-2 text-sm font-medium text-gray-700 transition duration-200 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-600 hover:text-gray-700 dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Update Data') }}
                            </button>
                        </div>
                    </form>

                    <!-- Tips Section -->
                    <div class="p-4 mt-6 border border-blue-200 rounded-lg bg-blue-50 dark:bg-blue-900/20 dark:border-blue-700">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-gray-500">
                                    Tips Pengisian Form
                                </h3>
                                <div class="mt-2 text-sm text-gray-500">
                                    <ul class="pl-5 space-y-1 list-disc">
                                        <li>Periksa kembali nama klien untuk memastikan kebenarannya</li>
                                        <li>Nomor WhatsApp harus dalam format yang valid (contoh: +6281234567890)</li>
                                        <li>Pastikan paket internet yang dipilih sesuai dengan kebutuhan klien</li>
                                        <li>Ganti foto KTP hanya jika diperlukan, pastikan formatnya sesuai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
