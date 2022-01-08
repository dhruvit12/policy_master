<?php namespace App\Models;

use CodeIgniter\Model;

class ProvisionalBatchTaxInvoicesModel extends Model
{
	protected $table      = 'provisional_batch_tax_invoices';
	protected $primaryKey = 'id';

	protected $allowedFields = [
	'id', 'tax_invoice_no', 'quot_ids', 'date', 'batch_tax_invoice_type', 'etr_no', 'insurance_company_id', 'date_from',
	'date_to', 'currency_id', 'x_rate', 'total_premium', 'commission', 'vat_on_commission', 'total_commission', 'current_balance',
	'status', 'received_commission', 'equivalent_commission', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];
}
