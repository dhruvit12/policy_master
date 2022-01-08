<?php namespace App\Models;

use CodeIgniter\Model;

class QuotationVehicleInfoModel extends Model
{
	protected $table      = 'insurance_quotation_vehicle_info';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
    protected $allowedFields = array('id', 'fk_quotation_id', 'excess_buy_back', 'geographical_extension', 'loss_of_use', 
    'increased_tppd', 'excess_protector', 'excess_pvt', 'accidents', 'membership_discount', 'gps_tracking_installed', 'fleet_claim', 
    'additional_discount', 'vat_discount', 'fk_insurance_sub_type', 'fk_insurance_sub_class', 'other_description', 'registration_no', 
    'fk_vehicle_make', 'fk_vehicle_model', 'fk_vehicle_type', 'engine_no', 'chassis_no', 'gross_weight', 'fk_fuel_type', 
    'manufacture_year', 'registration_year', 'seat', 'cc', 'color', 'windscreen_sum_insured', 'windscreen_premium', 
    'accessories_sum_insured', 'accessories_information', 'sum_insured', 'rate_percentage', 'override', 
    'tppd_sum_insured', 'short_period', 'actual_premium', 'adjust_premium', 'total_premium', 'cover_note_no', 'sticker_no', 
    'period_of_insurance');

}
