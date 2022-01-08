<?php namespace App\Models;

use CodeIgniter\Model;

class DirectPaymentDocumentModel extends Model
{
	protected $table      = 'direct_payment_document';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	protected $allowedFields = [
        'id', 'directpay_id', 'document_name', 'attached_by', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
