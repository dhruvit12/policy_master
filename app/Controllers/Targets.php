<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Targets extends BaseController
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
    $data['page']='targets/list';
    $M_branch = new Models\BranchModel();
    $data['branch'] = $M_branch->where(['is_deleted'=>0])->findAll();
    $M_broker_details = new Models\Broker_DetailsModel();
    $data['broker_details'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
    $M_product = new Models\Product_Model();
    $data['product'] = $M_product->where(['is_deleted'=>0])->findAll();
    $M_currency = new Models\CurrencyModel();
    $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_target = new Models\TargetModel();
    $M_target->select('target_details.*,branch_details.branch_name,broker_details.company_name,product.product,currency.code as currency_code');
    $M_target->join('branch_details', 'branch_details.id = target_details.fk_branch_id','left');
    $M_target->join('broker_details', 'broker_details.id = target_details.fk_company_id','left');
    $M_target->join('product', 'product.id = target_details.fk_product_id','left');
    $M_target->join('currency', 'currency.id = target_details.fk_currency_id','left');
    $data['targets'] = $M_target->where(['target_details.is_deleted'=>0])->findAll();
  
  // $data['targets'] = [];
	 // echo "<pre>"; print_r($data['targets']); exit;
    echo view('templete',$data);
  }

  public function store_target()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

    $M_target = new Models\TargetModel();
    $M_target->insert($_POST);
    return redirect()->to(site_url('targets'));
  }

  public function edit_target(){
      $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

    $M_target = new Models\TargetModel();
    $M_target->update($_POST['id'],$_POST);
    return redirect()->to(site_url('targets'));
  }

  public function delete_targets($id)
  {
		$session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_target = new Models\TargetModel();
    $_POST['is_deleted']=1;
    if ($M_target->update($id, $_POST)) {
       return redirect()->to(site_url('targets'));
    }
  }

  public function changeStatus()
  {
    $M_target = new Models\TargetModel();
    $row=$M_target->where('id',$_POST['id'])->first();
    if ($row['is_active'] == 0) {
      $trn = $M_target->where('id', $_POST['id'])->set(['is_active' => 1])->update();
    }else {
      $trn = $M_target->where('id', $_POST['id'])->set(['is_active' => 0])->update();
    }
    if ($trn) {
      echo $row['is_active'];
    }
  }
  public function view_client()
  {
   $M_target = new Models\TargetModel();
   $M_target->select('target_details.*,branch_details.branch_name,broker_details.company_name,product.product,currency.code as currency_code');
   $M_target->join('branch_details', 'branch_details.id = target_details.fk_branch_id','left');
   $M_target->join('broker_details', 'broker_details.id = target_details.fk_company_id','left');
   $M_target->join('product', 'product.id = target_details.fk_product_id','left');
   $M_target->join('currency', 'currency.id = target_details.fk_currency_id','left');
   $row = $M_target->where(['target_details.is_deleted'=>0,'target_details.id'=>$_POST['id']])->first();
   echo json_encode($row);
 }
 public function search()
 {
    $M_branch = new Models\BranchModel();
    $data['branch'] = $M_branch->where(['is_deleted'=>0])->findAll();
    $M_broker_details = new Models\Broker_DetailsModel();
    $data['broker_details'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
    $M_product = new Models\Product_Model();
    $data['product'] = $M_product->where(['is_deleted'=>0])->findAll();
    //echo "<pre>";print_r($data['product']);exit;
    $M_currency = new Models\CurrencyModel();
    $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
    $data['search_data']=array('branch_name'=>$_POST['branch_name'],'product'=>$_POST['product'],'year'=>$_POST['year']);
    //  ECHO "<PRE>";print_r($data['branch']);
    // echo "<pre>";print_r($data['search_data']);exit;
    $M_target = new Models\TargetModel();
    $M_target->select('target_details.*,branch_details.branch_name,broker_details.company_name,product.product,currency.code as currency_code');
    $M_target->join('branch_details', 'branch_details.id = target_details.fk_branch_id','left');
    $M_target->join('broker_details', 'broker_details.id = target_details.fk_company_id','left');
    $M_target->join('product', 'product.id = target_details.fk_product_id','left');
    $M_target->join('currency', 'currency.id = target_details.fk_currency_id','left');
    $M_target->like('branch_details.branch_name',$_POST['branch_name']);
    $M_target->like('product.product',$_POST['product']);
    $M_target->like('target_details.year',$_POST['year']);
    $data['targets'] = $M_target->where(['target_details.is_deleted'=>0])->findAll();
   // print_r($M_target->getLastQuery()->getQuery());exit;
    $data['page']='targets/list';
    echo view('templete',$data);
 }
}
?>
