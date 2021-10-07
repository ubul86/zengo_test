<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'county';
    
    public $fillable = [
        'id',        
        'name',        
    ]; 
    
    public $timestamps = true;
}
