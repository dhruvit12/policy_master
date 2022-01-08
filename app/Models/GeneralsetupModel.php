<?php namespace App\Models;

use CodeIgniter\Model;

class GeneralsetupModel extends Model
{
	protected $table      = 'general_setup';
	protected $primaryKey = 'id';
    protected $allowedFields = [
       'id', 'company_id', 'date', 'insurance_type_id', 'sequence_from', 'sequence_to', 'last_sequence', 'last_used_date', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
