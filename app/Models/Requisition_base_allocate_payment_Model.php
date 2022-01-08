<?php namespace App\Models;

use CodeIgniter\Model;

class Requisition_base_allocate_payment_Model extends Model
{
	protected $table      = 'Requisition_base_allocate_payment';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'payment', 'date', 'client_id', 'amount', 'currency_id', 'allocate_status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
