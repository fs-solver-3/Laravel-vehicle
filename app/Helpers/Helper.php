<?php

namespace App\Helpers;

class Helper{
    public static function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL&key=".env('GOOGLE_MAPS_API_KEY')."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        if($response_a['rows'][0]['elements'][0]['status'] == "ZERO_RESULTS")
            return "zero_result";
        else if($response_a['rows'][0]['elements'][0]['status']=="NOT_FOUND"){
            return "zero_result";
        }
        else{
            $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
            $time = $response_a['rows'][0]['elements'][0]['duration']['value'];
        }

        return array('distance' => $dist, 'time' => $time);
    }

    public static function distance($lat1, $lat2, $lon1, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * 
        cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
      
        if ($unit == "K") {
          return ($miles * 1.609344);
        } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
          return $miles;
        }
    }

    public static function  setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Setting\Setting();
        }

        if (is_array($key)) {
            return \App\Setting\Setting::set($key[0], $key[1]);
        }

        $value = \App\Setting\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }

    public static function convertCurrency($amount,$from_currency,$to_currency){
        $apikey = 'da70cfa376a214df27cf';
      
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
      
        // change to the free URL if you're using the free version
        // $val = session()->get('currency-change');
        $val = null;
        if($val == null){
            try {
                // $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
                // $obj = json_decode($json, true);
                // $val = floatval($obj["$query"]);
                $val = null;
                session()->put('currency-change', $val);
            } catch (\Throwable $th) {
                $val = null;
            }
        }
        if($val == null && $from_currency == 'UZS'){
            $val = 1 / 142.975677;
        }
        else if($val == null && $from_currency == 'RUB'){
            $val = 142.975677;
        }
        $total = $val * $amount;
        return number_format($total, 1, '.', '');
      }

      public static function convertCurrencyUsd($amount,$from_currency,$to_currency){
        $apikey = 'da70cfa376a214df27cf';
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
        try {
            //code...
            $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
            $obj = json_decode($json, true);
            $val = floatval($obj["$query"]);
        } catch (\Throwable $th) {
            //throw $th;
            $val = null;
        }
        if($val == null && $from_currency == 'UZS'){
            $val = 1 / 10473.00;
        }
        else if ($val == null && $from_currency == 'USD'){
            $val = 10473.00;
        }
        $total = $val * $amount;
        return number_format($total, 2, '.', '');
      }

      public static function niceShort($attr) {
        if(session()->get('current_time_zone') != null){
           $current_time_zone = session()->get('current_time_zone');
           $utc = strtotime($attr)-date('Z'); // Convert the time zone to GMT 0. If the server time is what ever no problem.
    
           $attr = $utc+$current_time_zone; // Convert the time to local time
           $attr = date("d.m.yy | H:i", $attr);
           return $attr;
        }
      }

      public static function dateFormat($start_date){
        $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
        $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

        $ru_weekdays = array( 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' );
        $en_weekdays = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

        $date = date('F', strtotime ( $start_date )); 
        $date_month = str_replace($en_month, $ru_month, $date);
        $date_day = str_replace($en_weekdays, $ru_weekdays, date('l', strtotime ( $start_date )));
        return $date_day.", ". date('j', strtotime ( $start_date ))." ".$date_month.", ";
      }
      
}
