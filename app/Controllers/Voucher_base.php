<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
use App\VoucherbaseModel;

class Voucher_base extends BaseController
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
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\IssuerBankModel();
    $data['banks'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();

    $M_currency = new Models\CurrencyModel();
    $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\Payment_mode();
    $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\ClientModel();
    $data['clients'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_quotation = new Models\VoucherbaseModel();
    $M_quotation->select('voucher.*,currency.code as currency,clients.client_name');
    $M_quotation->join('currency', 'currency.id = voucher.currency_id','left');
    $M_quotation->join('clients', 'clients.id = voucher.client_id','left');
    $data['list'] = $M_quotation->where(['voucher.is_actived'=>1,'voucher.is_deleted'=>0])->findAll();
   //  echo "<pre>";print_r($data['bank']);exit;
    $data['page']='Voucher_base/list';
    echo view('templete',$data);
  }
  public function insertdata()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_target = new Models\VoucherbaseModel();
      $M_target->insert($_POST);
      $last_id=$M_target->InsertID();
      $M_currency = new Models\VoucherbaseModel();
      $M_currency->update($last_id,['payment'=>$last_id]);
      return redirect()->to(site_url('Voucher_base'));
  }
  public function delete($id)
{
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     // $M_branch = new Models\VoucherbaseModel();
     // $M_branch->where('id',$id)->delete();
     // return redirect()->to(site_url('Voucher_base'));
       $_POST['is_deleted']=1;
     $M_occupation = new Models\VoucherbaseModel();
     $M_occupation->update($id,$_POST);
     return redirect()->to(site_url('Voucher_base'));  
}
public function calculate()
{
 $M_receipts = new Models\CurrencyModel();
 $row=$M_receipts->where('id',$_POST['id'])->first();
 echo json_encode($row);

}
public function view_record()
{
 $M_quotation = new Models\VoucherbaseModel();
 $M_quotation->select('voucher.*,currency.name as currency,insurance_company.insurance_company,clients.client_name,payment_mode.name as payment_type');
 $M_quotation->join('currency', 'currency.id = voucher.currency_id','left');
 $M_quotation->join('insurance_company', 'insurance_company.id = voucher.company_id','left');
 $M_quotation->join('clients', 'clients.id = voucher.client_id','left');
 $M_quotation->join('payment_mode','payment_mode.id = voucher.payment_mode');
 $row=$M_quotation->where('voucher.id',$_POST['id'])->first(); 
 echo json_encode($row);
}
public function search()
{ 
  $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\IssuerBankModel();
    $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\CurrencyModel();
    $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\Payment_mode();
    $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\ClientModel();
    $data['clients'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['search_data']=array('client_name'=>$_POST['client_name'],'status'=>$_POST['status'],'reference_no'=>$_POST['reference_no'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
    $M_quotation = new Models\VoucherbaseModel();
    $M_quotation->select('voucher.*,currency.name as currency,clients.client_name');
    $M_quotation->join('currency', 'currency.id = voucher.currency_id','left');
    $M_quotation->join('clients', 'clients.id = voucher.client_id','left');
    $M_quotation->like('clients.client_name',$_POST['client_name']);
    $M_quotation->like('voucher.status',$_POST['status']);
    $M_quotation->like('voucher.reference_id',$_POST['reference_no']);
     if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
      {
         $data['list']=$M_quotation->where('voucher.dates >=',$_POST['date_from'])->where('voucher.dates <=',$_POST['date_to'])->where(['voucher.is_actived'=>1,'voucher.is_deleted'=>0])->findAll(); 
      }else
      {
        $data['list']=$M_quotation->where(['voucher.is_actived'=>1,'voucher.is_deleted'=>0])->findAll();
      }
  //   echo "<pre>";  print_r($M_quotation->getLAstQuery()->getQuery());exit;
    // echo "<pre>";print_r($data['list']);exit;
    $data['page']='Voucher_base/list';
    echo view('templete',$data);
}
public function Edit($id)
{
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\IssuerBankModel();
    $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\CurrencyModel();
    $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\Payment_mode();
    $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_currency = new Models\ClientModel();
    $data['clients'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_quotation = new Models\VoucherbaseModel();
 $M_quotation->select('voucher.*,currency.name as currency');
 $M_quotation->join('currency', 'currency.id = voucher.currency_id','left');
 $M_quotation->join('clients', 'clients.id = voucher.client_id','left');
 $data['edit']=$M_quotation->where('voucher.id',$id)->first(); 
 //echo "<pre>";print_r($data['edit']);exit;
 $data['page']='Voucher_base/edit';
 echo view('templete',$data);
}
public function Update_sucess()
{
   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

     $M_occupation = new Models\VoucherbaseModel();
     $M_occupation->update($_POST['id'],$_POST);
     return redirect()->to(site_url('Voucher_base'));  
}
}
