<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GalleryModel
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function get_galleries()
    {
        $galleries = array();
        $galleriesData = $this->db->table('Gallery')->get()->getResultArray();
		foreach ($galleriesData as $key)
		{
			$array = $this->get_gallery($key['Id']);
			array_push($galleries, $array);
		}
        return $galleries;
    }

    public function get_gallery($id)
    {
        //$data['gallery'] = $this->db->table('gallery')->getWhere(['id' => $id])->getRowArray();
        //$data['items'] = $this->db->table('creation')->getWhere(['IdGallery' => $id])->getResultArray();
        //$data['tags'] = $this->db->table('tag')->getWhere(['IdGallery' => $id])->getResultArray();
        return $data = array(
            'gallery' => $this->db->table('Gallery')->getWhere(['id' => $id])->getRowArray(),
            'items' => $this->db->table('Creation')->getWhere(['IdGallery' => $id])->getResultArray(),
            'tags' => $this->db->table('Tag')->getWhere(['IdGallery' => $id])->getResultArray()
        );
    }

}

?>