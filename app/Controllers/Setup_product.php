<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_product extends BaseController
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
       $M_insurancetypes = new Models\Setup_product_Model();
       $M_insurancetypes->select('insurance_class.name,insurance_type.insurance_type_name,Setup_product.*');
       $M_insurancetypes->join('insurance_class', 'insurance_class.id = Setup_product.insurance_class_id','left');
       $M_insurancetypes->join('insurance_type', 'insurance_type.id = Setup_product.insurance_type_id','left');
       $data['data'] = $M_insurancetypes->where(['Setup_product.is_deleted'=>0])->findAll();
       $data['page']='Setup_product/list';
       echo view('templete',$data);
  }
  public function add()
  {
       $M_insurancetype = new Models\CurrencyModel();
       $data['Currency'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
       $M_insurancetypes = new Models\SetproductlimitModel();
       $M_insurancetypes->select('currency.name,setup_product_limit.*');
       $M_insurancetypes->join('currency', 'currency.id = setup_product_limit.currency_id','left');
       $data['data'] = $M_insurancetypes->where(['setup_product_limit.is_deleted'=>0])->findAll();
       $M_broker_details = new Models\InsuranceClassModel();
       $data['insuranceclass'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
       $M_broker_detailss = new Models\Insurance_typeModel();
       $data['insurancetype'] = $M_broker_detailss->where(['is_deleted'=>0])->findAll();
       $data['page']='Setup_product/add';
       echo view('templete',$data);
  }
  public function insert()
  {
      $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_broker_details = new Models\SetproductlimitModel();
      $M_broker_details->insert($_POST); 
      return redirect()->to(site_url('Setup_product/add'));
  }
    public function view_client()
  {
      $M_quotation = new Models\SetproductlimitModel();
      $row=$M_quotation->where('id',$_POST['id'])->first(); 
      echo json_encode($row);
  }
  public function delete($id)
  {
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $_POST['is_deleted']=1;
     $M_branch = new Models\SetproductlimitModel();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Setup_product/add'));
  }
  public function allinsert()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
     $M_broker_details = new Models\Setup_product_Model();
     
      $M_broker_details->insert($_POST); 
      return redirect()->to(site_url('Setup_product/add'));
  }
  public function setup_class_insert()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
    $insert=$_POST;
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $row = $M_insuranceClassInsert->insert($insert);
    echo json_encode($row);
  }
   public function get_insertpaneltb()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $M_insuranceClassInsert->select('currency.name,setup_product_limit.*');
    $M_insuranceClassInsert->join('currency', 'currency.id = setup_product_limit.currency_id','left');
    $data =$M_insuranceClassInsert->where(['setup_product_limit.type_id'=>1])->findAll();
    $trs = '<table><tr><th>No</th><th>Description</th><th>Percent</th><th>Min.amount</th><th>Max.amount</th><th>currency</th>'; 
    $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['percent'].'</td>
      <td>'.$key['minamount'].'</td>
      <td>'.$key['maxamount'].'</td>
       <td>'.$key['name'].'</td>
      
   
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
      </td>
      </tr>';
    }
    echo $trs;
    }
     public function get_insertpaneltb1()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $M_insuranceClassInsert->select('currency.name,setup_product_limit.*');
    $M_insuranceClassInsert->join('currency', 'currency.id = setup_product_limit.currency_id','left');
    $data =$M_insuranceClassInsert->where(['setup_product_limit.type_id'=>2])->findAll();
    $trs = '<table><tr><th>No</th><th>Description</th><th>Percent</th><th>Min.amount</th><th>Max.amount</th><th>currency</th>'; 
    $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['percent'].'</td>
      <td>'.$key['minamount'].'</td>
      <td>'.$key['maxamount'].'</td>
       <td>'.$key['name'].'</td>
      
   
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel1('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel1('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
      </tr>';
    }
    echo $trs;
    }
      public function get_insertpaneltb2()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $M_insuranceClassInsert->select('currency.name,setup_product_limit.*');
    $M_insuranceClassInsert->join('currency', 'currency.id = setup_product_limit.currency_id','left');
    $data =$M_insuranceClassInsert->where(['setup_product_limit.type_id'=>3])->findAll();
    $trs = '<table><tr><th>No</th><th>Description</th><th>Percent</th><th>Min.amount</th><th>Max.amount</th><th>currency</th>'; 
    $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['percent'].'</td>
      <td>'.$key['minamount'].'</td>
      <td>'.$key['maxamount'].'</td>
       <td>'.$key['name'].'</td>
      
   
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel2('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel2('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
      </tr>';
    }
    echo $trs;
    }
     public function get_insertpaneltb3()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $M_insuranceClassInsert->select('currency.name,setup_product_limit.*');
    $M_insuranceClassInsert->join('currency', 'currency.id = setup_product_limit.currency_id','left');
    $data =$M_insuranceClassInsert->where(['setup_product_limit.type_id'=>4])->findAll();
    $trs = '<table><tr><th>No</th><th>Description</th><th>Percent</th><th>Min.amount</th><th>Max.amount</th><th>currency</th>'; 
    $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['percent'].'</td>
      <td>'.$key['minamount'].'</td>
      <td>'.$key['maxamount'].'</td>
       <td>'.$key['name'].'</td>
      
   
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel3('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel3('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
      </tr>';
    }
    echo $trs;
    }
      public function get_insertpaneltb4()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $M_insuranceClassInsert->select('currency.name,setup_product_limit.*');
    $M_insuranceClassInsert->join('currency', 'currency.id = setup_product_limit.currency_id','left');
    $data =$M_insuranceClassInsert->where(['setup_product_limit.type_id'=>5])->findAll();
    $trs = '<table><tr><th>No</th><th>Description</th><th>Percent</th><th>Min.amount</th><th>Max.amount</th><th>currency</th>'; 
    $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['percent'].'</td>
      <td>'.$key['minamount'].'</td>
      <td>'.$key['maxamount'].'</td>
       <td>'.$key['name'].'</td>
      
   
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel4('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel4('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
      </tr>';
    }
    echo $trs;
    }
  public function get_insertpaneldata()
  {
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $row = $M_insuranceClassInsert->where(['id'=>$_POST['id']])->first();
    echo json_encode($row);
  }
   public function edit_insurance_class_insert()
  {
    $insert=$_POST;
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    $row = $M_insuranceClassInsert->update($_POST['id'],$insert);
    echo $row;
  }
  public function delete_insertpanel()
  {
     $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_insuranceClassInsert = new Models\SetproductlimitModel();
    if($M_insuranceClassInsert->delete(['id' => $_POST['id']])){
      echo $_POST['id'];
    }
  }
  public function Insert_data()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_broker_details = new Models\Setup_product_Model();
      $M_broker_details->insert($_POST); 
      return redirect()->to(site_url('Setup_product'));
  }
  public function changeStatus()
    {
        $M_vehicle_type = new Models\Setup_product_Model();
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
    public function view_cliented()
  {
       $M_insurancetypes = new Models\Setup_product_Model();
       $M_insurancetypes->select('insurance_class.name,insurance_type.insurance_type_name,Setup_product.*');
       $M_insurancetypes->join('insurance_class', 'insurance_class.id = Setup_product.insurance_class_id','left');
       $M_insurancetypes->join('insurance_type', 'insurance_type.id = Setup_product.insurance_type_id','left');
      $row=$M_insurancetypes->where('Setup_product.id',$_POST['id'])->first(); 
      echo json_encode($row);
  }
  public function edit($id)
  {
       $M_insurancetypes = new Models\Setup_product_Model();
       $M_insurancetypes->select('insurance_class.name,insurance_type.insurance_type_name,Setup_product.*');
       $M_insurancetypes->join('insurance_class', 'insurance_class.id = Setup_product.insurance_class_id','left');
       $M_insurancetypes->join('insurance_type', 'insurance_type.id = Setup_product.insurance_type_id','left');
       $data['data']=$M_insurancetypes->where('Setup_product.id',$id)->first(); 
       $M_broker_details = new Models\InsuranceClassModel();
       $data['insuranceclass'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
       $M_broker_detailss = new Models\Insurance_typeModel();
       $data['insurancetype'] = $M_broker_detailss->where(['is_deleted'=>0])->findAll();
       $data['page']='Setup_product/edit';
       echo view('templete',$data);
  }
  public function update_record()
  {
      $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
     $M_occupation = new Models\Setup_product_Model();
     $M_occupation->update($_POST['id'],$_POST);
     return redirect()->to(site_url('Setup_product'));
  }
  public function deleteed($id)
  {
    $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $_POST['is_deleted']=1;
     $M_branch = new Models\Setup_product_Model();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Setup_product'));
  }
  public function fetch()
{
  $data['search_data']=array('name'=>$_POST['name']);
 $M_insurancetypes = new Models\Setup_product_Model();
 $M_insurancetypes->select('insurance_class.name,insurance_type.insurance_type_name,Setup_product.*');
 $M_insurancetypes->join('insurance_class','insurance_class.id = Setup_product.insurance_class_id','left');
 $M_insurancetypes->join('insurance_type','insurance_type.id = Setup_product.insurance_type_id','left');
 $M_insurancetypes->like('insurance_class.name',$_POST['name']);
 $M_insurancetypes->orlike('insurance_type.insurance_type_name',$_POST['name']);
 $data['data']=$M_insurancetypes->findAll();
 $data['page']='Setup_product/list';
 echo view('templete',$data);
} 
}

?>
