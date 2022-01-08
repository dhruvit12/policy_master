<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_Insure_Class_Insert_Model extends Model
{
	protected $table      = 'vehicle_insurance_class_insert';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		// 'id', 'client_id', 'quot_id','currency_id', 'insured_name', 'insurance_type_id', 'insurance_class_id', 'description', 'registration_no', 'vehicle_maker', 'vehicle_model', 'vehicle_type',
		// 'engine_no', 'chassis_no', 'variant', 'fuel_type', 'manufacture_year', 'registration_year', 'seat', 'CC', 'color', 'windscreen_sum_insured', 'windscreen_premium',
		// 'accessories_sum_insured', 'accessories_information', 'vat', 'sum_insured', 'rate', 'override', 'tppd_sum_insured', 'short_period', 'actual_premium', 'adjust_premium',
		// 'total_premium', 'cover_note_no', 'sticker_no', 'period_of_insurance', 'sticker_other_fee', 'vat_amount', 'ph_guaranty_fund', 'training_insurance_levy', 'stamp_duty',
		// 'withhold_tax', 'total_receivable', 'commission_rate', 'broker_commission', 'vat_on_commission', 'insurer_settlement', 'discount_on_commission', 'discount_commission',
		// 'final_receivable', 'token', 'excess_benefits_discounts', 'is_added', 'is_deleted', 'created_at', 'updated_at'
		'id', 'client_id', 'quot_id', 'currency_id', 'risk_note_no', 'insured_name', 'insurance_type_id', 'insurance_class_id', 'description', 'registration_no', 'vehicle_maker', 'vehicle_model', 'vehicle_type', 'engine_no', 'chassis_no', 'variant', 'fuel_type', 'manufacture_year', 'registration_year', 'seat', 'CC', 'color', 'windscreen_sum_insured', 'windscreen_premium', 'accessories_sum_insured', 'accessories_information', 'vat', 'sum_insured', 'rate', 'override', 'tppd_sum_insured', 'short_period', 'actual_premium', 'adjust_premium', 'total_premium', 'cover_note_no', 'sticker_no', 'period_of_insurance', 'sticker_other_fee', 'vat_amount', 'ph_guaranty_fund', 'training_insurance_levy', 'stamp_duty', 'withhold_tax', 'total_receivable', 'commission_rate', 'broker_commission', 'vat_on_commission', 'insurer_settlement', 'discount_on_commission', 'discount_commission', 'final_receivable', 'token', 'excess_benefits_discounts', 'is_added', 'is_deleted', 'created_at', 'updated_at'
	];

}
