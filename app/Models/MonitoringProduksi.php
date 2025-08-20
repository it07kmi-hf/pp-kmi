<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringProduksi extends Model
{
    use HasFactory;

    protected $table = 'monitoring_produksi'; // sesuaikan nama tabel kamu
    protected $fillable = [
        'assembling_line',
        'work_center',
        'output',
        'target',
        'status'
    ];
}
