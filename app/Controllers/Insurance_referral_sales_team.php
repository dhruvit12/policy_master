<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\insurance_referral_sales_teams;
use App\Models;

class Insurance_referral_sales_team extends BaseController
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
   $data['page']='insurance_referral_sales_team/list';
    // print_r($data); exit;
   $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
   $data['insurance_referral_sales_team'] = $M_insurance_referral_sales_team->where(['is_deleted'=>0])->findAll();
   echo view('templete',$data);
 }

 public function store()
 {
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");

  $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
      // print_r($_POST);
      // exit;
  $M_insurance_referral_sales_team->insert($_POST);
  return redirect()->to(site_url('insurance_referral_sales_team'));
}

public function update(){
       $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
  $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
  $M_insurance_referral_sales_team->update($_POST['id'],$_POST);
  return redirect()->to(site_url('insurance_referral_sales_team'));
}
public function delete($id)
{
  $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
  $_POST['is_deleted']=1;
  if ($M_insurance_referral_sales_team->update($id, $_POST)) {
   return redirect()->to(site_url('insurance_referral_sales_team'));
 }
}
public function changeStatus()
{
  $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
  $row=$M_occupation->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_insurance_referral_sales_team->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_insurance_referral_sales_team->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
 }
 public function search()
 {
   $data['search_data']=array('member_id'=>$_POST['member_id'],'name'=>$_POST['name']);
   $M_insurance_referral_sales_team = new Models\Insurance_referral_sales_team();
   $M_insurance_referral_sales_team->like('member_id',$_POST['member_id']);
   $M_insurance_referral_sales_team->like('member_name',$_POST['name']);
   $data['insurance_referral_sales_team'] = $M_insurance_referral_sales_team->where(['is_deleted'=>0])->findAll();
   $data['page']='insurance_referral_sales_team/list';
   echo view('templete',$data);
 }
}

?>
