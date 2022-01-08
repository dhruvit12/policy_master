<?php namespace App\Models;

use CodeIgniter\Model;

class ManageClaimsInsurerModel extends Model
{
	protected $table      = 'manage_claims_insurer';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'id', 'quot_id', 'Company_name', 'Risk_Note', 'Notification', 'Claim_Date', 'Premium_Amount', 'Paid_Amount', 'Balance_Amount', 'Email', 'External_Claim', 'Company_Branch', 'Insurance_Type', 'Insurance_Class', 'Policy', 'Period_Form', 'To', 'Cover_Note', 'Sticker', 'Vehicle', 'Client_Name', 'File', 'Insured_Name', 'Date_Accident', 'Time_Accident', 'Reported_date', 'Reported_Time', 'Accident_Region', 'Place_Accident', 'Cause_Accident', 'Loss_Type', 'claimant_Name', 'Intimation_type', 'Claim_Reported_by', 'Description', 'Circumstances_of_the_accident', 'Remarks', '_Party_Insurance', 'Drivers_Name', 'Age', 'Occupation', 'Relation_to_Insured', 'Address', 'License_Number', 'Issuing_Authority', 'Class_Type', 'License_Expiry', 'Contact_Name', 'Mobile', 'Email_Id', 'Sum_Insured', 'Expected_Cliam_Amount', 'Currency', 'Release_Order', 'Excess_Amount', 'Payable_Amount', 'status', 'is_deleted', 'created_at', 'updated_at'
	];
}
