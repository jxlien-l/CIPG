<?php namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\OptionsModel;
use App\Models\UserModel;
use App\Models\GalleryModel;

class Home extends BaseController
{
	const PATH = 'partial_views/public/';

	public function index()
	{
		$data = $this->load_data();

		if($data['options']['construction_mode'] == '1')
		{
			echo view('construction');
		}
		else
		{
			$this->load_views($data);
		}
	}

	public function Gallery($id)
	{
		$db = db_connect();

		$data['environment'] = $this->environment();
		$data['options'] = $this->get_options();
		//$data['session'] = \Config\Services::session();

		$model = new GalleryModel($db);
		$data_gallery = $model->get_gallery($id);

		$data['views'] = array(array(self::PATH.'gallery_detail',$data_gallery));
		$this->load_views($data);
	}

	private function load_views($data)
	{
		echo view('welcome', $data);
	}

	public function Authentication()
	{
		return view('authentication');
	}

	public function Login()
	{
		$error = null;
		$request = \Config\Services::request();
		$inputUsername = $request->getVar('inputUsername');
		$inputPassword = $request->getVar('inputPassword');
		$userModel = new UserModel();
		$verify = $userModel->where('Username', $inputUsername)->first();		
		if ($verify == null)
		{
			// retourner une erreur, l'utilisateur n'existe pas
			$error = "Le nom d'utilisateur est incorrect ou n'existe pas.";
		}
		else
		{
			if (password_verify($inputPassword, $verify['Password']))
			{
				$user = [
					'Id' => $verify['Id'],
					'Username' => $verify['Username'],
					'Role' => $verify['Role']
				];
				$session = \Config\Services::session();
				$session->set('user', $user);
				$error = null;
				$data['user'] = $session->user;
			} else
			{
				$error = "Le mot de passe est incorrect.";
			}
		}
		$data = $this->load_data();
		if ($error != null) {
			echo view('authentication', ['error' => $error]);
		} else {
			$this->load_views($data);
		}
	}

	private function load_data()
	{
		$db = db_connect();
		$data['environment'] = $this->environment();

		$data['options'] = $this->get_options();

		$data['views'] = array(array(self::PATH.'main'));

		$galleriesModel = new GalleryModel($db);
		$galleries = $galleriesModel->get_galleries();
		foreach ($galleries as $key)
		{
			array_push($data['views'], array(self::PATH.'gallery', $key));
		}

		$contacts = $this->get_contacts($data['options']['contact_id']);

		$data['session'] = \Config\Services::session();
		array_push($data['views'], array(self::PATH.'contact',array('contacts' => $contacts)));

		return $data;
	}

	private function environment()
	{
        if(ENVIRONMENT == "development")
        {
            return '<div style="background:black;color:#fff;">Attention, le site est en mode développement.</div><br>';
        }
	}

	private function if_gallery_style_needed($views)
    {
        $result = false;
        foreach ($views as $view)
        {
            if($view[0] == "partial_views/public/gallery")
            {
                $result = true;
            }
        }
        return $result;
	}
	
	private function get_options()
	{
		$model = new OptionsModel();
		return $model->get_options();
	}

	private function get_contacts($id)
	{
		$model = new ContactModel();
		return $model->where('IdUser', $id)->findAll();
	}

	private function search_name($name, $array)
	{
		foreach ($array as $key)
		{
			if ($key['Name'] == $name)
			{
				return $key['Value'];
			}
		}
		return null;
	}
}
