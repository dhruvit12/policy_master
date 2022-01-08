<?php namespace App\Models;

use CodeIgniter\Model;

class ClasswisesetupModel extends Model
{
	protected $table      = 'class_wise_setup';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
       'id', 'company_id', 'date', 'insurance_type_id', 'sequence_from', 'sequence_to', 'last_sequence', 'last_used_date', 'status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
