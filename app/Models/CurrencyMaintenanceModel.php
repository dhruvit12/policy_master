<?php namespace App\Models;

use CodeIgniter\Model;

class CurrencyMaintenanceModel extends Model
{
	protected $table      = 'currency_maintenance';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'currency_id', 'old_rate', 'new_rate', 'userId', 'status', 'is_deleted', 'updated_at', 'created_at'];

}
