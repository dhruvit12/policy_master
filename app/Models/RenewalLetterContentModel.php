<?php namespace App\Models;
use CodeIgniter\Model;

class RenewalLetterContentModel extends Model
{
    protected $table = 'renewal_letter_content';

    protected $allowedFields = ['body_content','footer_content','is_active','is_deleted',];
}
