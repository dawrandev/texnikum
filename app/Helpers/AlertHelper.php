<?php

namespace App\Helpers;

class AlertHelper
{
    public static function success(string $message): void
    {
        session()->flash('alert', [
            'type' => 'success',
            'message' => $message
        ]);
    }

    public static function error(string $message): void
    {
        session()->flash('alert', [
            'type' => 'error',
            'message' => $message
        ]);
    }

    public static function warning(string $message): void
    {
        session()->flash('alert', [
            'type' => 'warning',
            'message' => $message
        ]);
    }

    public static function info(string $message): void
    {
        session()->flash('alert', [
            'type' => 'info',
            'message' => $message
        ]);
    }
}
