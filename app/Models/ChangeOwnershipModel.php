<?php namespace App\Models;

use CodeIgniter\Model;

class ChangeOwnershipModel extends Model
{
	protected $table      = 'change_ownership';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'old_client_id', 'new_client_id', 'quot_id', 'insured_name', 'additional_terms_endorsement_details', 'transaction_charges', 'vat', 'vat_amount', 'administrator_fee', 'total_amount', 'status', 'is_deleted', 'created_at', 'updated_at'
	];

}
