<?php namespace App\Models;

use CodeIgniter\Model;

class Payment_mode extends Model
{
	protected $table      = 'payment_mode';
	protected $primaryKey = 'id';
	protected $allowedFields = ['name', 'is_active'];

}
