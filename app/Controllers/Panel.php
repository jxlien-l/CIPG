<?php namespace App\Controllers;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Controller;
use App\Models\OptionsModel;
use App\Models\GalleryModel;
use App\Models\ContactModel;
use App\Models\TagModel;
use Michelf\Markdown;

class Panel extends Controller
{
  protected $user;
  const PATH = 'partial_views/panel/';
  protected $db;
  protected $request;
  protected $session;

  public function __construct()
  {
    $this->db = db_connect();
    $this->request = \Config\Services::request();
    $this->session = \Config\Services::session();
    $this->user = $this->session->get('user');
    $data['views'] = [self::PATH.'default'];
    if(!$this->is_permitted($this->user))
    {
      $data['error'] = ERROR_AUTH;
      echo view('authentication', $data);
      exit;
    }
  }

  public function index()
  {
    $data['title'] = 'Accueil';
    $data['views'] = [[self::PATH.'default']];
    $data['data'] = $this->get_dashboard();
    $this->load_view($data);
  }

  private function get_dashboard()
  {
    $data['number_of_creations'] = ($this->db->table('Creation')->selectCount('Id')->get()->getResultArray())[0]['Id'];
    $data['number_of_galleries'] = ($this->db->table('Gallery')->selectCount('Id')->get()->getResultArray())[0]['Id'];
    $data['is_demo_mode'] = ($this->db->table('Options')->select('Value')->where('Name', 'demo_mode')->get()->getResultArray())[0]['Value'] == 0 ? false : true;
    $data['is_construction_mode'] = ($this->db->table('Options')->select('Value')->where('Name', 'construction_mode')->get()->getResultArray())[0]['Value'] == 0 ? false : true;
    $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
    return $data;
  }

  public function Profile()
  {
    $data['title'] = 'Profile';
    $data['views'] = [[self::PATH.'profile']];
    $data['user'] = $this->user;
    $this->load_view($data);
  }

  public function ProfileUsernameUpdate()
  {
    $data['title'] = 'Profile';
    $data['information'] = ERROR_DEMO;
    if(!DEMONSTRATION)
    {
      $username = htmlspecialchars($this->request->getVar('inputUsername'));
      try
      {
        // ATTENTION EN PROD LA MAJ !
        $this->db->table('users')->where('Id', $this->user['Id'])->update(['Username' => $username]);
        $this->user['Username'] = $username;
        $this->session->set('user', $this->user);
        $data['information'] = 'Votre nom d\'utilisateur a été modifié.';
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }
    $data['views'] = [[self::PATH.'profile']];
    $data['user'] = $this->user;
    $this->load_view($data);
  }

  public function ProfilePasswordUpdate()
  {
    $data['title'] = 'Profile';
    $data['information'] = ERROR_DEMO;
    if(!DEMONSTRATION)
    {
      $actual_password = htmlspecialchars($this->request->getVar('inputActualPwd'));
      $actual_password_db = ($this->db->table('users')->select('Password')->where('Id', $this->user['Id'])->get()->getResultArray())[0]['Password'];
      $password = htmlspecialchars($this->request->getVar('inputPwd'));
      $password_confirm = htmlspecialchars($this->request->getVar('inputConfirmPwd'));
      if(password_verify($actual_password, $actual_password_db))
      {
        if($password == $password_confirm)
        {
          try
          {
            // ATTENTION EN PROD LA MAJ !
            $this->db->table('users')->where('Id', $this->user['Id'])->update(['Password' => password_hash($password, PASSWORD_DEFAULT)]);
            //$this->user['Username'] = $username;
            //$this->session->set('user', $this->user);
            $data['information'] = 'Votre mot de passe a été modifié.';
          } catch (\Throwable $th)
          {
            $data['error'] = ERROR.$th;
          }
        }
        else
        {
          $data['error'] = ERROR.' les mots de passes ne correspondent pas.';
        }
      }
      else
      {
        $data['error'] = ERROR.' le mot de passe actuel n\'est pas le bon.';
      }
    }
    $data['views'] = [[self::PATH.'profile']];
    $data['user'] = $this->user;
    $this->load_view($data);
  }

  public function Galleries()
  {
    $data['title'] = 'Galeries';
    $data['views'] = [[self::PATH.'galleries']];
    $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
    $this->load_view($data);
  }

  public function GalleryCreate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $description = $this->request->getVar('description') ? $this->request->getVar('description') : null;
      $data_gallery = [
        'Title' => htmlspecialchars($this->request->getVar('title')),
        'Description' => htmlspecialchars($description)
      ];
      try
      {
        $this->db->table('Gallery')->insert($data_gallery);
        $data['information'] = GALLERYADDED;
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }
    $data['title'] = 'Galeries';
    $data['views'] = [[self::PATH.'galleries']];
    $data['galleries'] = (new GalleryModel($this->db))->get_galleries();

    $this->load_view($data);
  }

  public function GalleryAlbum($id)
  {
    $data['title'] = 'Galeries';
    $data['views'] = [[self::PATH.'gallery_album']];
    $data['gallery'] = (new GalleryModel($this->db))->get_gallery($id);
    $this->load_view($data);
  }

  public function GalleryAlbumAdd()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $gallery_id = $this->request->getVar('gallery_id');
      $file = $this->request->getFile('file');
      try
      {
        $random_filename = $file->getRandomName();
        $file->store('creations/'.$gallery_id, $random_filename);
        $data_file = array(
          'Url' => SERVERPATH.'writable\uploads\creations\\'.$gallery_id.'\\'.$random_filename,
          'IdGallery' => $gallery_id,
          'IsFrontPage' => $this->request->getVar('is_front_page') == 'Non' ? false : true
        );
        $this->db->table('Creation')->insert($data_file);

      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }
    $data['title'] = 'Édition de la galerie';
    $data['gallery'] = (new GalleryModel($this->db))->get_gallery($gallery_id);
    $data['views'] = [[self::PATH.'gallery_album']];
    $this->load_view($data);
  }

  public function GalleryAlbumUpdate()
  {
    $data['information'] = ERROR_DEMO;
    $delete = $this->request->getVar('delete');
    $edit = $this->request->getVar('edit');
    $id_gallery = $this->request->getVar('id_gallery');
    $data_creation = [
      'IsFrontPage' => htmlspecialchars($this->request->getVar('is_front_page'))
    ];

    if (!DEMONSTRATION)
    {
      if($delete !== null)
      {
        try
        {
          $name = $this->request->getVar('url');
          $name = explode(SERVERPATH.'writable\uploads\creations\\'.$id_gallery.'\\', $name);
          //unlink('writable/uploads/creations/'.$id_gallery.'/'.$name[1]);
          // Config LWS :
          unlink('../../public_html/writable/uploads/creations/'.$id_gallery.'/'.$name[1]);
          $this->db->table('Creation')->where('Id', $delete)->delete();
          $data['information'] = 'L\'image a bien été supprimée.';
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }
      }
      if($edit !== null)
      {
        try
        {
          $this->db->table('Creation')->where('Id', $edit)->update($data_creation);
          $data['information'] = 'L\'image a bien été modifiée.';
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }
      }
    }

    $data['title'] = 'Galeries';
    $data['views'] = [[self::PATH.'gallery_album']];
    $data['gallery'] = (new GalleryModel($this->db))->get_gallery($id_gallery);
    $this->load_view($data);
  }

  public function GalleryUpdate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $id_gallery = $this->request->getVar('id_gallery');
      $delete = $this->request->getVar('delete');
      $edit = $this->request->getVar('edit');
      $album = $this->request->getVar('album');

      if($delete !== null)
      {
        $gallery = (new GalleryModel($this->db))->get_gallery($id_gallery);

        $serverpath = SERVERPATH;
        foreach ($gallery['items'] as $item)
        {
          $fn = explode('creations/', $item['Url']);
          $url = $serverpath."/".$fn[1];
          unlink($url);
        }
        $this->db->table('Gallery')->where('Id', $id_gallery)->delete();
        $this->db->table('Creation')->where('IdGallery', $id_gallery)->delete();
        $this->db->table('Tag')->where('IdGallery', $id_gallery)->delete();
        $data['information'] = GALLERYDELETED;
        $data['views'] = [[self::PATH.'galleries']];
        $data['title'] = 'Galeries';

        $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
      }
      if($edit !== null)
      {
        $data_edit = array(
          'Title' => htmlspecialchars($this->request->getVar('title')),
          'Description' => htmlspecialchars($this->request->getVar('description'))
        );
        try
        {
          $this->db->table('Gallery')->where('Id', $id_gallery)->update($data_edit);
          $data['information'] = GALLERYUPDATED;
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }

        $data['title'] = 'Édition de la galerie';
        $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
        $data['views'] = [[self::PATH.'galleries']];

      }
    }
    $this->load_view($data);
  }

  public function TagCreate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $gallery_id = $this->request->getVar('gallery');
      $data_tag = [
        'IdGallery' => $gallery_id,
        'Name' => htmlspecialchars($this->request->getVar('tag'))
      ];
      try
      {
        $this->db->table('Tag')->insert($data_tag);
        $data['information'] = TAGADDED;
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }
    $data['title'] = 'Galeries';
    $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
    $data['views'] = [[self::PATH.'galleries']];
    $this->load_view($data);
  }

  public function TagDelete()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      try
      {
        $this->db->table('Tag')->where('Id', $this->request->getVar('tag'))->delete();
        $data['information'] = TAGDELETED;
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }
    $data['title'] = 'Galeries';
    $data['galleries'] = (new GalleryModel($this->db))->get_galleries();
    $data['views'] = [[self::PATH.'galleries']];
    $this->load_view($data);
  }

  public function Video()
  {
    $data['video'] = (new OptionsModel())->where('Name', 'youtubevideo_url')->first();
    $data['title'] = 'Gérer la vidéo';
    $data['views'] = [[self::PATH.'video', $data]];
    $this->load_view($data);
  }

  public function VideoUpdate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      if($this->request->getVar('delete') !== null)
      {
        try
        {
          $this->db->table('Options')->where('Name', 'youtubevideo_url')->delete();
          $data['information'] = VIDEODELETED;
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }
      }

      if($this->request->getVar('validate') !== null)
      {
        $url = $this->youtube_url($this->request->getVar('youtubevideo_url'));
        if($url != false)
        {
          $data_video = [
            'Name' => 'youtubevideo_url',
            'Value' => htmlspecialchars($url)
          ];

          $video_exist = $this->db->table('Options')->where('Name', 'youtubevideo_url')->get()->getResultArray();
          if($video_exist)
          {
            try
            {
              $data_video['Id'] = $video_exist[0]['Id'];
              $this->db->table('Options')->where('Id', $data_video['Id'])->update($data_video);
              $data['information'] = VIDEOUPDATED;
            } catch (\Throwable $th)
            {
              $data['error'] = ERROR.$th;
            }
          }
          else
          {
            try
            {
              $this->db->table('Options')->insert($data_video);
              $data['information'] = VIDEOADDED;
            } catch (\Throwable $th)
            {
              $data['error'] = ERROR.$th;
            }
          }
          $data['video'] = $data_video;
        }
        else
        {
          $data['error'] = ERROR_VIDEO;
        }
      }
    }

    $data['title'] = 'Vidéo';
    $data['views'] = [[self::PATH.'video']];
    $this->load_view($data);
  }

  public function Options()
  {
    $data['title'] = 'Gérer les options';
    $data['views'] = [[self::PATH.'options']];
    $data['options'] = (new OptionsModel())->get_options();
    $data['options']['site_tagline'] = Markdown::defaultTransform($data['options']['site_tagline']);
    $this->load_view($data);
  }

  public function OptionsUpdate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      try
      {
        $this->db->table('Options')->where('Name', 'site_title')->update(['Value' => htmlspecialchars($this->request->getVar('inputTitle'))]);
        $this->db->table('Options')->where('Name', 'site_description')->update(['Value' => htmlspecialchars($this->request->getVar('inputDescription'))]);
        $this->db->table('Options')->where('Name', 'site_tagline')->update(['Value' => htmlspecialchars($this->request->getVar('inputTagline'))]); // htmlspecialchars(Markdown::defaultTransform($this->request->getVar('inputTagline')))
        $this->db->table('Options')->where('Name', 'construction_mode')->update(['Value' => $this->request->getVar('inputConstruction') == "Non" ? false : true]);
        $data['information'] = OPTIONSUPDATED;
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }

    $data['views'] = [[self::PATH.'options']];
    $data['title'] = 'Options';
    $data['options'] = (new OptionsModel())->get_options();
    $this->load_view($data);
  }

  public function Contacts()
  {
    $data['title'] = 'Contacts';
    $data['views'] = [[self::PATH.'contacts']];

    $data['options'] = (new OptionsModel())->get_options();
    $data['contacts'] = $this->get_contacts($data['options']['contact_id']);
    $this->load_view($data);
  }

  public function ContactCreate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $type = $this->request->getVar('type');
      $value = empty($this->request->getVar('value')) ? null : htmlspecialchars($this->request->getVar('value'));
      $alias = empty($this->request->getVar('alias')) ? null : htmlspecialchars($this->request->getVar('alias'));
      $note = empty($this->request->getVar('note')) ? null : htmlspecialchars($this->request->getVar('note'));
      $data_contact = [
        'IdUser' => $this->user['Id'],
        'Type' => $type,
        'Value' => $value,
        'Alias' => $alias,
        'Note' => $note
      ];
      try
      {
        $this->db->table('Contact')->insert($data_contact);
        $data['information'] = CONTACTADDED;
      } catch (\Throwable $th)
      {
        $data['error'] = ERROR.$th;
      }
    }

    $data['title'] = 'Contacts';
    $data['options'] = (new OptionsModel())->get_options();
    $data['contacts'] = $this->get_contacts($data['options']['contact_id']);
    $data['views'] = [[self::PATH.'contacts']];
    $this->load_view($data);
  }

  public function ContactUpdate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $delete = $this->request->getVar('delete');
      $validate = $this->request->getVar('validate');

      $type = $this->request->getVar('type-'.$validate);
      $value = empty($this->request->getVar('value-'.$validate)) ? null : $this->request->getVar('value-'.$validate);
      $alias = empty($this->request->getVar('alias-'.$validate)) ? null : $this->request->getVar('alias-'.$validate);
      $note = empty($this->request->getVar('note-'.$validate)) ? null : $this->request->getVar('note-'.$validate);
      $data_contact = [
        'Type' => $type,
        'Value' => htmlspecialchars($value),
        'Alias' => htmlspecialchars($alias),
        'Note' => htmlspecialchars($note)
      ];

      if($delete !== null)
      {
        try
        {
          $this->db->table('Contact')->where('Id', $delete)->delete();
          $data['information'] = CONTACTDELETED;
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }
      }

      if($validate != null)
      {
        try
        {
          $this->db->table('Contact')->where('Id', $validate)->update($data_contact);
          $data['information'] = CONTACTUPDATED;
        } catch (\Throwable $th)
        {
          $data['error'] = ERROR.$th;
        }
      }
    }

    $data['title'] = 'Contacts';
    $data['options'] = (new OptionsModel())->get_options();
    $data['contacts'] = $this->get_contacts($data['options']['contact_id']);
    $data['views'] = [[self::PATH.'contacts']];
    $this->load_view($data);
  }

  public function SettingsPasswordUpdate()
  {
    $data['information'] = ERROR_DEMO;
    if (!DEMONSTRATION)
    {
      $passwordActual = $this->request->getVar('passwordActual');
      $password = $this->request->getVar('password');
      $passwordTwo = $this->request->getVar('passwordConfirm');
      if($passwordActual == password_verify())
      {
        if($password == $passwordTwo)
        {
          $pwd = password_hash($password, PASSWORD_DEFAULT);
          try
          {
            $this->db->table('Users')->where('Id', 1)->update(['Password' => $pwd]);
            $data['information'] = CONTACTUPDATED;
          } catch (\Throwable $th)
          {
            $data['error'] = ERROR.$th;
          }
        }
        else
        {
          $data['error'] = SETTINGSPWDCONFIRMFAIL;
        }
      }
      else
      {
        $data['error'] = SETTINGSPWDACTUALFAIL;
      }
    }

    $data['title'] = 'Settings';
    $data['views'] = [[self::PATH.'contacts']];
    $this->load_view($data);
  }

  private function load_view($data)
  {
    $data['session'] = \Config\Services::session();
    echo view('panel', $data);
  }

  private function is_permitted($user)
  {
    $result = false;
    if(isset($user))
    {
      if($user['Role'] == '1')
      {
        $result = true;
      }
    }
    return $result;
  }

  private function get_contacts($id)
  {
    return (new ContactModel())->where('IdUser', $id)->findAll();
  }

  private function get_tags()
  {
    return (new TagModel())->findAll();
  }

  private function youtube_url($url)
  {
    $result = $url;
    if(strlen($url) > 11)
    {
      $url = explode('=',$url);
      if($url[1] > 11)
      {
        $result = substr($url, -11);
      }
      $result = $url[1];
    }
    else
    {
      $result = false;
    }
    return $result;
  }

  private function generate_title($object, $action)
  {/*
    switch ($object) {
      case 'value':
        # code...
        break;
      
      default:
        throw new Exception('')
        break;
    }*/
  }
}

?>