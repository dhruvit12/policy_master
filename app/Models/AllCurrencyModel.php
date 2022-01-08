<?php namespace App\Models;

use CodeIgniter\Model;

class AllCurrencyModel extends Model
{
	protected $table      = 'allCurrency';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id','name', 'code'];

}
