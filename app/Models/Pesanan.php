<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_pesanan', 'id_menu', 'id_pelanggan', 'id_meja', 'jumlah', 'id_user'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }
}
