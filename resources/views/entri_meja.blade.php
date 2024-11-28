@extends('sidebar')

@section('content')
<div class="flex bg-gray-800 w-96 mx-auto mt-[-16px] h-12 items-center justify-center rounded-b-lg">
    <h1 class="text-white">Entri Meja</h1>
</div>
<div class="p-4 rounded-lg dark:border-gray-700">
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
<section class="flex flex-col justify-center antialiased bg-gray-900 text-gray-300 min-h-screen p-4">
    <div class="h-full">
        <!-- Form -->
        <div class="w-full max-w-xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700 mb-8">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-2xl text-white">Form Entri Meja</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif
            </header>
            <div class="p-6">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="id_meja" class="block mb-2 text-sm font-medium text-gray-300">ID Meja</label>
                        <input type="text" id="id_meja" name="id_meja" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $edit->id_meja : $id_meja }}" readonly>
                    </div>
                    <div class="mb-6">
                        <label for="no_meja" class="block mb-2 text-sm font-medium text-gray-300">Nomor Meja</label>
                        <input type="text" id="no_meja" name="no_meja" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $edit->no_meja : '' }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="kapasitas" class="block mb-2 text-sm font-medium text-gray-300">Kapasitas</label>
                        <input type="number" id="kapasitas" name="kapasitas" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $edit->kapasitas : '' }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-300">Status</label>
                        <select id="status" name="status" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="tersedia" {{ isset($edit) && $edit->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="terisi" {{ isset($edit) && $edit->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                        </select>
                    </div>
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                        Simpan Meja
                    </button>
                </form>
            </div>
        </div>
    </div>

        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-xl text-white">Daftar Meja</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-700">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Meja</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nomor Meja</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Kapasitas</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Aksi</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-700">
                            @foreach ($meja as $m)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$m->id_meja}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$m->no_meja}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$m->status}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$m->kapasitas}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center space-x-2">
                                        <a href="/entri_meja/edit/{{$m->id_meja}}">
                                        <button class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        </a>
                                        <a href="/entri_meja/delete/{{$m->id_meja}}">
                                        <button class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection