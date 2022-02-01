<?php

namespace App\Models;

use CodeIgniter\Model;

class OffersModel extends Model
{
   protected $table = 'offers';
   protected $primaryKey = 'offer_id';
   protected $allowedFields = ['seller_id','title','desc','enddate','price','category_id','loc','file_name','status','buyer'];

}