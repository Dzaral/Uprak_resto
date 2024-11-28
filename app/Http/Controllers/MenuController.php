<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    public function entri_menu()
    {
        $menu = new Menu();
        $data_menu = $menu->paginate(10);

        $id_menu = $menu->all()->last();
        
        if ($id_menu) {
            $id = $id_menu->id_menu;
            $no = substr($id, 2);
            $no = intval($no) + 1;
        } else {
            $no = 1;
        }

        switch (true) {
            case $no < 10:
                $no = "B-00" . $no;
                break;
            case $no < 100:
                $no = "B-0" . $no;
                break;
            default:
                $no = "B-" . $no;
                break;
        }

        return view('entri_menu', [
            'menu' => $data_menu,
            'id_menu' => $no
        ]);
    }
    public function entri_menu_store(Request $request)
    {
        try {
            $request->validate([
                'id_menu' => 'required',
                'nama_menu' => 'required',
                'harga' => 'required|numeric'
            ]);

            Menu::create([
                'id_menu' => $request->id_menu,
                'nama_menu' => $request->nama_menu,
                'harga' => $request->harga
            ]);
            
            return redirect()->back()->with('success', 'Menu berhasil ditambahkan');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error adding menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan menu: ' . $e->getMessage());
        }
    }

    public function edit_menu($id_menu)
    {
        $menu = new Menu();
        $edit_menu = $menu->find($id_menu);

        $data_menu = $menu->paginate(10);
        return view('entri_menu', [
            'menu' => $data_menu,
            'editb' => $edit_menu,
        ]);
    }

    public function update_menu(Request $request, $id_menu)
    {
        $request->validate([
            'id_menu' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required'
        ]);

        try {
            $menu = Menu::find($id_menu);
            $menu->update([
                'id_menu' => $request->id_menu,
                'nama_menu' => $request->nama_menu,
                'harga' => $request->harga
            ]);

            return redirect('/entri_menu')->with('success', 'Data menu berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('pesan', 'Gagal mengupdate data menu: ' . $e->getMessage());
        }
    }

    public function delete_menu($id_menu) 
    {
        $menu = new Menu();
        $edit_menu = $menu->find($id_menu);
        $edit_menu->delete();
        return redirect('/entri_menu')->with('success', 'Data menu berhasil dihapus');
    }
}
