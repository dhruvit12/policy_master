<?php namespace App\Models;

use CodeIgniter\Model;

class Cliam_payee_Model extends Model
{
	protected $table      = 'claim_payee';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'payee_type', 'payee_name', 'payId', 'address', 'telephone', 'email', 'mobile1', 'mobile2', 'mobile3', 'account_name', 'account_no', 'account_currency_id', 'bank', 'is_active', 'is_deleted', 'created_at'
	];

}
