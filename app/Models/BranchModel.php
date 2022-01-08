<?php namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
	protected $table      = 'branch_details';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
       'id', 'branch_name', 'branch_image', 'branch_code', 'address_1', 'address_2', 'city', 'signature_authority', 'principal_office_signature', 'auto_generate_sticker', 'head_office', 'vat', 'status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
