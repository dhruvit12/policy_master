<?php namespace App\Models;

use CodeIgniter\Model;

class CitiesModel extends Model
{
	protected $table      = 'cities';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'city_id', 'city_name', 'city_state'
	];

}
