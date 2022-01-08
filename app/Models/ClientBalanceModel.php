<?php namespace App\Models;

use CodeIgniter\Model;

class ClientBalanceModel extends Model
{
	protected $table      = 'client_balance';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'client_id', 'quot_id', 'creditnote_id', 'currency_id', 'x_rate', 'created_at'
	];

}
