<?php namespace App\Models;

use CodeIgniter\Model;

class Insurance_category_model extends Model
{
	protected $table      = 'insurance_category';
	protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'insurance_category', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
