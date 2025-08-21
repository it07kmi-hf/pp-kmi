<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\TestSAP;
use Carbon\Carbon;

class SyncSAPData extends Command
{
    protected $signature = 'sap:sync';
    protected $description = 'Sinkron data dari SAP ke MySQL';

    public function handle()
    {
        $skip = 0;
        $newCount = 0;

        do {
            $response = Http::withBasicAuth('basis','123itthebest')
                ->timeout(180)
                ->get("http://180.250.178.68:8001/sap/opu/odata/sap/YSEGWPLOPRO_SRV/PLOPROSet?\$top=500&\$skip={$skip}&\$format=json");

            if ($response->failed()) {
                return $this->error("❌ Gagal ambil data SAP");
            }

            $records = $response->json()['d']['results'] ?? [];

            foreach ($records as $row) {
                // helper format tanggal SAP YYYYMMDD -> Y-m-d
                $formatDate = function ($val) {
                    $val = trim($val ?? '');
                    if ($val === '' || $val === '0' || $val === '00000000') return null;
                    if (preg_match('/^\d{8}$/', $val)) {
                        try {
                            return Carbon::createFromFormat('Ymd', $val)->format('Y-m-d');
                        } catch (\Exception $e) {
                            return null;
                        }
                    }
                    return null;
                };

                $saved = TestSAP::updateOrCreate(
                    ['no' => $row['NO'] ?? null],
                    [
                        'product'        => $row['PRODUCT'] ?? null,
                        'product_desc'   => $row['PRODUCT_DESC'] ?? null,
                        'sales_order'    => $row['SALES_ORDER'] ?? null,
                        'item'           => $row['ITEM'] ?? null,
                        'aufnr'          => $row['AUFNR'] ?? null,
                        'material'       => $row['MATERIAL'] ?? null,
                        'material_desc'  => $row['MATERIAL_DESC'] ?? null,
                        'plant'          => $row['PLANT'] ?? null,
                        'mrp'            => $row['MRP'] ?? null,
                        'qty_plo_pro'    => $row['QTY_PLO_PRO'] ?? null,
                        'qty_delivery'   => $row['QTY_DELIVERY'] ?? null,
                        'outstanding'    => $row['OUTSTANDING'] ?? null,
                        'uom'            => $row['UOM'] ?? null,
                        'start_date'     => $formatDate($row['START_DATE'] ?? null),
                        'finish_date'    => $formatDate($row['FINISH_DATE'] ?? null),
                        'create_on'      => $formatDate($row['CREATE_ON'] ?? null),
                        'hari'           => $row['HARI'] ?? null,
                        'overdue'        => $row['OVERDUE'] ?? null,
                        'panjang'        => $row['PANJANG'] ?? null,
                        'system_status'  => $row['SYSTEM_STATUS'] ?? null,
                        'selisih'        => $row['SELISIH'] ?? null,
                        'status'         => $row['STATUS'] ?? null,
                        'first_conf_date'=> $formatDate($row['FIRST_CONF_DATE'] ?? null),
                        'deadline'       => $formatDate($row['DEADLINE'] ?? null),
                        'require_time'   => $row['REQUIRE_TIME'] ?? null,
                        'keinh'          => $row['KEINH'] ?? null,
                    ]
                );

                if ($saved->wasRecentlyCreated) {
                    $newCount++;
                }
            }

            $skip += count($records);
        } while(count($records) > 0);

        $this->info("✅ Sync selesai. Tambahan data baru: {$newCount}");
    }
}
