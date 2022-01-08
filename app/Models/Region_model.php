<?php namespace App\Models;

use CodeIgniter\Model;

class Region_model extends Model
{
	protected $table      = 'region';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'region_name', 'is_active', 'is_deleted'
	];

}
