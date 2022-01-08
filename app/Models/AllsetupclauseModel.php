<?php namespace App\Models;

use CodeIgniter\Model;

class AllsetupclauseModel extends Model
{
	protected $table      = 'setupclausetype';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'type', 'name', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
