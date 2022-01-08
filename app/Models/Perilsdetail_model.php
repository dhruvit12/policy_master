<?php namespace App\Models;

use CodeIgniter\Model;

class Perilsdetail_model extends Model
{
	protected $table      = 'perils_details';
	protected $primaryKey = 'id';

	protected $allowedFields = [
        'id', 'perilsid', 'perilstype', 'perilsgroup', 'insurance_class_type','is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
