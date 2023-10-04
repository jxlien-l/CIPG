<?php namespace App\Models;
use CodeIgniter\Model;

class CreationModel extends Model
{
    protected $table = 'Creation';
    protected $primaryKey = 'id';
    //protected $returnType = 'array';
    protected $allowedFields = ['url','idGallery','isFrontPage','DateAdded'];
}

?>