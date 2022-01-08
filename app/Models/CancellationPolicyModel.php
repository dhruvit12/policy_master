<?php namespace App\Models;

use CodeIgniter\Model;

class CancellationPolicyModel extends Model
{
	protected $table      = 'cancellation_policy';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'quot_id', 'client_id', 'creditnote_id', 'notes', 'created_at'];

}
