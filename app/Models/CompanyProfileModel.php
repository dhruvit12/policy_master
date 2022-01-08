<?php namespace App\Models;

use CodeIgniter\Model;

class CompanyProfileModel extends Model
{
	protected $table      = 'company';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'company_name', 'address_1', 'address_2', 'tel_1', 'tel_2', 'sms_sender', 'for_name', 'company_type', 'cover_note_prefix', 'idproof_type',
				'url', 'vrn', 'tin', 'fk_risk_note', 'fk_currency_position_account_id', 'fk_currency_valuation_account_id', 'fk_vat_control_account_id', 'address', 'tel_no', 'mobile_number', 'email', 'preferred_system_notice',
				' fk_general_account_id ', 'fk_medical_account_id', 'fk_life_account_id', 'bank_details', 'company_disclaimer', 'company_claim_disclaimer', 'is_active','is_deleted','created_at','updated_at'
	];

}
