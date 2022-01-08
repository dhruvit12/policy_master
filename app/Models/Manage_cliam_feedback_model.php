<?php namespace App\Models;

use CodeIgniter\Model;

class Manage_cliam_feedback_model extends Model
{
	protected $table      = 'manage_cliam_feedback';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'client_id', 'feedback', 'status', 'date','time', 'receiver', 'document', 'is_active', 'is_deleted', 'created_at', 'updated_at' 
	];

}
