<?php namespace App\Models;

use CodeIgniter\Model;

class Medical_Insurance_second_quotation_Model extends Model
{
 protected $table      = 'medical_Insurance_second_quotation_Model';
 protected $primaryKey = 'id';
 protected $allowedFields = [
   'id', 'quot_id', 'client_id', 'token','extension', 'sum_insured2', 'rate', 'actual_premium', 'description2', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
