<?php namespace App\Models;

use CodeIgniter\Model;

class StickerAssignmentModel extends Model
{
	protected $table      = 'sticker_assignment';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'book_number_id', 'branch_id', 'insurance_company_id', 'insurance_type', 'insurance_class', 'sequence_from', 'sequence_to', 'last_use',
		'status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
