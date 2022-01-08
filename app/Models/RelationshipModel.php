<?php namespace App\Models;

use CodeIgniter\Model;

class RelationshipModel extends Model
{
	protected $table      = 'relationship';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'name', 'is_active', 'is_deleted'
	];

}
