<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class User_role extends BaseController
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
    $data['page']='user_role/list';
    // print_r($data); exit;
    $M_user_role = new Models\User_RoleModel();
    $data['user_role'] = $M_user_role->where(['is_deleted'=>0])->findAll();

		echo view('templete',$data);
  }

  public function store_user_role()
  {
      $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_user_role = new Models\User_RoleModel();
      $M_user_role->insert($_POST);
      return redirect()->to(site_url('User_Role'));
    }

  public function edit_user_role(){
    $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
    $M_user_role = new Models\User_RoleModel();
    $M_user_role->update($_POST['id'],$_POST);
    return redirect()->to(site_url('User_Role'));  
  }
  
  public function delete_user_role($id)
  {
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_user_role = new Models\User_RoleModel();
    $_POST['is_deleted']=1;
    if ($M_user_role->update($id,$_POST)) {
       return redirect()->to(site_url('User_Role'));  
    }
  }
  public function search()
  {
    $data['datas']=array('user_role'=>$_POST['user_role'],'description'=>$_POST['description']);
    $M_user_role = new Models\User_RoleModel();
    $M_user_role->like('role_type',$_POST['user_role']);
    $M_user_role->like('description',$_POST['description']);
    $data['list'] = $M_user_role->findAll();
    $data['page']='user_role/list';
    echo view('templete',$data);
   // echo "<pre>";print_r($M_user_role->getLastQuery()->getQuery());exit;
 
  }
    public function changeStatus()
    {
      $M_user_role = new Models\User_RoleModel();
        $row=$M_user_role->where('id',$_POST['id'])->first();
        if ($row['is_active'] == 0) {
          $trn = $M_user_role->where('id', $_POST['id'])->set(['is_active' => 1])->update();
        }else {
          $trn = $M_user_role->where('id', $_POST['id'])->set(['is_active' => 0])->update();
        }
        if ($trn) {
          echo $row['is_active'];
        }
    }
}

?>