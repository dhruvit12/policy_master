<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Claim_Repository extends BaseController
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
   $M_quotation = new Models\ClientModel();

   $M_quotation->select('clients.*');
   $data['list'] = $M_quotation->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_quotation = new Models\Claimrepository_Model();
   $data['list'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Claim_Repository/list';
   echo view('templete',$data);
 }
 
 public function insert()
 {
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_borrower = new Models\Claimrepository_Model();
  $M_borrower->insert($_POST);
  return redirect()->to(site_url('Claim_Repository'));
}
public function view_client()
{
  $M_quotation = new Models\Claimrepository_Model();
  $M_quotation->select('cliam_repository.*,currency.name');
  $M_quotation->join('currency','currency.id = cliam_repository.currency_id','left');
  $row=$M_quotation->where('cliam_repository.id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function edit($id)
{
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_quotation = new Models\Claimrepository_Model();
 $data['edit']=$M_quotation->where('id',$id)->findAll();
 $data['page']='Claim_Repository/edit';
 echo view('templete',$data);
}
public function update()
{
  $session=session();
   $session->setFlashdata('update', "Successfully Record Updated");
  $M_branch = new Models\Claimrepository_Model();
  $M_branch->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Claim_Repository'));
}
public function delete($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
$_POST['is_deleted']=1;
 $M_borrower = new Models\Claimrepository_Model();
 $M_borrower->update($id,$_POST);
 return redirect()->to(site_url('Claim_Repository'));
}
public function search()
{
    $M_quotation = new Models\ClientModel();

 $M_quotation->select('clients.*');
   $data['list'] = $M_quotation->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  $data['datas']=array('insured_Name'=>$_POST['insured_Name'],
    'Cover_Note'=>$_POST['Cover_Note'],
    'Vehicle_Reg_No'=>$_POST['Vehicle_Reg_No'],
    'Chassis_No'=>$_POST['Chassis_No'],
    'Engine_No'=>$_POST['Engine_No'],
    'date_from'=>$_POST['date_from'],
    'date_to'=>$_POST['date_to']);
  $M_quotation = new Models\Claimrepository_Model();
  $M_quotation->like('insured_name',$_POST['insured_Name']);
  $M_quotation->like('cover_note',$_POST['Cover_Note']);
  $M_quotation->like('vehicle_reg_no',$_POST['Vehicle_Reg_No']);
  $M_quotation->like('chassis_no',$_POST['Chassis_No']);
  $M_quotation->like('engine_no',$_POST['Engine_No']);
  if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
    $data['list']=$M_quotation->where('date_from >=',$_POST['date_from'])->where('date_to <=',$_POST['date_to'])->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  }else
  {
   $data['list']=$M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  }

  $data['page']='Claim_Repository/list';
   echo view('templete',$data);
}

}