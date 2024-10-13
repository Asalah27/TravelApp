<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'travel_review';
    protected $primaryKey = 'review_id'; 
    protected $allowedFields = ['user_id', 'comments', 'rating'];


    // public function getReviewsWithUser()
    // {
    //     $builder = $this->db->table('travel_review');
    //     $builder->select('travel_review.comments, travel_review.rating, users.firstname, users.lastname');
    //     $builder->join('users', 'users.id = travel_review.user_id');
    //     $query = $builder->get();

    //     return $query->getResultArray();
    // }
    
}