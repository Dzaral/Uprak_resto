@extends('sidebar')

@section('content')
<div class="flex bg-gray-800 w-96 mx-auto mt-[-16px] h-12 items-center justify-center rounded-b-lg">
    <h1 class="text-white">Entri Menu</h1>
</div>
<div class="p-4 rounded-lg dark:border-gray-700">
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<section class="flex flex-col justify-center antialiased bg-gray-900 text-gray-300 min-h-screen p-4">
    <div class="h-full">
        <!-- Form -->
        <div class="w-full max-w-xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700 mb-8">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-2xl text-white">Form Entri Menu</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </header>
            <div class="p-6">
            <form action="" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="id_menu" class="block mb-2 text-sm font-medium text-gray-300">ID Menu</label>
                        <input type="text" id="id_menu" name="id_menu" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $editb->id_menu : $id_menu }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="nama_menu" class="block mb-2 text-sm font-medium text-gray-300">Nama Menu</label>
                        <input type="text" id="nama_menu" name="nama_menu" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $editb->nama_menu : '' }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-300">Harga</label>
                        <input type="number" id="harga" name="harga" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ isset($edit) ? $editb->harga : '' }}" required>
                    </div>
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                        Simpan Menu
                    </button>
                </form>
            </div>
        </div>
    </div>

        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-xl text-white">Daftar Menu</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-700">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Menu</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Menu</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Harga</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Aksi</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-700">
                            @foreach ($menu as $b)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$b->id_menu}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$b->nama_menu}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$b->harga}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center space-x-2">
                                        <a href="/entri_menu/edit/{{$b->id_menu}}">
                                        <button class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        </a>
                                        <a href="/entri_menu/delete/{{$b->id_menu}}">
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