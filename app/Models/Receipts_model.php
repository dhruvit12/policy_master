<?php namespace App\Models;

use CodeIgniter\Model;

class Receipts_model extends Model
{
	protected $table      = 'receipts_insurer';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
       'id','date','client_name','branch_id','receipt','insurer_name','amount','currency','rate','ccy','pending_amount','mode','issuer_bank','cheque_number','collecting_bank','note','refrence_id','status','is_active','is_deleted','created_at','updated_at'
	];

}
