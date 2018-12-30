<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 下午7:50
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\Api\FilterWordService as Service;

class FilterWordController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function check()
    {
        return response()->json($this->service->check());
    }
}