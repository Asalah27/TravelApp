<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'book_id';
    protected $allowedFields = ['user_id', 'trip_id', 'booking_date' , 'num_passenger', 'u_status', 'payment_status', 'special_req'];
    protected $returnType = 'object'; // Ensure objects are returned to access relationships
 
    
}