<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_clauses extends BaseController
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
      $data['page']='Setup_clauses/list';
      $M_allreportstype = new Models\AllsetupclauseModel();

      $data['setup'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
     	$M_service = new Models\SetupclauseModel();
       $M_service->select('setup_clause.*,setupclausetype.type');
       $M_service->join('setupclausetype', 'setupclausetype.id = setup_clause.type','left');
      $data['data'] = $M_service->where(['setup_clause.is_deleted'=>0])->findAll();
      echo view('templete',$data);
  }
  public function insert()
  {
  $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

      $M_service = new Models\SetupclauseModel();
      $M_service->insert($_POST);
      return redirect()->to(site_url('Setup_clauses'));
  }
 public function changeStatus()
    {
        $M_allreportstype = new Models\SetupclauseModel();
          $row=$M_allreportstype->where('id',$_POST['id'])->first();
          if ($row['is_active'] == 0) {
            $trn = $M_allreportstype->where('id', $_POST['id'])->set(['is_active' => 1])->update();
          }else {
            $trn = $M_allreportstype->where('id', $_POST['id'])->set(['is_active' => 0])->update();
          }
          if ($trn) {
            echo $row['is_active'];
        }
    }
    public function view_client()
  {
      $M_quotation = new Models\SetupclauseModel();
      $row=$M_quotation->where('id',$_POST['id'])->first(); 
      echo json_encode($row);
  }
   public function edit($id)
   {
     $M_allreportstype = new Models\AllsetupclauseModel();
     $data['setup'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
     $M_quotation = new Models\SetupclauseModel();
     $data['single']=$M_quotation->where('id',$id)->first();
  //   echo "<pre>";print_r($data['setup']);print_r($data['data']);exit;
     $data['page']='Setup_clauses/edit';
     echo view('templete',$data);
   }
   public function update()
   {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
    $M_vehicle_maker = new Models\SetupclauseModel();
    $M_vehicle_maker->update($_POST['id'],$_POST);
    return redirect()->to(site_url('Setup_clauses'));
   }
   public function search()
   {
       $data['d']=$_POST['type'];
       $M_service = new Models\AllsetupclauseModel();
       $M_service->like('name',$_POST['type']);
       $M_service->like('type',$_POST['type']);
       $data['data']=$M_service->findAll();
       $M_allreportstype = new Models\AllsetupclauseModel();
       $data['setup'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
       $data['page']='Setup_clauses/list';
       echo view('templete',$data);
   }
   public function delete($id)
{
     $_POST['is_deleted']=1;
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $M_branch = new Models\SetupclauseModel();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Setup_clauses'));
}


}

?>
