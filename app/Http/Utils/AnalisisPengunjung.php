<?php

namespace App\Http\Utils;

use App\Models\AnalisisPengunjung as Model;

class AnalisisPengunjung
{
    public static function recordVisitor(string $ip_address, string $user_agent, string $url)
    {
        $analisisPengunjung = new Model();
        $analisisPengunjung->ip_address = $ip_address;
        $analisisPengunjung->user_agent = $user_agent;
        $analisisPengunjung->url = $url;
        $analisisPengunjung->save();
    }
}
