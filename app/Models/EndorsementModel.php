<?php namespace App\Models;

use CodeIgniter\Model;

class EndorsementModel extends Model
{
	protected $table      = 'endorsement';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'type', 'quot_id', 'risk_note_no', 'change_ownership_id', 'date', 'status', 'is_deleted', 'created_at', 'updated_at'
	];

}
