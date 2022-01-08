<?php namespace App\Models;

use CodeIgniter\Model;

class RisknoteInsurerDocumentModel extends Model
{
	protected $table      = 'risknote_insurer_document';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'document_name', 'upload_by', 'quot_id', 'created_at'
	];

}
