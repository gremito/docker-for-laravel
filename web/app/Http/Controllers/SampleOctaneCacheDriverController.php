<?php

namespace App\Http\Controllers;

use App\Service\RandomNumberService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SampleOctaneCacheDriverController extends Controller
{
    public function __construct(
        private RandomNumberService $service
    ){}

    public function index(): Response
    {
        Cache::store('octane')->forever("getNumber", $this->service->getNumber());
        $num = Cache::store('octane')->get("getNumber", "-1");
        return response('Number:' . $num, Response::HTTP_OK);
    }
}
