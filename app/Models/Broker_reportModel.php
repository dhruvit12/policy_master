<?php namespace App\Models;

use CodeIgniter\Model;

class Broker_reportModel extends Model
{
	protected $table      = 'broker_reports';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';
 
	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'name', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
