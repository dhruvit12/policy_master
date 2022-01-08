<?php namespace App\Models;

use CodeIgniter\Model;

class CurrencyModel extends Model
{
	protected $table      = 'currency';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'name', 'code', 'rate', 'requestBy','masterId', 'updatedBy', 'is_active', 'is_deleted', 'created_at', 'updated_at'];

}
