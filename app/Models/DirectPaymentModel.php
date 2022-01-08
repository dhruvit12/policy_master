<?php namespace App\Models;

use CodeIgniter\Model;

class DirectPaymentModel extends Model
{
	protected $table      = 'direct_payment1';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		  'id', 'company_id', 'quot_id', 'date', 'client_id', 'branch_id', 'amount', 'currency_id', 'verification_number', 'rate', 'ccy', 'pending_amount', 'mode', 'reference_number', 'issue_bank', 'collecting_bank', 'notes', 'receipt_number', 'status', 'payment_type', 'is_active', 'is_deleted', 'created_at', 'updated_at'];
}
