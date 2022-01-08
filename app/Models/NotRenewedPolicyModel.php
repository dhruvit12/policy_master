<?php namespace App\Models;

use CodeIgniter\Model;

class NotRenewedPolicyModel extends Model
{
	protected $table      = 'not_renewed_policy';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'quot_id', 'description', 'created_at'
	];

}
