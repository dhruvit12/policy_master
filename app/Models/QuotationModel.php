<?php namespace App\Models;

use CodeIgniter\Model;

class QuotationModel extends Model
{
	protected $table      = 'insurance_quotation';
	protected $primaryKey = 'id';

	protected $allowedFields = [
	'id', 'quotation_id', 'endorsementid', 'fk_client_id', 'fk_insurance_company_id', 'fk_insurance_type_id', 'fk_currency_id', 'tax_invoice_status', 'x_rate', 'insurer_x_rate', 'address', 'date_from', 'date_to', 'days_count', 'file_no', 'first_loss_payee', 'fk_branch_id', 'business_by', 'non_renewable', 'region', 'district', 'business_type_name', 'fronting_business', 'borrower', 'fk_borrower_type_id', 'insured_name', 'covering_details', 'description_of_risk', 'unique_property_identification', 'vat', 'total_premium_b_tax', 'insert_details', 'insert_details_second', 'other_fee', 'vat_amount', 'commission_amount', 'policy_holder_fund', 'insurance_levy', 'stamp_duty', 'withhold_tax', 'tax_total_premium', 'commission_percentage', 'broker_commission', 'vat_on_commission', 'insurer_settlement', 'discount_on_commission_percentage', 'discount_commission', 'total_receivable_a_commission', 'discount_on_premium_percentage', 'discount_premium', 'administrative_charges', 'total_receivable', 'addon_premium', 'outstanding_premium', 'tax_invoice', 'commencement_time', 'tra_receipt_no', 'tra_receipt_date', 'lien_clause_id', 'policy_no', 'score_of_cover', 'terms_and_clause', 'reject_description', 'current_balance', 'payment_status', 'status', 'debitnote_invoice_status', 'debitnoteno', 'ri_status', 'is_allocated_tax_invoices', 'is_allocated_receipts', 'is_cancelled', 'is_renewed', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];
}
