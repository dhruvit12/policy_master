<?php namespace App\Models;

use CodeIgniter\Model;

class IndividualInsurerLevelSetupModel extends Model
{
	protected $table      = 'individual_insurer_level_setup';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'company_id', 'insure_type_id', 'insure_class_id', 'commission_rate', 'is_deleted', 'created_at', 'updated_at'
	];

}
