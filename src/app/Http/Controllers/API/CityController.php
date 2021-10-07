<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CityInterface;
use App\Http\Requests\CityRequest;

class CityController extends Controller {

    public $cityInterface;

    public function index() {
        return [];
    }

    public function __construct(CityInterface $interface) {
        $this->cityInterface = $interface;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request) {
        return $this->cityInterface->requestCity($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByCountyId($id) {
        return $this->cityInterface->getAllCitiesByCountyId($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id) {
        return $this->cityInterface->requestCity($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return $this->cityInterface->deleteCity($id);
    }

}
