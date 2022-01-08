<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_Insure_Type extends Model
{
	protected $table      = 'vehicle_insure_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'vehicle_insure_name', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
