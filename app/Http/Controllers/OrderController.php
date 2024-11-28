<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function entri_order()
    {
        $pesanan = new Pesanan();
        $data_pesanan = $pesanan->paginate(10);

        $id_pesanan = $pesanan->all()->last();
        
        if ($id_pesanan) {
            $id = $id_pesanan->id_pesanan;
            $no = substr($id, 2);
            $no = intval($no) + 1;
        } else {
            $no = 1;
        }

        switch (true) {
            case $no < 10:
                $no = "P-00" . $no;
                break;
            case $no < 100:
                $no = "P-0" . $no;
                break;
            default:
                $no = "P-" . $no;
                break;
        }

        $menu = Menu::all();

        return view('entri_order', [
            'pesanan' => $data_pesanan,
            'id_pesanan' => $no,
            'menu' => $menu
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_pesanan' => 'required',
                'id_menu' => 'required',
                'id_pelanggan' => 'required',
                'id_meja' => 'required',
                'jumlah' => 'required|numeric'
            ]);

            Pesanan::create([
                'id_pesanan' => $request->id_pesanan,
                'id_menu' => $request->id_menu,
                'id_pelanggan' => $request->id_pelanggan,
                'id_meja' => $request->id_meja,
                'jumlah' => $request->jumlah,
                'id_user' => auth()->id()
            ]);
            
            return redirect()->back()->with('success', 'Pesanan berhasil ditambahkan');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error adding order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan pesanan: ' . $e->getMessage());
        }
    }

    public function edit($id_pesanan)
    {
        $pesanan = Pesanan::find($id_pesanan);
        $menu = Menu::all();
        $data_pesanan = Pesanan::paginate(10);

        return view('entri_order', [
            'pesanan' => $data_pesanan,
            'editp' => $pesanan,
            'menu' => $menu
        ]);
    }

    public function update(Request $request, $id_pesanan)
    {
        $request->validate([
            'id_pesanan' => 'required',
            'menu_items' => 'required|array',
            'total' => 'required|numeric'
        ]);

        try {
            $pesanan = Pesanan::find($id_pesanan);
            $pesanan->update([
                'id_pesanan' => $request->id_pesanan,
                'menu_items' => $request->menu_items,
                'total' => $request->total
            ]);

            return redirect('/entri_order')->with('success', 'Data pesanan berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupdate data pesanan: ' . $e->getMessage());
        }
    }

    public function delete($id_pesanan) 
    {
        $pesanan = Pesanan::find($id_pesanan);
        $pesanan->delete();
        return redirect('/entri_order')->with('success', 'Data pesanan berhasil dihapus');
    }
}
