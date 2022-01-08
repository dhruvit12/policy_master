<?php namespace App\Models;

use CodeIgniter\Model;

class Setup_CommunicationModel extends Model
{
	protected $table      = 'communication_details';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'mode', 'fk_service_type_id', 'mail_subject',
		'content', 'enable', 'is_active', 'is_deleted','created_at','updated_at'
	];

}
