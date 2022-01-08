<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_MakerModel extends Model
{
	protected $table      = 'vehicle_maker';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'vehicle_maker_name', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
