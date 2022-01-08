<?php namespace App\Models;

use CodeIgniter\Model;

class QuotationGeneralInfoModel extends Model
{
	protected $table      = 'nsurance_quotation_general_info';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
    protected $allowedFields = array('fk_quotation_id', 'fk_insurance_class_id', 'sum_insured', 'rate_percentage', 
    'override_percentage', 'actual_premium', 'adjust_premium', 'total_premium', 'description', 'is_active',
     'is_deleted', 'created_at', 'updated_at');

}
