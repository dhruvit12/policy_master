<?php namespace App\Models;

use CodeIgniter\Model;

class QuotationDocumentModel extends Model
{
	protected $table      = 'quotation_document';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'quot_id', 'attached_by', 'document_name', 'document_type', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
