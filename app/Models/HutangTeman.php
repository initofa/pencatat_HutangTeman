<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangTeman extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hutang_temans'; 
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_teman',
        'tanggal_peminjaman',
        'bukti_transaksi',
        'keterangan',
    ];
}
