<?php namespace App\Controllers;

class Installation extends BaseController
{
    protected $db;
    protected $user;
    protected $session;

    public function index()
    {
        return view('installation');
    }

    public function Install()
    {
        if(!$this->is_installed())
        {

        }
    }

    private function is_installed()
    {

    }

    public function Secure()
    {
        $this->session = \Config\Services::session();
        $this->user = $this->session->user;
        if($this->is_permitted())
        {
            $this->db = db_connect();
            $this->db->table('Users')->where('Id', $this->user['Id'])->update(['Password' => password_hash(($this->db->table('Users')->select('Password')->where('Id', $this->user['Id'])->get()->getResultArray())[0]['Password'], PASSWORD_DEFAULT)]);
        }

    }

    private function is_permitted()
	{
		$result = false;
		if(isset($this->user))
		{
			if($this->user['Role'] == '1')
			{
				$result = true;
			}
		}
		return $result;
	}
}

?>