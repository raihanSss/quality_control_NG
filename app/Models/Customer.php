<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'nama_customer',
        'alamat_customer',
        'no_telp_customer',
    ];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'customer_id');
    }
}