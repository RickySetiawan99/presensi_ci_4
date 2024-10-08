<?php

use Hashids\Hashids;

if (! function_exists('encode_id')) {
    function encode_id($id)
    {
        $hashids = new Hashids();
        return $hashids->encode($id);
    }
}

if (! function_exists('decode_id')) {
    function decode_id($hash)
    {
        $hashids = new Hashids();
        return $hashids->decode($hash);
    }
}