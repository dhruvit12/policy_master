<?php namespace App\Models;

use CodeIgniter\Model;

class CurrencyHistoryModel extends Model
{
	protected $table      = 'currency_history';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'currency_id', 'userId', 'requestId', 'rate_data', 'is_added'];

}
