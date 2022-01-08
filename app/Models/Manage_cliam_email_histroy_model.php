<?php namespace App\Models;

use CodeIgniter\Model;

class Manage_cliam_email_histroy_model extends Model
{
	protected $table      = 'manage_cliam_email_histroy';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'company_id','risknoteno','client_name', 'email', 'subject', 'message', 'mode', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
