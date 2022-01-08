<?php namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
	protected $table      = 'clients';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
       'id', 'client_id', 'title', 'client_name', 'fk_company_id', 'account_number', 'client_type', 'entity', 'occupation', 'gender', 'idproof_type', 'id_number', 'nin', 'dob', 'nationality', 'birthplace', 'business_type', 'contact_person', 'vrn', 'tin', 'country', 'registraction_no', 'registraciondate', 'address', 'tel_no', 'mobile_number', 'email', 'preferred_system_notice', 'appointment_date', 'mandate_expiry', 'status', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
