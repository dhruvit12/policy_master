<?php namespace App\Models;

use CodeIgniter\Model;

class OccupationModel extends Model
{
	protected $table      = 'occupation';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'occupation', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
