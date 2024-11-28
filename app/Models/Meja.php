<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'mejas';
    protected $primaryKey = 'id_meja';
    protected $fillable = ['id_meja', 'no_meja', 'status', 'kapasitas'];
    public $incrementing = false;
    protected $keyType = 'string';
}
