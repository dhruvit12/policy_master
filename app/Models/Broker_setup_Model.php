<?php namespace App\Models;

use CodeIgniter\Model;

class Broker_setup_Model extends Model
{
	protected $table      = 'broker_setup';
	protected $primaryKey = 'id';

	protected $allowedFields = [
        'id', 'broker_name', 'broker_id', 'address', 'telephone', 'email', 'is_active', 'is_deleted', 'created_at', 'updated_at'];

}
