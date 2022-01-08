<?php namespace App\Models;

use CodeIgniter\Model;

class VoucherbaseModel extends Model
{
	protected $table      = 'voucher';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'client_id', 'company_id', 'exchange_rate', 'Base_ccy', 'pending_Amount', 'payment_mode', 'cheque_reference_no', 'bank_detail', 'reference_id','dates', 'amount', 'note','currency_id', 'Reference', 'payment', 'status', 'allocated_status', 'is_actived', 'is_deleted', 'created_at', 'updated_at'
	];

}
