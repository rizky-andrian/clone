<?php

namespace App\Http\Utils;

class Utility
{

    public static function formatRupiah($angka)
    {
        $hasil = 'Rp. ' . number_format($angka, 0, ',', '.');
        return $hasil;
    }
}
