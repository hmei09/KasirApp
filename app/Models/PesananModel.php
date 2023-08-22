<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesananModel extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';

    protected $guarded = [
        
    ];
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesananModel::class, 'id_pesanan', 'id_pesanan');
    }

    public function meja()
    {
        return $this->belongsTo(MejaModel::class, 'no_meja');
    }    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }    
}
