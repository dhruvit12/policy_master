<?php namespace App\Models;

use CodeIgniter\Model;

class Book_production_Model extends Model
{
	protected $table      = 'Book_production_request';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'date_request', 'expected_date', 'person_request', 'insurance_type_id', 'pages', 'no_of_books', 'notes', 'printer', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
