<?php namespace App\Models;

use CodeIgniter\Model;

class TargetModel extends Model
{
	protected $table      = 'target_details';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'fk_company_id', 'fk_branch_id', 'fk_product_id', 'fk_currency_id', 'year', 'customer_type', 'x_rate', 'jan_tar_amo', 'jan_count',
		'feb_tar_amo', 'feb_count', 'mar_tar_amo', 'mar_count', 'apr_tar_amo', 'apr_count', 'may_tar_amo', 'may_count', 'jun_tar_amo', 'jun_count',
		'jul_tar_amo', 'jul_count', 'aug_tar_amo', 'aug_count', 'sep_tar_amo', 'sep_count', 'oct_tar_amo', 'oct_count', 'nov_tar_amo', 'nov_count',
		'dec_tar_amo', 'dec_count', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
