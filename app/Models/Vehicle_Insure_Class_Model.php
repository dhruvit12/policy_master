<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_Insure_Class_Model extends Model
{
	protected $table      = 'vehicle_insure_class';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'name','vehicle_insure_type_id', 'description','accidents_rate', 'commission_rate', 'rate', 'override',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
