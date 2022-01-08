<?php namespace App\Models;

use CodeIgniter\Model;

class Setup_product_clauseModel extends Model
{
	protected $table      = 'setup_product_clause';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'insurance_type_id', 'insurance_class_id', 'currency_id', 'excess', 'exclusion', 'scope', 'extension', 'TPPD_sum', 'TPPD', 'TPPD_event', 'TPDIL_person', 'TPDIL_event', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
