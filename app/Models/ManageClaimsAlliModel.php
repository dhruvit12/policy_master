<?php namespace App\Models;

use CodeIgniter\Model;

class ManageClaimsAlliModel extends Model
{
	protected $table      = 'manage_claims_alli';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'id', 'fk_client_id','quot_id', 'fk_insurance_company_id', 'risk_note', 'notification', 'cliam_date', 'premium_amount', 'paid_amount', 'balance_amount', 'email', 'external_cliam', 'branch_id', 'insurance_type_id', 'insurance_class_id', 'policy', 'date_from', 'date_to', 'cover_note', 'sticker', 'vehicle', 'client_name', 'file', 'insured_name', 'date_accident', 'accident_region', 'claimant_name', 'time_accident', 'place_accident', 'intimation_type', 'reported_date', 'cause_accident', 'reported_time', 'loss_type', 'accident_caused_by', 'circumstances_of_the_accident', 'third_party_insurance', 'description', 'remark', 'drivers_name', 'age', 'address', 'occupation', 'license_number', 'class_type', 'relation_to_Insured', 'issuing_authority', 'license_expiry', 'client_mobile_number', 'client_email', 'client_address', 'mobile2', 'email_id2', 'sum_insured', 'expected_cliam_amount', 'currency', 'release_order', 'excess_amount', 'payable_amount', 'status', 'current_status', 'is_active', 'is_deleted'
	];
}
