<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TestSAP;

class TestSAPController extends Controller
{
    public function getPloPro()
    {
        $response = Http::withBasicAuth('basis','123itthebest')
            ->timeout(180)
            ->get("http://180.250.178.68:8001/sap/opu/odata/sap/YSEGWPLOPRO_SRV/PLOPROSet?\$top=500&\$format=json");

        $records = $response->json()['d']['results'] ?? [];

        foreach ($records as $row) {
            $existing = TestSAP::where('no', $row['NO'])->first();

            $data = [
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
                'start_date'     => $this->parseDate($row['START_DATE'] ?? null),
                'finish_date'    => $this->parseDate($row['FINISH_DATE'] ?? null),
                'create_on'      => $this->parseDate($row['CREATE_ON'] ?? null),
                'hari'           => $row['HARI'] ?? null,
                'overdue'        => $row['OVERDUE'] ?? null,
                'panjang'        => $row['PANJANG'] ?? null,
                'system_status'  => $row['SYSTEM_STATUS'] ?? null,
                'selisih'        => $row['SELISIH'] ?? null,
                'status'         => $row['STATUS'] ?? null,
                'first_conf_date'=> $this->parseDate($row['FIRST_CONF_DATE'] ?? null),
                'deadline'       => $this->parseDate($row['DEADLINE'] ?? null),
                'require_time'   => $row['REQUIRE_TIME'] ?? null,
                'keinh'          => $row['KEINH'] ?? null,
                'updated_at_sap' => now(),
            ];

            if ($existing) {
                $existing->update($data);
            } else {
                $data['no'] = $row['NO'] ?? null;
                TestSAP::create($data);
            }
        }

        $dbData = TestSAP::orderBy('updated_at_sap','desc')->paginate(10);

        return view('sap.index', compact('dbData'));
    }

    private function parseDate($value)
    {
        $v = trim($value);
        if (!$v || in_array($v, ['00000000','0000-00-00','0','0 '])) return null;
        if (preg_match('/^\d{8}$/', $v)) return substr($v,0,4).'-'.substr($v,4,2).'-'.substr($v,6,2);
        return $v;
    }
}
