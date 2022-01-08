<?php namespace App\Models;

use CodeIgniter\Model;

class BlanklistuploadModel extends Model
{
	protected $table      = 'blacklistedupload';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'sid','image', 'attachment_by', 'attachment_on', 'is_acticve', 'is_deleted', 'created_at'
	];

}
