<?php

namespace App\Mixins;

class StrMixins
{
    // nama method 'partNumber' nanti buat nama panggilannya misalnya Str::partNumber() didalam function partNumber mereturn function tanpa nama karena 
    // jika dipanggil langgsung menjalankanya difunction return itu ada parameter jadi nanti ketika dipanggil fungsi yang dipanggil didalamnya harus ada
    // parameter jadinya Str::partNumber('930303039392');
    public function partNumber()
    {
        return function($part)
        {
            return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix = 'AB-')
        {
            return $prefix . $string;
        };
    }
}