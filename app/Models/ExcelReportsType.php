<?php namespace App\Models;

use CodeIgniter\Model;

class ExcelReportsType extends Model
{
	protected $table      = 'excel_reports_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'excel_reports_type', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
