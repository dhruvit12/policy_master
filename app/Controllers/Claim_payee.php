<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Claim_payee extends BaseController
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
   $data['page']='Claim_payee/list';
   $M_broker_details = new Models\CurrencyModel();
   $data['currency'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
   $Claim_payee = new Models\Cliam_payee_Model();
   $Claim_payee->select('claim_payee.*,');
   $Claim_payee->join('currency', 'currency.id = claim_payee.account_currency_id');
   $Claim_payee->where(['claim_payee.is_deleted'=>0]);
   $data['data'] = $Claim_payee->findAll();
   echo view('templete',$data);
 }
 public function insert()
 {
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

  $M_broker_details = new Models\Cliam_payee_Model();
  $M_broker_details->insert($_POST);
  $lastid=$M_broker_details->InsertID();
  $data=8000+$lastid;
  $M_broker_details->update($lastid,['payId'=>$data]);
  return redirect()->to(site_url('Claim_payee'));
}
public function view_client()
{
  $Claim_payee = new Models\Cliam_payee_Model();
  $Claim_payee->select('claim_payee.*,currency.name');
  $Claim_payee->join('currency','currency.id = claim_payee.account_currency_id');
  $Claim_payee->where('claim_payee.id',$_POST['id']);
  $row = $Claim_payee->first();
  echo json_encode($row);
}
public function edit($id)
{
 $Claim_payee = new Models\Cliam_payee_Model();
 $Claim_payee->select('claim_payee.*,currency.name');
 $Claim_payee->join('currency','currency.id = claim_payee.account_currency_id');
 $data['data']=$Claim_payee->where('claim_payee.id',$id)->first();
 $M_broker_details = new Models\CurrencyModel();
 $data['currency'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
 $data['page']='Claim_payee/edit';
 echo view('templete',$data);
}
public function update_data()
{
  
                   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
  $M_branch = new Models\Cliam_payee_Model();
  $M_branch->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Claim_payee'));
}
public function delete($id)
{
  $_POST['is_deleted']=1;
  $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_branch = new Models\Cliam_payee_Model();
  $M_branch->update($id,$_POST);
  return redirect()->to(site_url('Claim_payee'));
}
public function search()
{
  $M_broker_details = new Models\CurrencyModel();
  $data['currency'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
  $data['datas']=$_POST;
  $M_branch = new Models\Cliam_payee_Model();
  $M_branch->like('payee_name',$_POST['payee_name']);
  $M_branch->like('payId',$_POST['payId']);
  $M_branch->like('mobile1',$_POST['mobile1']);
  $data['data'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Claim_payee/list';
  echo view('templete',$data);
}
}

?>
