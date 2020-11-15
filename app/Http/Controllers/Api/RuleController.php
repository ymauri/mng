<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RuleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RuleController extends Controller
{
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RuleService $service)
    {
        $this->middleware('api');
        $this->service = $service;
    }

    /**
     * API. Executes rule on guesty platform
     */
    public function execute(Request $request) {
        try {
            $this->service->execute($request->input('reservation'));
            return response("OK", 200);
        } catch (Exception $e) {
            Log::error($e);
            return response("KO", 400);
        }
    }
}
