<?php namespace App\Models;

use CodeIgniter\Model;

class PerilsModel extends Model
{
	protected $table      = 'perils_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'perils_type_name', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
