<?php namespace App\Models;

use CodeIgniter\Model;

class MedicalinsuranceclassinsertModel extends Model
{
	protected $table      = 'medical_insurance_class_insert';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'quot_id', 'insurance_class', 'description', 'dob', 'age', 'member_add_date', 'id_type', 'id_number', 'primary_member_id', 'relationship', 'gender', 'pre_existing_condition', 'sum_assured', 'Inpatient_limit', 'Inpatient_premium', 'Outpatient_limit', 'Outpatient_premium', 'personal_accident_limit', 'personal_accident_premium', 'last_expensepremium', 'last_expensepremium_limit', 'Dental_limit', 'Dental_premium', 'Optical_limit', 'Optical_premium', 'Maternity_limit', 'total_premium', 'status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
