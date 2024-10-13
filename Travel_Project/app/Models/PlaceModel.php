<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaceModel extends Model
{
    protected $table = 'place';
    protected $primaryKey = 'place_id'; 
    protected $allowedFields = ['cont_id' , 'place_name'];

    
}