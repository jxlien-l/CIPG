<?php namespace App\Models;

use CodeIgniter\Model;

class OptionsModel extends Model
{
    protected $table = 'Options';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name','value'];

    public function get_options()
    {
        $options = new OptionsModel();
        $options = $options->findAll();
        foreach ($options as $key)
		{
			$array[$key['Name']] = $key['Value'];
			$data = $array;
        }
        return $data;
    }
}

?>