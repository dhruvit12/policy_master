<?php namespace App\Models;

use CodeIgniter\Model;

class PerilsGroupModel extends Model
{
	protected $table      = 'perils_group';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'perils_group', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
