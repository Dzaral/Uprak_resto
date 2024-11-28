@extends('sidebar')

@section('content')
<div class="flex bg-gradient-to-r from-blue-500 to-purple-600 w-full mx-auto mt-[-16px] h-16 items-center justify-center rounded-b-lg shadow-lg">
    <h1 class="text-2xl font-bold text-white tracking-wide">Dashboard</h1>
</div>
<div class="flex justify-center p-8 rounded-lg dark:border-gray-700">
    <div class="text-center bg-gray-800 rounded-xl p-8 shadow-2xl transform hover:scale-105 transition-transform duration-300">
        <div class="mb-6">
            <svg class="w-16 h-16 mx-auto text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
            </svg>
        </div>
        <h2 class="text-3xl font-bold mb-4 text-white bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">Selamat Datang di Dashboard</h2>
        <p class="text-gray-300 text-lg">Kelola bisnis Anda dengan mudah dan efisien melalui dashboard interaktif kami</p>
        <div class="mt-8 grid grid-cols-3 gap-4">
            <div class="bg-gray-700 p-4 rounded-lg hover:bg-gray-600 transition-colors">
                <h3 class="text-blue-400 font-semibold">Total Pesanan</h3>
                <p class="text-2xl text-white font-bold">150+</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg hover:bg-gray-600 transition-colors">
                <h3 class="text-purple-400 font-semibold">Pendapatan</h3>
                <p class="text-2xl text-white font-bold">$5,240</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg hover:bg-gray-600 transition-colors">
                <h3 class="text-pink-400 font-semibold">Pelanggan</h3>
                <p class="text-2xl text-white font-bold">45+</p>
            </div>
        </div>
    </div>
</div>
    @endsection