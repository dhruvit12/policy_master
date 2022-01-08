<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Download_risk_notes extends BaseController
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
		$data['page']='Download_risk_notes/list';
		echo view('templete',$data);
	}
	public function download()
	{
		if('RiskNote'==$_POST['name']){

			$filepath = FCPATH."public\assets\pdf\FingerTips - Artifical Intelligence.pdf";
	        $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . 'public\assets\pdf\FingerTips - Artifical Intelligence.pdf']);
    // header('Content-Type: application/pdf',charset=utf-8);
				
				//$mpdf->WriteHTML($html);
				$filename = 'RISKNOTE-'.time().'.pdf';
				$mpdf->Output(FCPATH."public\assets\pdf\FingerTips - Artifical Intelligence.pdf");
				    // $mpdf->Output();
				//return redirect()->to(base_url('public/pdf/risknote/REPORT-'.$filename));
			// $filename = 'users_'.date('Ymd').'.csv'; 
			// header("Content-Description: File Transfer"); 
			// header("Content-Disposition: attachment; filename=$filename"); 
			// header("Content-Type: application/csv; ");
   //    // get data 

			// $M_quotation = new Models\QuotationModel();
			// $M_quotation->select(',branch_details.branch_name,insurance_quotation.quotation_id,insurance_quotation.created_at,insurance_quotation.insured_name,insurance_quotation.covering_details,insurance_quotation.date_from,insurance_quotation.date_to,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status');
			// $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
			// $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
			// $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
			// $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
			// $usersData = $M_quotation->where(['capture_receipt.status'=>1,'insurance_quotation.is_deleted'=>2,'insurance_quotation.is_deleted'=>0])->findAll();
   //   // file creation 
			// $file = fopen('php://output', 'w');

			// $header = array("branch_name","quotation_id","created_at","insured_name","covering_details","date_from","date_to","insurance_company","capture_receipt_status","role"); 
			// fputcsv($file, $header);
			// foreach ($usersData as $key=>$line){ 
			// 	fputcsv($file,$line); 
			// }
			// fclose($file); 
			// exit; 


//Define header information
			 //    $path=FCPATH.'public\assets\pdf';
				// //print_r($path);exit;
				// header('Content-Description: File Transfer');
				// header('Content-Type: application/octet-stream');
				// header('Content-Disposition: attachment; filename="'.$path.'\FingerTips - Artifical Intelligence.pdf'.'"');
				// header('Content-Length: ' . filesize('FingerTips - Artifical Intelligence.pdf'));
				// header('Pragma: public');

				// //Clear system output buffer
				// flush();

				// //Read the size of the file
				// readfile($path,true);

				// //Terminate from the script
				// die();
				//}
				

		}
		if('Customer_tax_invoice'==$_POST['name']){
		 // file creation 
			$filename = FCPATH.'public\assets\pdf\FingerTips - Artifical Intelligence.pdf';
		//	print_r($filename);exit; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/pdf; ");
            // get data 
			   
			   // $M_quotation = new Models\QuotationModel();
			   // $M_quotation->select('insurance_quotation.debitnoteno,insurance_quotation.id,tbl_insurance_sub_type.name as insurance_type,insurance_quotation.created_at,clients.client_name,insurance_quotation.total_receivable,currency.name as ccy');
			   // $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
			   // $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
			   // // $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
			   //  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
			   // // $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
			   // $usersData= $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
			fopen('php://output', 'w');
             
			 
		}
	}
	
}

?>
