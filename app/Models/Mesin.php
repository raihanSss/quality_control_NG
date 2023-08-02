<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $table = 'mesin';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'nomesin'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
