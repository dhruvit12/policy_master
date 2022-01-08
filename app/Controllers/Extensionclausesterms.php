<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Extensionclausesterms extends BaseController
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
    $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
    $M_extension_clauses_terms->select('extension_clauses_terms.id,tbl_insurance_sub_type.name as insurance_type,insurance_class.name as insurance_class');
    $M_extension_clauses_terms->join('tbl_insurance_sub_type','extension_clauses_terms.insurance_type_id = tbl_insurance_sub_type.id');
    $M_extension_clauses_terms->join('insurance_class','extension_clauses_terms.insurance_class_id = insurance_class.id','left');
    $data['extension_clauses_terms'] = $M_extension_clauses_terms->where(['extension_clauses_terms.is_deleted'=>0])->findAll();
    $data['page']='extensionclausesterms/list';
    // print_r($data); exit;
    echo view('templete',$data);
  }

  public function add_extension_clauses_terms()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
    $session = session();
    if (!isset($_SESSION['userdata'])) {
      return redirect()->to(site_url('auth'));
    }
    $M_insurancetype = new Models\InsuranceTypeModel();
    $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $data['page']='extensionclausesterms/add';
    echo view('templete',$data);
  }

  public function store_extension_clauses_terms()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
    $insert=$_POST;
    $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
    if ($M_extension_clauses_terms->insert($insert)) {
      return redirect()->to(site_url('extensionclausesterms'));
    }
  }

  public function edit_extension_clauses_terms($id)
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
      return redirect()->to(site_url('auth'));
    }
    $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
    $data['row']=$M_extension_clauses_terms->where('id',$id)->first();
    $M_insurancetype = new Models\InsuranceTypeModel();
    $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $data['page']='extensionclausesterms/edit';
    echo view('templete',$data);
  }
  
  public function update_extension_clauses_terms()
  {
                       $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
    $update=$_POST;
    // echo "<pre>"; print_r($_POST); exit;
    $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
    if ($M_extension_clauses_terms->update($_POST['id'],$update)) {
      return redirect()->to(site_url('extensionclausesterms'));
    }
  }
  public function view_extension_clauses_terms($id)
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
      return redirect()->to(site_url('auth'));
    }
    $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
    $data['row']=$M_extension_clauses_terms->where('id',$id)->first();
    $M_insurancetype = new Models\InsuranceTypeModel();
    $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $data['page']='extensionclausesterms/display';
    echo view('templete',$data);
  }
  public function get_insuranceclass(){
    $M_insuranceclass = new Models\InsuranceClassModel();
    $insuranceclass = $M_insuranceclass->where(['insurance_type_id'=>$_POST['id'],'is_deleted'=>0,'is_active'=>1])->findAll();
    $option = '<option value="">Select Insurance Class</option>';
    foreach ($insuranceclass as $key) {
      $option .= '<option value="'.$key['id'].'">'.$key['name'].'</option>';
    }
    if ($insuranceclass) {
      echo $option;
    }else {
      echo "";
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
   $data['search_data']=array('insurance_class'=>$_POST['insurance_class'],'insurance_type'=>$_POST['insurance_type']);
   $M_extension_clauses_terms = new Models\ExtensionClausesTermsModel();
   $M_extension_clauses_terms->select('extension_clauses_terms.id,tbl_insurance_sub_type.name as insurance_type,insurance_class.name as insurance_class');
   $M_extension_clauses_terms->join('tbl_insurance_sub_type','extension_clauses_terms.insurance_type_id = tbl_insurance_sub_type.id');
   $M_extension_clauses_terms->join('insurance_class','extension_clauses_terms.insurance_class_id = insurance_class.id','left');
   $M_extension_clauses_terms->like('tbl_insurance_sub_type.name',$_POST['insurance_type']);
   $M_extension_clauses_terms->like('insurance_class.name',$_POST['insurance_class']);
   $data['extension_clauses_terms'] = $M_extension_clauses_terms->where(['extension_clauses_terms.is_deleted'=>0])->findAll();
   $data['page']='extensionclausesterms/list';
   echo view('templete',$data);
  }
}


?>
