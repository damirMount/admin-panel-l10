<?php
/**
 * Created by PhpStorm.
 * User: damir
 * Date: 21.06.2022
 * Time: 11:17
 */

namespace App\Service;


use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isEmpty;

class InvoiceGetter
{
    public static function getInvoice($invoice)
    {
        $response = Http::withBasicAuth('обмен', 'qa1')
            ->withHeaders([
                'Content-Type' => 'application/json; charset=utf-8'
            ])
            ->get('http://212.112.99.14:8080/mcargoupdate/hs/getstatusinvoice/' . $invoice);


        $cargo = json_decode($response, true);

        if (isset($cargo['number_id']))
        {
            $result = self::timeCalc($cargo);
        }
        else{
            $result = $cargo;
        }


        $view = view('components.popups.track_cargo.result', compact('result'))->render();

        return response()->json(['view' => $view]);
    }


    static public function timeCalc($cargo)
    {
        if (!empty($cargo['time'])){
            $time = Carbon::now()->diffInDays($cargo['time'], false);
            $cutTime = substr($time, -1);
            $dayString = '';

            switch ($cutTime) {
                case $cutTime == 1 :
                    $dayString = 'день';
                    break;
                case $cutTime > 1 && $cutTime < 5:
                    $dayString = 'дня';
                    break;
                case $cutTime >= 5 && $cutTime <= 20:
                    $dayString = 'дней';
                    break;
            }

            if ($time > 0){
                $cargo['time'] = 'Через ' . $time . ' ' . $dayString;
            }
            else{
                $cargo['time'] = abs($time) . ' ' . $dayString .' назад';
            }
        }

        return $cargo;
    }
}
