<?php namespace App\Models;

use CodeIgniter\Model;

class Claimrepository_Model extends Model
{
	protected $table      = 'cliam_repository';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'date', 'date_from', 'date_to', 'insured_name', 'vehicle_reg_no', 'vehicle_make', 'vehicle_type', 'chassis_no', 'engine_no', 'policy_no', 'cover_note', 'risk_note', 'claim_amount', 'currency_id', 'insurer_name', 'total_loss', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
