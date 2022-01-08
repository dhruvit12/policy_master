<?php namespace App\Models;

use CodeIgniter\Model;

class NotificationGroupModel extends Model
{
	protected $table      = 'group_detail_insurer';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'Group_Name', 'Users', 'External_Emails', 'External_Mobiles', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
