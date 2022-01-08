<?php namespace App\Models;

use CodeIgniter\Model;

class ManageClaimsModel extends Model
{
	protected $table      = 'manage_claims';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'id', 'quot_id', 'fk_client_id','fk_branch_id', 'fk_insurance_company_id', 'insurance_type_id', 'insurance_class_id', 'date_from', 'date_to', 'client_name', 'insured_name', 'risk_note', 'premium_amount', 'customer_balance', 'insurer_balance', 'email', 'vehicle_make_id', 'vehicle_model_id', 'vehicle_type_id', 'date_of_loss_accident', 'time_of_loss_accident', 'reported_date', 'reported_time', 'accident_region', 'place_of_loss_accident', 'cause_of_loss_accident', 'sub_cause_of_loss', 'loss_type', 'intimation_type', 'claim_reported_by', 'insurer_intimation_date', 'accident_caused_by', 'claimant_name', 'description_of_injury_involved', 'circumstances_of_the_accident', 'remarks', 'third_party_insurance_information', 'principal_outstanding_balance', 'tenure', 'interest_rate', 'driver_name', 'driver_age', 'occupation', 'relation_to_insured', 'driver_address', 'license_number', 'issuing_authority', 'class_type', 'license_expiry', 'contact_name', 'contact_mobile', 'contact_email', 'contact_address', 'expected_loss', 'currency_id', 'release_order', 'insured_claimed_amount', 'excess_amount', 'payable_amount', 'paid_amount', 'balance_amount', 'all_documents_received', 'claimsdocuments', 'current_status', 'record_status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];
}
