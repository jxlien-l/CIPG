<?php namespace App\Helpers;

use CodeIgniter\Helpers;

class Connexion extends Helpers
{
  public function __construct()
  {
    $this->session = \Config\Services::session();
    $this->user = $this->session->user;
    $data['view'] = view(self::PATH.'default');
    if(!$this->is_permitted())
    {
      $this->error = "Vous n'êtes pas connecté ou autorisé à accéder a cette ressource.";
      $data['error'] = $this->error;
      echo view('authentication', $data);
      exit;
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