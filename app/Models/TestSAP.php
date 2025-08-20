<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSAP extends Model
{
    protected $table = 'testsap';
    protected $fillable = [
        'no','product','product_desc','sales_order','item','aufnr','material','material_desc',
        'plant','mrp','qty_plo_pro','qty_delivery','outstanding','uom','start_date','finish_date',
        'create_on','hari','overdue','panjang','system_status','selisih','status','first_conf_date',
        'deadline','require_time','keinh'
    ];
    protected $dates = ['start_date','finish_date','create_on','first_conf_date','deadline'];
}
