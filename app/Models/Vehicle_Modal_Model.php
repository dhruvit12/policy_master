<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_Modal_Model extends Model
{
	protected $table      = 'vehicle_model';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'vehicle_maker_id','vehicle_model_name', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
