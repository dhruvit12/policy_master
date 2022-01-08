<?php namespace App\Models;

use CodeIgniter\Model;

class Settelement_model extends Model
{
	protected $table      = 'settelement';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'excess', 'excess_percent', 'betterment_percent', 'reserve_amount', 'less_excess_amount', 'less_bettlement_depreciation', 'inexperience_driver', 'salvage', 'sum_assured', 'actual_loss_reserve', 'total_deductibles', 'payable_amount', 'release_order', 'total_amount_paid', 'balance_amount', 'settlement_date', 'insured_cliam_amount', 'sattelment_id', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
