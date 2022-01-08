<?php namespace App\Models;

use CodeIgniter\Model;

class ManagebidsModel extends Model
{
	protected $table      = 'manage_bids';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'date', 'status', 'bid_date', 'vehicle_no', 'vehicle_make', 'type', 'chasis_no', 'salvage_value', 'min_bid_value', 'currency_id', 'address', 'contact_person', 'mobile', 'Perferred_time', 'contact_person1', 'mobile1', 'bid_type', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
