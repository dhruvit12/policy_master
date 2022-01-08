<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Auth extends BaseController
{

	protected $session;
	protected $config;
	public function __construct()
	{
		$session = session();
	}
	public $fromEmail;
	public $fromName;
	public $recipients;
	public $userAgent = 'CodeIgniter';
	public $protocol = 'smtp';
	public $mailPath = '/usr/sbin/sendmail';
	public $SMTPHost = 'smtp.zoho.in';
	public $SMTPUser = 'bhavik@magictechnolabs.com';
	public $SMTPPass = '0STydxPDsCBI';
	public $SMTPPort = 587;
	public $SMTPTimeout = 60;
	public $SMTPKeepAlive = false;
	public $SMTPCrypto = 'ssl';
	public $wordWrap = true;
	public $wrapChars = 76;
	public $mailType = 'html';
	public $charset = 'UTF-8';
	public $validate = false;
	public $priority = 3;
	public $CRLF = "\r\n";
	public $newline = "\r\n";
	public $BCCBatchMode = false;
	public $BCCBatchSize = 200;
	public $DSN = false;
	public function index()
	{
		$session = session();
		if (isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('dashboard'));
		}
		return view('auth/login');
	}
	public function passwordChange()
	{
		$session = session();
		if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
		$data['page']='auth/change_password';
		echo view('templete',$data);
	}
	public function forgot()
	{
		
		$data['page']='auth/forgot';
		echo view('templete',$data);
	}
	public function send_forgot()
	{
		$auth = new Models\AuthModel();
		$user = $auth->where('email',$_POST['email'])->first();
		if (is_null($user))
		{
			$session = session();
			$session->setFlashdata('error', "Invalid Email!");
			$session->setFlashdata('userid', $user['id']);
			return redirect()->to(site_url('auth/forgot'));             
		}
		else
		{
			$fourRandomDigit = mt_rand(1000,9999);
			$auth = new Models\AuthModel();
			$p=array('otp'=>$fourRandomDigit);
			$auth->update($user['id'],$p);
			$email = \Config\Services::email();

			$email->setTo($_POST['email']);
			$email->setFrom('bhavik@magictechnolabs.com', 'Contact Email');
			$email->setSubject("OTP Send!");
			$email->setMessage("Your otp is :".$fourRandomDigit);
				        // echo "<pre>";print_r($email);exit;
			if ($email->send()) {
				$session = session();
				$session->setFlashdata('error_class', "success");
				$session->setFlashdata('mailsend', 'We have Send Otp.Please check your Email_Id!');
				return redirect()->to(site_url('auth/otp_check'));
			} 
			else 
			{
				$data = $email->printDebugger(['headers']);
				$response ='Email send failed';
			}
			
		}
	}
	public function otp_check()
	{
		$data['page']='auth/otp_check';
		echo view('templete',$data);
	}
	
	public function check_password()
	{
		$auth = new Models\AuthModel();
		$user = $auth->where('otp',$_POST['password'])->first();
		if($user)
		{
			$data['page']='auth/change_password';
			echo view('templete',$data);
		}
		else
		{
			$session = session();
			$session->setFlashdata('error_class', "success");
			$session->setFlashdata('error', 'Invalid OTP!'); 
			return redirect()->to(site_url('auth/otp_check'));                   
		}
	}
	public function Confirm_password()
	{
		$session = session();
		$userdata = $session->get('userdata');
		$auth = new Models\AuthModel();
		$p=array('password'=>hash("sha256",$_POST['password']));
		$auth->update($session->getflashdata('userid'),$p);
		
		if($auth)
		{
			$session = session();
			$session->setFlashdata('error_class', "success");
			$session->setFlashdata('error', 'New password successfully Generated!'); 
			return redirect()->to(site_url('auth'));             
		}
	}
	public function changePassword()
	{
		// echo "<pre>"; print_r($_POST); exit;
		$session = session();
		$userdata = $session->get('userdata');
		$auth = new Models\AuthModel();
		if ($auth->where(['id'=>$userdata['id'],'password'=>hash ( "sha256", $_POST['current_password'])])->first()) {
			if ($_POST['new_password'] == $_POST['confirm_password']) {
				if ($auth->update($userdata['id'], ['password'=>hash ( "sha256", $_POST['confirm_password'])])) {
					$userdata['password']=hash ( "sha256", $_POST['confirm_password']);
					$session->set('userdata',$userdata);
					$session->setFlashdata('error_class', "success");
					$session->setFlashdata('error', "Confirm Password change Successfully");
					return redirect()->to(site_url('auth/passwordChange'));
				}
			}else {
				$session->setFlashdata('error_class', "warning");
				$session->setFlashdata('error', "Confirm Password not match!");
				return redirect()->to(site_url('auth/passwordChange'));
			}
		}else {
			$session->setFlashdata('error_class', "warning");
			$session->setFlashdata('error', "Invalid User Current Password!");
			return redirect()->to(site_url('auth/passwordChange'));
		}
	}

	public function verifyuser(){
		$session = session();
		$auth = new Models\AuthModel();
		$user = $auth->where(['email'=>$_POST['email'],'password'=>hash ( "sha256", $_POST['password'])])->first();
		if (is_null($user)) {
			$session->setFlashdata('error', "Invalid User!");
			return redirect()->to(site_url('auth'));
		}else {
			$M_user_role = new Models\User_RoleModel();
			$role = $M_user_role->where(['id'=>$user['fk_role_id']])->first();
			$user['role']=$role['role_type'];
			// if ($user['role'] == 'company') {
			// 	$M_insurancecompany = new Models\InsuranceCompanyModel();
		  //   $insurancecompany = $M_insurancecompany->where(['email'=>$user['email']])->first();
		  //   $user['insurancecompany_id'] = $insurancecompany['id'];
			// }
			// $user['logged_in']=TRUE;
			// echo "<pre>"; print_r($user); exit;
			// $session->set($user);
			$session->set('userdata',$user);
			// echo "<pre>"; print_r($session->get('userdata')); exit;
			return redirect()->to(site_url('dashboard'));
		}
	}

	public function logout($value='')
	{
		$session = session();
		$session->destroy();
		return redirect()->to(site_url('auth'));
	}
}
