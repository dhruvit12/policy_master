<?php namespace App\Models;

use CodeIgniter\Model;

class ClaimsDocumentsChecklistModel extends Model
{
	protected $table      = 'claims_documents_checklist';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'id', 'document_name', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];
}
