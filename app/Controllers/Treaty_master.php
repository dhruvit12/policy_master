<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Treaty_master extends BaseController
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
   $M_target = new Models\Treaty_master_Model();
   $M_target->select('treaty_master.*,currency.name,perils_group.perils_group');
   $M_target->join('currency', 'currency.id = treaty_master.currency_id');
   $M_target->join('perils_group', 'perils_group.id = treaty_master.perils_group_id');
   $data['data'] = $M_target->where(['treaty_master.is_deleted'=>0])->findAll();
 //  echo "<pre>";print_r($data['data']);exit;
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_vehicle_type = new Models\PerilsGroupModel();
   $data['perils'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();
   $data['page']='Treaty_master/list';
   echo view('templete',$data);
 }
 public function add()
 {
   $M_target = new Models\Treaty_master_Model();
   $M_target->select('treaty_master.*,currency.name,perils_group.id,perils_group.perils_group');
   $M_target->join('currency', 'currency.id = treaty_master.currency_id');
   $M_target->join('perils_group', 'perils_group.id = treaty_master.perils_group_id');
   $data['data'] = $M_target->where(['treaty_master.is_deleted'=>0])->findAll();
   $M_vehicle_type = new Models\PerilsGroupModel();
   $data['perils'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();
   $data['page']='Treaty_master/Add';
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   echo view('templete',$data);
}
public function insert()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_insuranceClassInsert = new Models\Treaty_master_Model();
  $row = $M_insuranceClassInsert->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Treaty_master'));
}
public function view_client()
{
  $M_target = new Models\Treaty_master_Model();
  $M_target->select('treaty_master.*,currency.name,perils_group.perils_group');
  $M_target->join('currency', 'currency.id = treaty_master.currency_id');
  $M_target->join('perils_group', 'perils_group.id = treaty_master.perils_group_id');
  $row=$M_target->where('treaty_master.id',$_POST['id'])->first(); 

  echo json_encode($row);
}
public function delete_treaty()
{
 $M_vehicleInsuranceClassInsert = new Models\Treaty_master_Model();
        if ($M_vehicleInsuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
  return redirect()->to(site_url('Treaty_master/add'));

}
public function insurance_class_insert()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_target = new Models\Treaty_master_Model();
  $row=$M_target->insert($_POST);
  echo json_encode($row);

}
public function get_insertpaneltb()
{
  $M_target = new Models\Treaty_master_Model();
  $data = $M_target->where(['treaty_master.is_deleted'=>0])->findAll();
  $trs = '<table><tr><th>Row</th><th>company_name</th><th>treaty_type</th><th>limit_type</th><th>sum_insured_form/Premium</th><th>Percentage/Lines</th><th>Ceding Type</th><th>Allocation Mode</th>'; 
  $i=1;
  foreach ($data as $key) {
    $trs.='<tr>
    <td>'.$i++.'</td>
    <td>'.$key['company_name'].'</td>
    <td>'.$key['treaty_type'].'</td>
    <td>'.$key['limit_type'].'</td>
    <td>'.$key['sum_insured_form'].'-To-'.$key['sum_insured_to'].'</td>
    <td>'.$key['percentage'].'/'.$key['line'].'</td>
    <td>'.$key['ceding_type'].'</td>
    <td>'.$key['allocation_mode'].'</td>

    <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
    </tr>';
  }
  echo $trs;
 }
 public function get_insertpaneldata()
  {
    $M_insuranceClassInsert = new Models\Treaty_master_Model();
    $row = $M_insuranceClassInsert->where(['id'=>$_POST['id']])->first();
    echo json_encode($row);
  }
  public function edit_insurance_class_insert()
  {
    $insert=$_POST;
    $M_insuranceClassInsert = new Models\Treaty_master_Model();
    $row = $M_insuranceClassInsert->update($_POST['id'],$insert);
    print_r($M_insuranceClassInsert->getLastQuery()->getQuery());
    echo $row;
  }
  public function search()
{
  $data['search_data']=array('date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to'],'treaty_code'=>$_POST['treaty_code'],'business_type'=>$_POST['business_type']);
 $M_target = new Models\Treaty_master_Model();
 $M_target->select('treaty_master.*,currency.name,perils_group.id,perils_group.perils_group,currency.id');
 $M_target->join('currency','currency.id = treaty_master.currency_id');
 $M_target->join('perils_group','perils_group.id = treaty_master.perils_group_id');
 $M_target->like('treaty_master.start_date',$_POST['date_from']);
 $M_target->like('treaty_master.end_date',$_POST['date_to']);
 $M_target->like('treaty_master.treaty_code',$_POST['treaty_code']);
 $M_target->like('treaty_master.business_type',$_POST['business_type']);
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
    $quot=$M_target->where('treaty_master.start_date >=',$_POST['date_from'])->where('treaty_master.end_date <=',$_POST['date_to'])->where(['treaty_master.is_active'=>1,'treaty_master.is_deleted'=>0])->findAll();
  }else
  {
   $quot=$M_target->where(['treaty_master.is_active'=>1,'treaty_master.is_deleted'=>0])->findAll();
 }
 $data['data']=$quot;
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_vehicle_type = new Models\PerilsGroupModel();
 $data['perils'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();
 $data['page']='Treaty_master/list';
 echo view('templete',$data);
}
public function edit($id)
{
    $M_insuranceClassInsert = new Models\Treaty_master_Model();
    $data['data'] = $M_insuranceClassInsert->where(['id'=>$id])->first();
    $M_currency = new Models\CurrencyModel();
    $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_vehicle_type = new Models\PerilsGroupModel();
    $data['perils'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();
    $data['page']='Treaty_master/edit';
    echo view('templete',$data);
}
public function update_success($id)
{
            $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

     $M_branch = new Models\Treaty_master_Model();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Treaty_master'));
}
public function delete($id)
{
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $_POST['is_deleted']=1;
     $M_branch = new Models\Treaty_master_Model();
     $data= $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Treaty_master'));
}
}