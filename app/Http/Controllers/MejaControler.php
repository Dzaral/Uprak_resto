<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaControler extends Controller
{
    public function entri_meja()
    {
        $meja = new Meja();
        $data_meja = $meja->paginate(10);

        $id_meja = $meja->all()->last();
        
        if ($id_meja) {
            $id = $id_meja->id_meja;
            $no = substr($id, 2);
            $no = intval($no) + 1;
        } else {
            $no = 1;
        }

        switch (true) {
            case $no < 10:
                $no = "M-00" . $no;
                break;
            case $no < 100:
                $no = "M-0" . $no;
                break;
            default:
                $no = "M-" . $no;
                break;
        }

        return view('entri_meja', [
            'meja' => $data_meja,
            'id_meja' => $no
        ]);
    }

    public function Centri_meja(Request $request)
    {
        $request->validate([
            'id_meja' => 'required',
            'no_meja' => 'required',
            'status' => 'required',
            'kapasitas' => 'required',
        ]);

        try {
            $meja = Meja::create([
                'id_meja' => $request->id_meja,
                'no_meja' => $request->no_meja,
                'status' => $request->status,
                'kapasitas' => $request->kapasitas
            ]);

            return redirect('/entri_meja')->with('success', 'Data meja berhasil disimpan');
        } catch (\Exception $e) {
            return back()->with('pesan', 'Gagal menyimpan data meja: ' . $e->getMessage());
        }
    }
    
        public function edit_meja($id_meja)
    {
        $meja = new Meja();
        $edit_meja = $meja->find($id_meja);

        $data_meja = $meja->paginate(10);
        return view('entri_meja', [
            'meja' => $data_meja,
            'edit' => $edit_meja,
        ]);
    }

    public function update_meja(Request $request, $id_meja)
    {
        $request->validate([
            'id_meja' => 'required',
            'no_meja' => 'required', 
            'status' => 'required',
            'kapasitas' => 'required',
        ]);

        try {
            $meja = Meja::find($id_meja);
            $meja->update([
                'id_meja' => $request->id_meja,
                'no_meja' => $request->no_meja,
                'status' => $request->status,
                'kapasitas' => $request->kapasitas
            ]);

            return redirect('/entri_meja')->with('success', 'Data meja berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('pesan', 'Gagal mengupdate data meja: ' . $e->getMessage());
        }
    }

    public function delete_meja($id_meja) 
    {
        $meja = new Meja();
        $edit_meja = $meja->find($id_meja);
        $edit_meja->delete();
        return redirect('/entri_meja')->with('success', 'Data meja berhasil dihapus');
    }
}
