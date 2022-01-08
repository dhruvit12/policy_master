<?php namespace App\Models;

use CodeIgniter\Model;

class EmailSmsHistoryModel extends Model
{
	protected $table      = 'email_sms_history';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'mode', 'client_id', 'client_type_id', 'insurance_company_id', 'email',
		'subject', 'mobile_no', 'message', 'status', 'created_at', 'updated_at'
	];

}
