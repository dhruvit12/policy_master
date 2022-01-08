<?php namespace App\Models;

use CodeIgniter\Model;

class IssuerBankModel extends Model
{
	protected $table      = 'issuer_bank';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'issuer_bank_name', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
