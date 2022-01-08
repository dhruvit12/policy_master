<?php namespace App\Models;

use CodeIgniter\Model;

class Broker_DetailsModel extends Model
{
	protected $table      = 'broker_details';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'company_name', 'for_name','tel_1','tel_2','address_1','address_2','cover_note_prefix','url',
        'vrn','tin','bank_detail','company_disclamer','company_claim_disclamer',
        'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
