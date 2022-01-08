<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Occupation extends BaseController
{
  public function __construct()
  	{

  	}

  public function index()
	{
      $session = session();
      if (!isset($_SESSION['userdata'])) {
  			return redirect()->to(site_url('auth'));
		}
      $data['page']='occupation/list';
      // print_r($data); exit;
      $M_occupation = new Models\OccupationModel();
      $data['occupation'] = $M_occupation->where(['is_deleted'=>0])->findAll();

  		echo view('templete',$data);
  }

  public function store_occupation()
  {
 $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");

      $M_occupation = new Models\OccupationModel();
      $M_occupation->insert($_POST);
      return redirect()->to(site_url('occupation'));
    }

    public function edit_occupation(){
      
               $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

    $M_occupation = new Models\OccupationModel();
    $M_occupation->update($_POST['id'],$_POST);
    return redirect()->to(site_url('occupation'));
  }

  public function delete_occupation($id)
  {
     $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
      $M_occupation = new Models\OccupationModel();
      $_POST['is_deleted']=1;
      if ($M_occupation->update($id, $_POST)) {
       return redirect()->to(site_url('occupation'));
    }
  }

    public function changeStatus()
    {
        $M_occupation = new Models\OccupationModel();
          $row=$M_occupation->where('id',$_POST['id'])->first();
          if ($row['is_active'] == 0) {
            $trn = $M_occupation->where('id', $_POST['id'])->set(['is_active' => 1])->update();
          }else {
            $trn = $M_occupation->where('id', $_POST['id'])->set(['is_active' => 0])->update();
          }
          if ($trn) {
            echo $row['is_active'];
        }
    }
    public function search()
    {
    $data['datas']=array('occupation'=>$_POST['occupation'],'description'=>$_POST['description']);
    $M_user_role = new Models\OccupationModel();
    $M_user_role->like('occupation',$_POST['occupation']);
    $M_user_role->like('description',$_POST['description']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='occupation/list';
    echo view('templete',$data);
    }
}

?>
