<?php namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'Contact';
    protected $primaryKey = 'Id';
    protected $returnType = 'array';
    protected $allowedFields = ['type','value', 'note', 'alias'];
}

?>