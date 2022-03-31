<?php

namespace App\CPU;


use App\Model\BusinessSetting;
use App\Model\Currency;

class Convert
{
    public static function usd($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $default = Currency::find(BusinessSetting::where(['type' => 'system_default_currency'])->first()->value);
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $default['exchange_rate'] / $usd;
            $value = floatval($amount) / floatval($rate);
        } else {
            $value = floatval($amount);
        }

        return $value;
    }

    public static function default($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $default = Currency::find(BusinessSetting::where(['type' => 'system_default_currency'])->first()->value);
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $default['exchange_rate'] / $usd;
            $value = floatval($amount) * floatval($rate);
        }else{
            $value = floatval($amount);
        }
        return round($value, 2);
    }

    public static function bdtTousd($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $bdt = Currency::where(['code' => 'BDT'])->first()->exchange_rate;
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $bdt / $usd;
            $value = floatval($amount) / floatval($rate);
        }else{
            $value = floatval($amount);
        }

        return $value;
    }

    public static function usdTobdt($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $bdt = Currency::where(['code' => 'BDT'])->first()->exchange_rate;
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $usd / $bdt;
            $value = floatval($amount) / floatval($rate);
        }else{
            $value = floatval($amount);
        }

        return $value;
    }

    public static function usdTomyr($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $myr = Currency::where(['code' => 'MYR'])->first()->exchange_rate;
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $usd / $myr;
            $value = floatval($amount) / floatval($rate);
        }else{
            $value = floatval($amount);
        }

        return $value;
    }

    public static function usdTozar($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $zar = Currency::where(['code' => 'ZAR'])->first()->exchange_rate;
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $usd / $zar;
            $value = floatval($amount) / floatval($rate);
        }else{
            $value = floatval($amount);
        }

        return $value;
    }

    public static function usdToinr($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $inr = Currency::where(['code' => 'INR'])->first()->exchange_rate;
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $usd / $inr;
            $value = floatval($amount) / floatval($rate);
        }else{
            $value = floatval($amount);
        }

        return $value;
    }
}
