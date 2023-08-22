<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MejaModel extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $primaryKey = 'no_meja';
    protected $fillable = [
        'no_meja','status_meja','created_at','updated_at'
    ];
    
    public function pesanan() {
        return $this->hasMany(PesananModel::class);
    }
}
