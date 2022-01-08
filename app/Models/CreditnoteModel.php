<?php namespace App\Models;

use CodeIgniter\Model;

class CreditnoteModel extends Model
{
	protected $table      = 'credit_note';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'creditnote_no', 'quot_id', 'type', 'client_id', 'company_id', 'date', 'branch_id',
	'description','category' ,'currency_id', 'insurer_deduct_amount', 'vat_percent', 'gross_amount', 'vat',
	'total_amount', 'commission_rate', 'broker_commission', 'vat_on_commission', 'is_active', 'is_allocated',
	'is_deleted', 'created_at', 'updated_at'];

}
