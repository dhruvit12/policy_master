<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Non_digital_receipts extends BaseController
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
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,currency.name,insurance_quotation.status');
   $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   $data['list'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
  // echo "<pre>";print_r($data['list']);exit;
   $M_quotation = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Non_digital_receipts/list';
   echo view('templete',$data);
 }
 public function edit($id)
 {
  $M_quotation = new Models\InsuranceCompanyModel();
  $data['insurance_company'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_allcurrency = new Models\AllCurrencyModel();
  $M_currency = new Models\CurrencyModel();
  $data['currency'] = $M_currency->where(['is_deleted'=>0])->findAll();
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,currency.name,insurance_quotation.status');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
  $data['edit']=$M_quotation->where('insurance_quotation.id',$id)->first();
  $data['page']='Non_digital_receipts/edit';
  echo view('templete',$data);
}
public function edit_success()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,currency.name,insurance_quotation.status');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
  $M_quotation->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Non_digital_receipts'));
}
public function view_client()
{
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,currency.name,insurance_quotation.status');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
  $row=$M_quotation->where('insurance_quotation.id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function search()
{
  $data['search_data']=array('company_name'=>$_POST['Company_name'],'receipt_no'=>$_POST['receipt_no'],'client_name'=>$_POST['client_name'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,currency.name,insurance_quotation.status');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
  $M_quotation->like('insurance_company.insurance_company',$_POST['Company_name']);
  $M_quotation->like('clients.client_name',$_POST['client_name']);
 
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
    $data['list']=$M_quotation->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
  }else
  {
    $data['list']=$M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 }
 
  $M_quotation = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Non_digital_receipts/list';
  echo view('templete',$data);

}public function delete($id)
{
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $M_branch = new Models\QuotationModel();
     $_POST['is_deleted']=1;
     if($M_branch->update($id,$_POST)); 
      {
        return redirect()->to(site_url('Non_digital_receipts'));
      }
  }
  
}