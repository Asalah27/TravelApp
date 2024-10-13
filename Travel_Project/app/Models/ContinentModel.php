<?php

namespace App\Models;

use CodeIgniter\Model;

class ContinentModel extends Model
{
    protected $table = 'continent';
    protected $primaryKey = 'cont_id'; 
    protected $allowedFields = ['cont_name'];

    
}