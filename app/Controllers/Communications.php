<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Communications extends BaseController
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
   $M_emailSmsHistory = new Models\EmailSmsHistoryModel();
   $M_emailSmsHistory->select('email_sms_history.*,clients.client_name');
   $M_emailSmsHistory->join('clients','clients.id=email_sms_history.client_id');
   $data['list'] = $M_emailSmsHistory->where(['email_sms_history.is_active'=>1,'email_sms_history.is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['list']);exit;
   $data['page']='communications/list';
   echo view('templete',$data);
 }
 public function sms_greetings()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_client_type = new Models\Client_typeModel();
 $data['client_type'] = $M_client_type->where(['is_deleted'=>0,'is_active'=>1])->findAll();
 $data['page']='communications/sms_greetings';
 echo view('templete',$data);
}
public function email_cover_notes()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='communications/email_cover_notes';
 echo view('templete',$data);
}
public function send_sms()
{
  // echo "<pre>";print_r($_POST);exit;
  if(isset($_POST['sms']))
  {
  if(!empty($_POST['id']))
  {
    
    $M_client = new Models\ClientModel();
    $client = $M_client->where(['id'=>$_POST['id']])->first();
    $data=array('client_id'=>$_POST['id'],'mobile_no'=>$client['mobile_number'],'message'=>$_POST['message'],'mode'=>'sms');
    $sms_greetings = new Models\EmailSmsHistoryModel();
    $sms_greetings->insert($data);

  }
  else{
    $M_client_type = new Models\Client_typeModel();
     $data= $M_client_type->where(['is_deleted'=>0,'is_active'=>1])->findAll();
     foreach($data as $datas)
     {
     $client_types[]=$datas['id'];
     }
      $M_client = new Models\ClientModel();
      $client = $M_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      foreach($client as $cs)
      {
        $client_type=implode(',',$client_types);
         $data=array('client_id'=>$cs['id'],'mobile_no'=>$cs['mobile_number'],'message'=>$_POST['message'],'client_type_id'=>$client_type,'mode'=>'sms');
         $sms_greetings = new Models\EmailSmsHistoryModel();
         $sms_greetings->insert($data);
       }
  }
      $session=session();
      $session->setFlashdata('success',"SMS Successfully Send");
      return redirect()->to(site_url('communications/sms_greetings'));
  }
  else
  {
      return redirect()->to(site_url('communications/sms_greetings'));
  }
}
public function search()
{
 $data['data']=array('mode'=>$_POST['mode'],'body'=>$_POST['body'],'status'=>$_POST['status'],'description'=>$_POST['description']);
 $M_emailSmsHistory = new Models\EmailSmsHistoryModel();
 $M_emailSmsHistory->select('email_sms_history.*,clients.client_name');
 $M_emailSmsHistory->join('clients','clients.id=email_sms_history.client_id');
// $data['list'] = $M_emailSmsHistory->where(['is_active'=>1,'is_deleted'=>0])findAll();
 $M_emailSmsHistory->like('email_sms_history.mode',$_POST['mode']);
 //$M_emailSmsHistory->like('email_sms_history.email',$_POST['receiver']);
 $M_emailSmsHistory->like('email_sms_history.message',$_POST['body']);
 $M_emailSmsHistory->like('email_sms_history.status',$_POST['status']);
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
 {
  $data['list']=
    $M_emailSmsHistory->where('email_sms_history.created_at >=',$_POST['date_from'])->where('email_sms_history.created_at <=',$_POST['date_to'])->where(['email_sms_history.is_active'=>1,'email_sms_history.is_deleted'=>0])->findAll();
}else
{
 $data['list']=$M_emailSmsHistory->where(['email_sms_history.is_active'=>1,'email_sms_history.is_deleted'=>0])->findAll();
} 
$data['page']='communications/list';
echo view('templete',$data);
}
public function send_email()
 {
  if(isset($_POST['emails']))
  {
  if(!empty($_POST['insurance_company']))      
  {
     $data=array('insurance_company_id'=>$_POST['insurance_company'],'email'=>$_POST['email'],'subject'=>$_POST['subject'],'message'=>$_POST['message'],'mode'=>'email');
     $sms_greetings = new Models\EmailSmsHistoryModel();
     $sms_greetings->insert($data); 
  }     
  else
  { 
     $M_insurancecompany = new Models\InsuranceCompanyModel();
     $insurancecompany = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
     foreach($insurancecompany as $insurance)
     {
       $insurance_company[]=$insurance['id'];  
     }
     $insurance=implode(',',$insurance_company);
     $data=array('insurance_company_id'=>$insurance,'email'=>$_POST['email'],'subject'=>$_POST['subject'],'message'=>$_POST['message'],'mode'=>'email');
     $sms_greetings = new Models\EmailSmsHistoryModel();
     $sms_greetings->insert($data);
  }   
      // $email = \Config\Services::email();

      // $email->setTo($_POST['emails']);
      // $email->setFrom('bhavik@magictechnolabs.com', 'Contact Email');
      // $email->setSubject("Demo Mail!");
      // $email->setMessage("Demo mail");
      //           // echo "<pre>";print_r($email);exit;
      // if ($email->send()) {
        $session=session();
        $session->setFlashdata('success',"Email Successfully Send");
        return redirect()->to(site_url('communications/email_cover_notes'));
      // }
 }
 else
 {
  return redirect()->to(site_url('communications/email_cover_notes'));
 }
}
 
}

 ?>
