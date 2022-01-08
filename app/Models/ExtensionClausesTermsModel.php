<?php namespace App\Models;

use CodeIgniter\Model;

class ExtensionClausesTermsModel extends Model
{
	protected $table      = 'extension_clauses_terms';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'insurance_type_id', 'insurance_class_id', 'excess', 'exclusions', 'scope_of_cover', 'extension_terms_clauses', 'is_deleted', 'created_at', 'updated_at'
	];

}
