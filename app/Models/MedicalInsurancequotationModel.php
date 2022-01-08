<?php namespace App\Models;

use CodeIgniter\Model;

class MedicalInsurancequotationModel extends Model
{
	protected $table      = 'medicalInsurancequotationModel';
	protected $primaryKey = 'id';

	protected $allowedFields = [
      'id', 'quot_id', 'client_id', 'token', 'insurance_class', 'description', 'dob', 'age', 'member_add_date', 'id_type', 'id_number', 'relationship', 'gender', 'pre_existing_condition', 'sum_assured', 'Inpatient_Limit', 'Inpatient_premium', 'Outpatient_Limit', 'Outpatient_premium', 'Last_Expense_Limit', 'Last_Expense_premium', 'Personal_Accident_Limit', 'PersonalAccident_premium', 'Dental_Limit', 'Dental_premium', 'Optical_Limit', 'Optical_premium', 'Maternity_Limit', 'Total_Premium', 'extension', 'sum_insured2', 'rate', 'actual_premium', 'description2', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
