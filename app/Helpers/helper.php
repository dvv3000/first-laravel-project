<?php


if (!function_exists('checkSuperadmin')) {
    function isSuperadmin()
    {
        return session()->get('role') === '1';
    }
}
?>