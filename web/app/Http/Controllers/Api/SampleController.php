<?php

namespace App\Http\Controllers\Api;

use App\Service\RandomNumberService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SampleController extends Controller
{
    public function __construct(
        private RandomNumberService $service
    ){}

    public function index(): Response
    {
        Cache::store('apc')->forever("getNumber", $this->service->getNumber());
        $num = Cache::store('apc')->get("getNumber", "-1");
        return response("{ \"number\": {$num} }", Response::HTTP_OK);
    }
}
