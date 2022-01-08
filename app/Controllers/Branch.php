<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Branch extends BaseController
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
    $data['page']='branch/list';
    // print_r($data); exit;
    $M_branch = new Models\BranchModel();
    $data['branch'] = $M_branch->where(['is_deleted'=>0])->findAll();

    echo view('templete',$data);
  }


  public function store_branch()
  {
  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
    $M_branch = new Models\BranchModel();
    $M_branch->insert($_POST);

    return redirect()->to(site_url('branch'));
  }

  public function edit_branch(){
     $session=session();
     $session->setFlashdata('update', "Successfully Record Updated");
    $M_branch = new Models\BranchModel();
 
    $M_branch->update($_POST['id'],$_POST);
    return redirect()->to(site_url('branch'));
  }

  public function delete_branch($id)
  {
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_branch = new Models\BranchModel();
    $_POST['is_deleted']=1;
    if ($M_branch->update($id, $_POST)) {
      return redirect()->to(site_url('branch_maintainance'));
    }
  }
  public function changeStatus()
  {
    $M_branch = new Models\BranchModel();
    $row=$M_branch->where('id',$_POST['id'])->first();
    if ($row['is_active'] == 0) {
      $trn = $M_branch->where('id', $_POST['id'])->set(['is_active' => 1])->update();
    }else {
      $trn = $M_branch->where('id', $_POST['id'])->set(['is_active' => 0])->update();
    }
    if ($trn) {
      echo $row['is_active'];
    }
  }
  public function search()
  {
    $data['datas']=array('branch_name'=>$_POST['branch_name'],'branch_code'=>$_POST['branch_code'],'status'=>$_POST['status']);
    $M_user_role = new Models\BranchModel();
    $M_user_role->like('branch_name',$_POST['branch_name']);
    $M_user_role->like('branch_code',$_POST['branch_code']);
    $M_user_role->like('status',$_POST['status']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='branch/list';
    echo view('templete',$data);
  }

}
?>
