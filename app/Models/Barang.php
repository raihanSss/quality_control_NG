<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'nobarang',
        'name',
        'tanggal',
        'customer_id',
        'kuantitas',
        'keterangan',
        'status',
        'status_lama',
        'status_val'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function keterangan()
    {
        return $this->belongsToMany(KeteranganNg::class, 'barang_keterangan', 'barang_id', 'keterangan_id');
    }
    
}
