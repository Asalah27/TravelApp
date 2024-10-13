<?php

namespace App\Models;

use CodeIgniter\Model;

class TripModel extends Model
{
    protected $table = 'trip';
    protected $primaryKey = 'trip_id';
    protected $allowedFields = ['trip_img', 'destination', 'place_id' , 'departure_date', 'return_date', 'price' , 'available_seats'];
    protected $returnType = 'object'; // Ensure objects are returned to access relationships
 
    
}