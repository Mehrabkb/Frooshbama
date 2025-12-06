<?php

namespace App\Services;

use Kavenegar;

class KavenegarService
{
    public function sendSms($receptors = null, $message = null, $sender = null)
    {
        try{
            $sender = "1000888008088";
//            $message = "خدمات پیام کوتاه کاوه نگار";
//            $receptor = array("09369849997");
            $result = Kavenegar::Send($sender,$receptors,$message);
            if($result){
//                foreach($result as $r){
//                    echo "messageid = $r->messageid";
//                    echo "message = $r->message";
//                    echo "status = $r->status";
//                    echo "statustext = $r->statustext";
//                    echo "sender = $r->sender";
//                    echo "receptor = $r->receptor";
//                    echo "date = $r->date";
//                    echo "cost = $r->cost";
//                }
                return true;
            }
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return $e->errorMessage();
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            return $e->errorMessage();
        }
    }

}
