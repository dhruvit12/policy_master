<?php namespace App\Models;

use CodeIgniter\Model;

class SetupparameterModel extends Model
{
	protected $table      = 'setup_parameters';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
	'id', 'Manufactureing_year', 'Registraction_year', 'TIRA_Sticker_Re-ordering_Level', 'Validate_TIRA_Stickers', 'Cover_Note_Seq_Type', 'Insurer_Force_Timestamp', 'stop_Commission_Edit_for_Broker', 'Motor_TZS', 'Motor_USD', 'Non_Motor_TZS', 'Non_Motor_USD', 'High_Risk_Motor', 'High_Risk_Class', 'High_Risk_Type', 'is_active', 'is_deleted', 'created_at'
	];

}
