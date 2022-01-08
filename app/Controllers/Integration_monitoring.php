<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Integration_monitoring extends BaseController
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
      $data['page']='integration_monitoring/list';

      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,capture_receipt.risk_note_no,currency.code as ccy,credit_note.is_allocated as credit_allocate,insurance_company.insurance_company,capture_receipt.total_receivable as total');
      $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
      $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $data['list'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
      $M_insurancecompany = new Models\InsuranceCompanyModel();
      $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
     
  		echo view('templete',$data);
  }
  public function search()
  {
     $data['search_data']=array('client_name'=>$_POST['client_name'],'debit_no'=>$_POST['debit_no'],'insurance_company'=>$_POST['insurance_company'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
     $M_insurancecompany = new Models\InsuranceCompanyModel();
     $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
     $M_quotation = new Models\QuotationModel();
     $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,capture_receipt.total_receivable as total,capture_receipt.risk_note_no,currency.code as ccy,credit_note.is_allocated as credit_allocate,insurance_company.insurance_company');
     $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
     $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
     $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
     $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
     $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
     $M_quotation->like('clients.client_name',$_POST['client_name']);
     $M_quotation->like('insurance_quotation.debitnoteno',$_POST['debit_no']);
     $M_quotation->like('insurance_company.insurance_company',$_POST['insurance_company']);
      if(!empty($_POST['date_from']))
      {
        $M_quotation->like('insurance_quotation.date_from',date('m/d/Y',strtotime($_POST['date_from'])));
      }
      if(!empty($_POST['date_to']))
      {
        $M_quotation->like('insurance_quotation.date_from',date('m/d/Y',strtotime($_POST['date_to'])));
      }
     $data['list'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
    // echo "<pre>";print_r($data['list']);exit;
     $data['page']='integration_monitoring/list';
     echo view('templete',$data);
  }
}

?>
