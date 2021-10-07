<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CountyInterface;

class CountyController extends Controller {

    public $countyInterface;

    public function __construct(CountyInterface $countyInterface) {
        $this->countyInterface = $countyInterface;
    }

    public function index() {
        return $this->countyInterface->getAllCounties();
    }

}
