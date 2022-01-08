<?php namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
	protected $table      = 'country';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode', 'is_active', 'is_deleted'];

}
