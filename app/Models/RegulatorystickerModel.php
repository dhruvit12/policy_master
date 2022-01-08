<?php namespace App\Models;

use CodeIgniter\Model;

class RegulatorystickerModel extends Model
{
	protected $table      = 'Regulatory_sticker';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id', 'company_id', 'branch_id', 'date', 'insurance_type_id', 'insurance_class_id', 'sequence_from', 'sequence_to', 'last_sequence', 'last_used_date', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];
}
