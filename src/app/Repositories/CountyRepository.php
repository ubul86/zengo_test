<?php

namespace App\Repositories;

use App\Interfaces\CountyInterface;
use App\Traits\ResponseAPI;
use App\Models\County;
use DB;

class CountyRepository implements CountyInterface
{    
    use ResponseAPI;
    
    public function getAllCounties() {
        try {
            $models = County::all();
            return $this->success("All Counties", $models);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
}