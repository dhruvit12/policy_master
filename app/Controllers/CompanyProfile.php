<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class CompanyProfile extends BaseController
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
   //$data['page']='company/profile';
      // print_r($data); exit;
   $M_company = new Models\InsuranceCompanyModel();
   $data['key'] = $M_company->where(['is_active'=>1,'is_deleted'=>0])->first();
   $data['page']='company/profile';   
   echo view('templete',$data);
 }

 
 public function renewal_letter_content()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }


  $M_renewal_letter_content = new Models\RenewalLetterContentModel();
  $data['renewal_letter_content'] = $M_renewal_letter_content->where(['id'=>1])->first();
  $data['page']='company/renewal_letter_content';
  echo view('templete',$data);
}
public function update_renewal_letter_content()
{
    // echo "<pre>"; print_r($_POST); exit;
  $M_renewal_letter_content = new Models\RenewalLetterContentModel();
  if($M_renewal_letter_content->update(1,$_POST)){
    return redirect()->to(site_url('companyprofile/renewal_letter_content'));
  }
}
public function update()
{
  $M_borrower = new Models\InsuranceCompanyModel();
  $M_borrower->update($_POST['id'],$_POST);
  return redirect()->to(site_url('CompanyProfile'));
  
}
}
