<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';

    protected $primaryKey = 'id_detail';

    protected $guarded = [

    ];

    public function menu()
    {
        return $this->belongsTo(MenuModel::class, 'id_menu');
    }

    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class, 'id_pesanan');
    }
    
}
