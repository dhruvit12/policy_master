<?php namespace App\Controllers;

class Brokercommission extends BaseController
{
  public function __construct()
  {
    // $this->checkLogin();
  }

  public function index()
  {
    $data['page']='brokercommission/list';
    echo view('templete',$data);
  }
  
  public function add_brokercommission()
  {
    $data['page']='brokercommission/add';
    echo view('templete',$data);
  }

  public function edit_brokercommission()
  {
    $data['page']='brokercommission/edit';
    echo view('templete',$data);
  }
  
  public function individual_insurer()
  {
    $data['page']='brokercommission/individual_insurer';
    echo view('templete',$data);
  }
  
  public function checkLogin()
  {
    if (!$session->has('userdata')) {
      return redirect(base_url('auth'));;
    }
  }
}
