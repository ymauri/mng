<?php

use App\Providers\FlashServiceProvider;

if (! function_exists('flash')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $message
     * @param  string  $level
     * @return App\Services\FlashServiceProvider
     */
    function flash($message = null, $level = 'info')
    {
        $notifier = new FlashServiceProvider();

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }
}
