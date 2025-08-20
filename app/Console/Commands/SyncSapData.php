<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\TestSAP;

class SyncSAPData extends Command
{
    protected $signature = 'sap:sync';
    protected $description = 'Sinkron data dari SAP ke MySQL';

    public function handle()
    {
        $skip = 0;
        do {
            $response = Http::withBasicAuth('basis','123itthebest')
                ->timeout(180)
                ->get("http://180.250.178.68:8001/sap/opu/odata/sap/YSEGWPLOPRO_SRV/PLOPROSet?\$top=500&\$skip={$skip}&\$format=json");

            if ($response->failed()) return $this->error("Gagal ambil data SAP");

            $records = $response->json()['d']['results'] ?? [];

            foreach ($records as $row) {
                // Cek dan format tanggal agar tidak error
                $row = array_map(function($val) {
                    if(in_array($val, ['0','0000-00-00',''])) return null;
                    return $val;
                }, $row);

                TestSAP::updateOrCreate(
                    ['no' => $row['NO'] ?? null],
                    [
                        'product' => $row['PRODUCT'] ?? null,
                        'product_desc' => $row['PRODUCT_DESC'] ?? null,
                        'sales_order' => $row['SALES_ORDER'] ?? null,
                        'item' => $row['ITEM'] ?? null,
                        'aufnr' => $row['AUFNR'] ?? null,
                        'material' => $row['MATERIAL'] ?? null,
                        'material_desc' => $row['MATERIAL_DESC'] ?? null,
                        'plant' => $row['PLANT'] ?? null,
                        'mrp' => $row['MRP'] ?? null,
                        'qty_plo_pro' => $row['QTY_PLO_PRO'] ?? null,
                        'qty_delivery' => $row['QTY_DELIVERY'] ?? null,
                        'outstanding' => $row['OUTSTANDING'] ?? null,
                        'uom' => $row['UOM'] ?? null,
                        'start_date' => $row['START_DATE'] ?? null,
                        'finish_date' => $row['FINISH_DATE'] ?? null,
                        'create_on' => $row['CREATE_ON'] ?? null,
                        'hari' => $row['HARI'] ?? null,
                        'overdue' => $row['OVERDUE'] ?? null,
                        'panjang' => $row['PANJANG'] ?? null,
                        'system_status' => $row['SYSTEM_STATUS'] ?? null,
                        'selisih' => $row['SELISIH'] ?? null,
                        'status' => $row['STATUS'] ?? null,
                        'first_conf_date' => $row['FIRST_CONF_DATE'] ?? null,
                        'deadline' => $row['DEADLINE'] ?? null,
                        'require_time' => $row['REQUIRE_TIME'] ?? null,
                        'keinh' => $row['KEINH'] ?? null,
                    ]
                );
            }

            $skip += count($records);
        } while(count($records) > 0);

        $this->info("Data SAP berhasil disinkron ke MySQL!");
    }
}