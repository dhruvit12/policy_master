<?php namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
	protected $table      = 'pm_settings';
	protected $allowedFields = [
        'id', 'vat'
	];

}
