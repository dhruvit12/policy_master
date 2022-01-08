<?php namespace App\Models;

use CodeIgniter\Model;

class Cover_note_utilization_Model extends Model
{
	protected $table      = 'Cover_note_utilization';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'date', 'Intermediary', 'Intermediary_branch', 'Insurance_type_id', 'Insurance_subtype_id', 'Book_number', 'Current_number', 'Record_type', 'Description', 'Insurance_name', 'Period_from', 'Period_To', 'Vehicle_registraction', 'Sticker', 'Ccy', 'Premium', 'VAT_Amount', 'Total_Premium', 'Receipt_Date', 'Receipt_Mode', 'Cheque_number', 'Receipt_amount', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
