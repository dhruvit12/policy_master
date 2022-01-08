<?php namespace App\Models;

use CodeIgniter\Model;

class AttachTypeModel extends Model
{
	protected $table      = 'attach_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'document_type', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
