<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Delayed_tax_invoice extends BaseController
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
	   $invoice = new Models\QuotationModel();
	   $invoice->select('insurance_quotation.*,currency.name as ccy,clients.client_name,tbl_insurance_sub_type.name,insurance_company.insurance_company');
	   $invoice->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
	   $invoice->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
	   $invoice->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
	   $invoice->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
	   $data['list'] = $invoice->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0,'insurance_quotation.tax_invoice_status'=>0])->findAll();
	   $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurance_company'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
	   $data['page']='Delayed_tax_invoice/delaytaxinvoice';
	   echo view('templete',$data);
	}
	public function search()
	{
		$data['datas']=array('client_name'=>$_POST['client_name'],
			                 'debitnoteno'=>$_POST['debit_no'],
			                 'insurance_company'=>$_POST['insurance_company'],
			                 'created_at'=>$_POST['date_from'],
			                 'date_to'=>$_POST['date_to']);
		//echo "<pre>";print_r($data['datas']);exit;
		$invoice = new Models\QuotationModel();
	   $invoice->select('insurance_quotation.*,currency.name as ccy,clients.client_name,tbl_insurance_sub_type.name,insurance_company.insurance_company');
	   $invoice->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
	   $invoice->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
	   $invoice->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
	   $invoice->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
	   $invoice->like('clients.client_name',$_POST['client_name']);
	   $invoice->like('insurance_quotation.debitnoteno',$_POST['debit_no']);
	   $invoice->like('insurance_company.insurance_company',$_POST['insurance_company']);
	  if (!empty($_POST['created_at']) && !empty($_POST['created_at'])) {
            $data['list'] = $invoice->where('insurance_quotation.created_at >=', $_POST['created_at'])->where('insurance_quotation.created_at <=', $_POST['created_at'])->where(['insurance_quotation.is_active' => 1, 'insurance_quotation.is_deleted' => 0,'insurance_quotation.tax_invoice_status'=>0])->findAll();
        } else {
            $data['list'] = $invoice->where(['insurance_quotation.is_active' => 1, 'insurance_quotation.is_deleted' => 0,'insurance_quotation.tax_invoice_status'=>0])->findAll();
        }

	   
	  // $data['list'] = $invoice->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
       

	   $M_insurancecompany       = new Models\InsuranceCompanyModel();
       $data['insurance_company'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
	   $data['page']='Delayed_tax_invoice/delaytaxinvoice';
	   echo view('templete',$data);
	}

	
}

?>
