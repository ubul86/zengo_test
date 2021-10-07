<?php

namespace App\Interfaces;

use App\Http\Requests\CityRequest;

interface CityInterface
{
    /**
     * Get all cities by county id
     * 
     * @param   integer     $countyId
     *      
     * @access  public
     */
    public function getAllCitiesByCountyId($countyId);
    
    /**
     * Create | Update county
     * 
     * @param   \App\Http\Requests\CountyRequest $request
     * @param   integer $id
     *      
     * @access  public
     */
    public function requestCity(CityRequest $request, $id = null);

    /**
     * Delete county
     * 
     * @param   integer     $id
     *      
     * @access  public
     */
    public function deleteCity($id);
    
}