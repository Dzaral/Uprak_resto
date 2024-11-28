@extends('sidebar')

@section('content')
<div class="flex bg-gray-800 w-96 mx-auto mt-[-16px] h-12 items-center justify-center rounded-b-lg">
    <h1 class="text-white">Transaksi</h1>
</div>
<div class="p-4 rounded-lg dark:border-gray-700">
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<section class="flex flex-col justify-center antialiased bg-gray-900 text-gray-300 min-h-screen p-4">
    <div class="h-full">
        <!-- Form -->
        <div class="w-full max-w-xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700 mb-8">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-2xl text-white">Form Transaksi</h2>
            </header>
            <div class="p-6">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="id_transaksi" class="block mb-2 text-sm font-medium text-gray-300">ID Transaksi</label>
                        <input type="text" id="id_transaksi" name="id_transaksi" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div class="mb-6">
                        <label for="id_order" class="block mb-2 text-sm font-medium text-gray-300">ID Order</label>
                        <input type="text" id="id_order" name="id_order" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div class="mb-6">
                        <label for="total" class="block mb-2 text-sm font-medium text-gray-300">Total</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">Rp</span>
                            <input type="number" id="total" name="total" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="bayar" class="block mb-2 text-sm font-medium text-gray-300">Bayar</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">Rp</span>
                            <input type="number" id="bayar" name="bayar" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-gray-800 shadow-lg rounded-lg border border-gray-700">
            <header class="px-5 py-4 border-b border-gray-700">
                <h2 class="font-semibold text-xl text-white">Daftar Transaksi</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-700">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Transaksi</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Order</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Total</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Bayar</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Aksi</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-700">
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">TRX001</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">ORD001</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-400">Rp 50.000</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-400">Rp 100.000</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- More rows can be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection