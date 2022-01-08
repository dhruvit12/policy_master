<?php namespace App\Models;

use CodeIgniter\Model;

class Covernotebook_Model extends Model
{
	protected $table      = 'supplier';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'supplier_name', 'supplier_id', 'address', 'telephone_no', 'phone_no', 'email', 'is_active', 'is_deleted', 'created_at'];

}
