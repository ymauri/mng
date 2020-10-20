<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CcController extends Controller
{
    /**
     * Clear cache comand
     * @return void
     */
    public function clearCache() {
        Artisan::call('view:cache');
        Artisan::call('config:cache');
        die('done');
    }

    /**
     * Seed database
     * @param string $class
     * @return void
     */
    public function seed(string $class) {
        if (!empty($class)) {
             Artisan::call("db:seed", [
                '--force' => true,
                '--class' => $class
            ]);
            die('done');
        }
        die('Class can\'t be null');
    }

    /**
     * Migrate database
     *
     * @return void
     */
    public function migrate(string $param = null) {
        $command = !empty($param) ? "migrate:$param" : 'migrate';
        Artisan::call($command);
        die('done');
    }
}
