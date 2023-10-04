<?php namespace App\Models;
use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table = 'Tag';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['Name'];
}

?>