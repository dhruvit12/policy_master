<?php namespace App\Models;

use CodeIgniter\Model;

class IncentivePercentageModel extends Model
{
	protected $table      = 'incentive_percentage';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'broker_id', 'date_from', 'date_to', 'zone', 'region', 'branch', 'sales_office', 'head_office', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
