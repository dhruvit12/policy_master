<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_product_clause extends BaseController
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
      $M_broker_details = new Models\InsuranceClassModel();
      $data['insuranceclass'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
      $M_broker_detailss = new Models\Insurance_typeModel();
      $data['insurancetype'] = $M_broker_detailss->where(['is_deleted'=>0])->findAll();
      $M_broker_detailsss = new Models\CurrencyModel();
      $data['currency'] = $M_broker_detailsss->where(['is_deleted'=>0])->findAll();
      $M_branch = new Models\Setup_product_clauseModel();
      $M_branch->select('setup_product_clause.*,insurance_type.insurance_type_name,insurance_class.name');
      $M_branch->join('insurance_type','insurance_type.id = setup_product_clause.insurance_type_id','left');
      $M_branch->join('insurance_class','insurance_class.id = setup_product_clause.insurance_class_id','left');
      $data['data'] = $M_branch->where(['setup_product_clause.is_deleted'=>0])->findAll();
      $data['page']='Setup_product_clauses/list';
     	echo view('templete',$data);
  }
  public function insert()
  {
      $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_branch = new Models\Setup_product_clauseModel();
      $M_branch->insert($_POST);
      return redirect()->to(site_url('Setup_product_clause'));
  }
  public function changeStatus()
  {
    $M_vehicle_type = new Models\Setup_product_clauseModel();
    $row=$M_vehicle_type->where('id',$_POST['id'])->first();
    if ($row['is_active'] == 0) {
      $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
    }else {
      $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
    }
    if ($trn) {
      echo $row['is_active'];
    }
  }
  public function search()
{
 $data['search_data']=array('insurance_type'=>$_POST['insurance_type'],'insurance_class'=>$_POST['insurance_class']);
  $M_branch = new Models\Setup_product_clauseModel();
  $M_branch->select('setup_product_clause.*,insurance_type.insurance_type_name,insurance_class.name');
  $M_branch->join('insurance_type','insurance_type.id = setup_product_clause.insurance_type_id','left');
  $M_branch->join('insurance_class','insurance_class.id = setup_product_clause.insurance_class_id','left');
  $M_branch->like('insurance_type.insurance_type_name',$_POST['insurance_type']);
  $M_branch->orlike('insurance_class.name',$_POST['insurance_class']);
  $data['data']=$M_branch->findAll();
  $M_broker_details = new Models\InsuranceClassModel();
  $data['insuranceclass'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
  $M_broker_detailss = new Models\Insurance_typeModel();
  $data['insurancetype'] = $M_broker_detailss->where(['is_deleted'=>0])->findAll();
  $M_broker_detailsss = new Models\CurrencyModel();
  $data['currency'] = $M_broker_detailsss->where(['is_deleted'=>0])->findAll();
  $data['page']='Setup_product_clauses/list';
  echo view('templete',$data);
}

}

?>
