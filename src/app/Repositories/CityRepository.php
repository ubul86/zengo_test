<?php

namespace App\Repositories;

use App\Http\Requests\CityRequest;
use App\Interfaces\CityInterface;
use App\Traits\ResponseAPI;
use App\Models\City;
use DB;

class CityRepository implements CityInterface {

    use ResponseAPI;

    public function deleteCity($id) {
        DB::beginTransaction();
        try {
            $model = City::find($id);

            // Check the city
            if (!$model)
                return $this->error("No city with ID $id", 404);

            // Delete the city
            $model->delete();

            DB::commit();
            return $this->success("City deleted", $model);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getAllCitiesByCountyId($countyId) {
        try {
            $model = City::where('county_id', $countyId)->get();

            // Check the city
//            if (!$model){
//                return $this->error("No cities with ID $countyId", 404);
//            }
            return $this->success("City Details", $model);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestCity(CityRequest $request, $id = null) {
        DB::beginTransaction();
        try {
            // If city exists when we find it
            // Then update the city
            // Else create the new one.            
            $model = $id ? City::find($id) : new City;
            // Check the city 
            if ($id && !$model){
                return $this->error("No city with ID $id", 404);
            }
            
            $oldModel = City::where('name', $request->name)->first();
            if(!$id && $oldModel){
                return $this->error("There is already a city with this name!", 500);
            }

            $model->name = $request->name;
            
            if(!$id){
                $model->county_id=$request->county_id;
            }
            // Save the city
            $model->save();

            DB::commit();
            return $this->success(
                            $id ? "City updated" : "City created",
                            $model, $id ? 200 : 201);
        } catch (\Exception $e) {                        
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

}
