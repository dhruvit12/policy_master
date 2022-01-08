<?php namespace App\Models;

use CodeIgniter\Model;

class LienClauseModel extends Model
{
	protected $table      = 'lien_clause';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
         'id', 'lien_clause_name', 'description', 'is_active', 'is_deleted', 'updated_at', 'created_at'
	];

}
