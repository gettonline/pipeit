<?php

use GettOnline\PipeIt\Pipe;

if (!function_exists('pipe')) {
    function pipe($value)
    {
        return Pipe::it($value);
    }
}
