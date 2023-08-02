<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganNg extends Model
{
    use HasFactory;
    protected $table = 'keterangan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsToMany(Barang::class, 'barang_keterangan');
    }

}
