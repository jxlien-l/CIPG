<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CreationModel extends Model
{
    protected $table = 'Creation';
    protected $primaryKey = 'id';
    //protected $returnType = 'array';
    protected $allowedFields = ['url','idGallery','isFrontPage','DateAdded'];
}

?>