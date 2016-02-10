<?php

namespace App\TechTest;

class Csrf
{
    public static function token()
    {
        $extra = sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        $token = base64_encode(time() . $extra . self::randomNumber(32));

        return $token;
    }

    public static function randomNumber($length)
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max = strlen($seed) - 1;
        $string = '';
        for ($i = 0; $i < $length; ++$i)
            $string .= $seed{intval(mt_rand(0.0, $max))};
        return $string;
    }
}