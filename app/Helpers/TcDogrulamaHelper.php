<?php

namespace App\Helpers;

class TcDogrulamaHelper
{
    public static function dogrula($tcno, $ad, $soyad, $dogumyili)
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                       xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                       xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
              <TCKimlikNo>' . $tcno . '</TCKimlikNo>
              <Ad>' . strtoupper($ad) . '</Ad>
              <Soyad>' . strtoupper($soyad) . '</Soyad>
              <DogumYili>' . $dogumyili . '</DogumYili>
            </TCKimlikNoDogrula>
          </soap:Body>
        </soap:Envelope>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"',
            'Content-Length: ' . strlen($xml)
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return strip_tags($response) === "true";
    }
}
