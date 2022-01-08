<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Branch_maintainance extends BaseController
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
    $data['page']='branch/branch_main';
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
    return redirect()->to(site_url('branch_maintainance'));
  }

  public function edit_branch(){

    $M_branch = new Models\BranchModel();
    if (!empty($_FILES['principal_office_signature']['name'])) {
      $file = $this->request->getFile('principal_office_signature');
      $newName = $file->getRandomName();
      // echo FCPATH.'\public\uploads\branch_image'; exit;
      $file->move(FCPATH.'public\uploads\branch_image', $newName);
    }else{
      $newName = '';
    }
    $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
    $M_branch->set('principal_office_signature',$newName)->update($_POST['id']);
    return redirect()->to(site_url('branch_maintainance'));
  }

  public function delete_branch($id)
  {
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_branch = new Models\BranchModel();
    $_POST['is_deleted']=1;
    if ($M_branch->update($id, $_POST)) {
     return redirect()->to(site_url('branch'));
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
    $data['search_data']=array('branch_name'=>$_POST['branch_name'],'signature_authority'=>$_POST['signature_authority']);
    $M_branch = new Models\BranchModel();
    $M_branch->like('branch_name',$_POST['branch_name']);
    $M_branch->like('signature_authority',$_POST['signature_authority']);
    $data['branch'] = $M_branch->where(['is_deleted'=>0])->findAll();
    $data['page']='branch/branch_main';
    echo view('templete',$data);
  
  }



}

?>
