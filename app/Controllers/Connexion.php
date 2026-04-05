<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Connexion extends Controller
{
  protected $session;
  protected $user;
  protected $error;
  const PATH = 'partial_views/panel/';

  public function Galleries()
  {
    $data['title'] = 'Galleries';
    $data['view'] = view(self::PATH.'galleries');
    $this->load_view($data);
  }

  public function index()
  {
    $data['title'] = 'Accueil';
    $data['view'] = view(self::PATH.'default');
    $this->load_view($data);
  }

  private function load_view($data)
  {
    echo view('panel', $data);
  }
}

?>