<?php namespace App\Models;

use CodeIgniter\Model;

class Sms_greetingsModel extends Model
{
	protected $table      = 'sms_greetings';
	protected $primaryKey = 'id';

	protected $allowedFields = [
       'id', 'client_id', 'mobile_number', 'message', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
