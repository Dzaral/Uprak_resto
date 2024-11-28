<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrderController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // Remove or comment out the auth middleware
        // $this->middleware('auth');
    }

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
        $pelanggan = DB::table('pelanggans')->get();
        $meja = DB::table('mejas')->get();

        return view('entri_order', [
            'pesanan' => $data_pesanan,
            'id_pesanan' => $no,
            'menu' => $menu,
            'pelanggan' => $pelanggan,
            'meja' => $meja
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

            // Remove Auth check and replace with your user logic if needed
            Pesanan::create([
                'id_pesanan' => $request->id_pesanan,
                'id_menu' => $request->id_menu,
                'id_pelanggan' => $request->id_pelanggan,
                'id_meja' => $request->id_meja,
                'jumlah' => $request->jumlah,
                // Remove or modify this line based on how you handle user IDs
                // 'id_user' => $userId
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
        $pelanggan = DB::table('pelanggan')->get();
        $meja = DB::table('meja')->get();

        return view('entri_order', [
            'pesanan' => $data_pesanan,
            'edit' => true,
            'editb' => $pesanan,
            'menu' => $menu,
            'pelanggan' => $pelanggan,
            'meja' => $meja
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
