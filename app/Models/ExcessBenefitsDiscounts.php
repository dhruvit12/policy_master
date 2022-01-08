<?php namespace App\Models;

use CodeIgniter\Model;

class ExcessBenefitsDiscounts extends Model
{
	protected $table      = 'excess_benefits_discounts';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'excess_buy_back', 'geographical_extension', 'loss_of_use', 'increased_tppd', 'excess_protector', 'excess_pvt'
	];

}
