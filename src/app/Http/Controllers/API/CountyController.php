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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->countyInterface->getAllCounties();
    }

}
