<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
class Currencymanage extends BaseController
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
   $userdata = $session->get('userdata');
   $M_currency = new Models\CurrencyModel();
   $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
   $M_currencyMaintenance->select('currency_maintenance.*,currency.name,currency.code');
   $M_currencyMaintenance->join('currency', 'currency.id = currency_maintenance.currency_id');
   $M_currencyMaintenance->where(['currency_maintenance.is_deleted'=>0]);
   $data['currency'] = $M_currencyMaintenance->findAll();

   $data['page']='currency/list';
   echo view('templete',$data);
 }

 public function currency()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $M_allcurrency = new Models\AllCurrencyModel();
  $M_allcurrency->orderby('id', 'desc');
  $data['allcurrency'] = $M_allcurrency->findAll();

  $M_currency = new Models\CurrencyModel();
  $M_currency->orderby('id', 'desc');
  $data['currency'] = $M_currency->where(['is_deleted'=>0])->findAll();
  $data['page']='currency/masterlist';
    // print_r($data); exit;
  echo view('templete',$data);
}
public function search_currency()
{
   $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $M_allcurrency = new Models\AllCurrencyModel();
  $data['allcurrency'] = $M_allcurrency->findAll();
  $search_data['search_data']=array('currency'=>$_POST['currency'],'code'=>$_POST['code']);
  $M_currency = new Models\CurrencyModel();
  $M_currency->like('name',$_POST['currency']);
  $M_currency->like('code',$_POST['code']);
  $data['currency'] = $M_currency->where(['is_deleted'=>0])->findAll();
  $data['page']='currency/masterlist';
  echo view('templete',$data); 
}
public function currencyHistory()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $M_allcurrency = new Models\CurrencyModel();
  $data['allcurrency'] = $M_allcurrency->findAll();
  $M_currencyHistory = new Models\CurrencyHistoryModel();
  $M_currencyHistory->select('currency_history.*,currency.name,currency.code');
  $M_currencyHistory->join('currency', 'currency.id = currency_history.currency_id','left');
  $M_currencyHistory->orderBy('currency_history.created_at', 'DESC');
  $data['history'] = $M_currencyHistory->findAll();

  $data['page']='currency/currency_history';
    // echo "<pre>"; print_r($data); exit;
  echo view('templete',$data);
}
public function id_pass()
{
   $M_currency = new Models\CurrencyModel();
   $M_currency->select('code');
   $data = $M_currency->where(['id'=>$_POST['id']])->first();
   print_r($data['code']);

}
public function addCurrency()
{
  $session = session();
  $userdata = $session->get('userdata');
  $M_allcurrency = new Models\AllCurrencyModel();
  $currency = $M_allcurrency->where(['id'=>$_POST['currency']])->first();
  $insert=array('name'=>$currency['name'],'code'=>$currency['code'],'masterId'=>$currency['id'],'rate'=>$_POST['rate'],'requestBy'=>$_POST['user']);
  $M_currency = new Models\CurrencyModel();
  if ($M_currency->insert($insert)) {
    $M_currencyHistory = new Models\CurrencyHistoryModel();
    $ratedata = array('new_rate' => $_POST['rate']);
    $history=array('currency_id'=>$M_currency->insertID(),'userId'=>$userdata['id'],'requestId'=>$userdata['id'],'rate_data'=>json_encode($ratedata),'is_added'=>1);
    $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
    $M_currencyHistory->insert($history);
    return redirect()->to(site_url('currencymanage/currency'));
  }
}
public function add_currency_histroy()
{
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

   $inserts=array('name'=>$_POST['name'],'code'=>$_POST['code'],'masterId'=>$_POST['userId'],'rate'=>$_POST['rate'],'requestBy'=>$_POST['userId']);
   $M_currencyHistory = new Models\CurrencyModel();
   $M_currencyHistory->insert($inserts);
   
    return redirect()->to(site_url('currencymanage/currencyHistory'));
}
public function editCurrency()
{
  $session = session();
  $userdata = $session->get('userdata');
  $M_allcurrency = new Models\AllCurrencyModel();
  $currency = $M_allcurrency->where(['id'=>$_POST['currency']])->first();
  $update=array('name'=>$currency['name'],'code'=>$currency['code'],'masterId'=>$currency['id'],'rate'=>$_POST['rate'],'requestBy'=>$_POST['user']);
    // echo $_POST['id']."<pre>"; print_r($update); exit;
  $M_currency = new Models\CurrencyModel();
  $row = $M_currency->where(['id'=>$_POST['id']])->first();
  if ($M_currency->update($_POST['id'], $update)) {
         $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
    $M_currencyHistory = new Models\CurrencyHistoryModel();
    $ratedata = array('new_rate' => $_POST['rate'], 'old_rate'=>$row['rate']);
    $history=array('currency_id'=>$_POST['id'],'userId'=>$userdata['id'],'requestId'=>$userdata['id'],'rate_data'=>json_encode($ratedata),'is_added'=>0);
      // echo "<pre>"; print_r($history); exit;
    $M_currencyHistory->insert($history);
    return redirect()->to(site_url('currencymanage/currency'));
  }
}
public function changeStatus()
{

  $M_currency = new Models\CurrencyModel();
  $row=$M_currency->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_currency->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_currency->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
      
  }
}

public function add_currency_maintenance()
{
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $_POST['status']=0;
    // echo "<pre>"; print_r($_POST); exit;
  if ($M_currencyMaintenance->insert($_POST)) {
    return redirect()->to(site_url('currencymanage'));
  }
}
public function edit_currency_maintenance()
{
    // echo $_POST['id']."<pre>"; print_r($_POST); exit;
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $_POST['status']=0;
  if ($M_currencyMaintenance->update($_POST['id'], $_POST)) {
    return redirect()->to(site_url('currencymanage'));
  }
}
public function delete_currency_maintenance()
{
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $_POST['is_deleted']=1;
  if ($M_currencyMaintenance->update($_POST['id'], $_POST)) {
    echo $_POST['id'];
  }
}

public function currency_maintenance()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $userdata = $session->get('userdata');
  $M_currency = new Models\CurrencyModel();
  $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $M_currencyMaintenance->select('currency_maintenance.*,currency.name,currency.code');
  $M_currencyMaintenance->join('currency', 'currency.id = currency_maintenance.currency_id');
  $M_currencyMaintenance->where(['currency_maintenance.status'=>0]);
  $data['currency'] = $M_currencyMaintenance->findAll();
  $data['page']='currency/currency_maintenance';
    // echo "<pre>"; print_r($data); exit;
  echo view('templete',$data);
}
public function request_approve()
{
  $session = session();
  $userdata = $session->get('userdata');
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $row = $M_currencyMaintenance->where(['id'=>$_POST['id']])->first();
  if ($M_currencyMaintenance->update($_POST['id'], ['status'=>1])) {
    $M_currency = new Models\CurrencyModel();
    $nrow = $M_currency->where(['id'=>$row['currency_id']])->first();
    $M_currency->update($row['currency_id'], ['rate'=>$row['new_rate']]);

    $M_currencyHistory = new Models\CurrencyHistoryModel();
    $ratedata = array('new_rate' => $row['new_rate'], 'old_rate'=>$nrow['rate']);
    $history=array('currency_id'=>$row['currency_id'],'userId'=>$userdata['id'],'requestId'=>$row['userId'],'rate_data'=>json_encode($ratedata),'is_added'=>0);
    $M_currencyHistory->insert($history);
      // echo "<pre>"; print_r($history); exit;
    $r['error']=0;
    $r['msg']='<div class="alert alert-success alert-dismissible fade show alert-center" role="alert">
    <strong> Request Approved Successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    echo json_encode($r);
  }
}
public function request_cancle()
{
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $_POST['status']=2;
  if ($M_currencyMaintenance->update($_POST['id'], $_POST)) {
    $r['error']=0;
    $r['msg']='<div class="alert alert-danger alert-dismissible fade show alert-center" role="alert">
    <strong>Request has been Cancled.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    echo json_encode($r);
  }
}
public function get_currency()
{
  $M_currency = new Models\CurrencyModel();
  $row = $M_currency->where(['id'=>$_POST['id']])->first();
  echo json_encode($row);
}
public function delete($id)
{ 
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_receipts = new Models\CurrencyMaintenanceModel();
      $_POST['is_deleted']=1;
    if ($M_receipts->update($id,$_POST)) {
          return redirect()->to(site_url('Currencymanage'));
      }
}
public function search()
{
  $M_currency = new Models\CurrencyModel();
  $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
  $data['search_data']=array('currency_name'=>$_POST['currency_name'],'currency_code'=>$_POST['currency_code']);
  $M_currencyMaintenance = new Models\CurrencyMaintenanceModel();
  $M_currencyMaintenance->select('currency_maintenance.*,currency.name,currency.code');
  $M_currencyMaintenance->join('currency', 'currency.id = currency_maintenance.currency_id');
  $M_currencyMaintenance->like('currency.name',$_POST['currency_name']);
  $M_currencyMaintenance->like('currency.code',$_POST['currency_code']);
  $data['currency'] = $M_currencyMaintenance->where(['currency.is_active'=>1,'currency.is_deleted'=>0])->findAll();
 // echo "<pre>";print_r($M_currencyMaintenance->getLastQuery()->getQuery());exit;
  $data['page']='currency/list';
  echo view('templete',$data);
}
public function search_currencyhistory()
{
  $data['search_data']=array('currency_name'=>$_POST['currency_name'],'currency_code'=>$_POST['currency_code'],'currency_rate'=>$_POST['currency_rate'],'date_from'=>$_POST['date_from']);
  $M_currencyHistory = new Models\CurrencyHistoryModel();
  $M_currencyHistory->select('currency_history.*,currency.name,currency.code');
  $M_currencyHistory->join('currency', 'currency.id = currency_history.currency_id','right');
  $M_currencyHistory->orderBy('currency_history.created_at', 'DESC');
  $M_currencyHistory->like('currency.name',$_POST['currency_name']);
  $M_currencyHistory->like('currency.code',$_POST['currency_code']);
  $M_currencyHistory->like('currency_history.rate_data',$_POST['currency_rate']);
  $M_currencyHistory->like('currency_history.created_at',$_POST['date_from']);
  $data['history'] = $M_currencyHistory->findAll();
  $data['page']='currency/currency_history';
  echo view('templete',$data);
}
}

?>
