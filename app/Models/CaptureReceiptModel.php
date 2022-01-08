<?php namespace App\Models;

use CodeIgniter\Model;

class CaptureReceiptModel extends Model
{
	protected $table      = 'capture_receipt';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
         'id', 'risk_note_no', 'quot_id', 'quotation_id', 'total_receivable', 'premium_currency', 'mode', 'reference_no',
				 'issuer_bank', 'collecting_bank', 'amount', 'fk_currency_id', 'rate', 'equivalent_amount', 'status',
				  'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
