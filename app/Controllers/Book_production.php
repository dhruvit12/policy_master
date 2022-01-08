<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Book_production extends BaseController
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
		$M_insurancetype = new Models\Insurance_typeModel();
		$data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
		$M_product = new Models\Book_production_Model();
		$M_product->select('Book_production_request.*,insurance_type.insurance_type_name');
		$M_product->join('insurance_type','insurance_type.id = Book_production_request.insurance_type_id','left');
		$data['list'] = $M_product->where(['Book_production_request.is_deleted'=>0])->findAll();
		$data['page']='Book_production/list';
		echo view('templete',$data);
	}
	public function insert()
	{
		$M_product = new Models\Book_production_Model();
		$M_product->insert($_POST);
		return redirect()->to(site_url('Book_production'));
	}
	public function view_client()
	{
		$M_broker_details = new Models\Book_production_Model();
		$M_broker_details->select('Book_production_request.*,insurance_type.insurance_type_name');
		$M_broker_details->join('insurance_type','insurance_type.id = Book_production_request.insurance_type_id','left');
		$row=$M_broker_details->where('Book_production_request.id',$_POST['id'])->first(); 
		echo json_encode($row);
	}
	public function edit($id)
	{
		$M_broker_details = new Models\Book_production_Model();
		$M_broker_details->select('Book_production_request.*,insurance_type.insurance_type_name');
		$M_broker_details->join('insurance_type','insurance_type.id = Book_production_request.insurance_type_id','left');
		$data['data']=$M_broker_details->where('Book_production_request.id',$id)->first(); 
      //echo "<pre>";print_r($data['data']);exit;

		$M_insurancetype = new Models\Insurance_typeModel();
		$data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
		$data['page']='Book_production/edit';
		echo view('templete',$data);
	}
	public function update_success($id)
	{
		$M_branch = new Models\Book_production_Model();
		$M_branch->update($id,$_POST);
		return redirect()->to(site_url('Book_production'));
	}
	public function Search()
	{
		
		$M_broker_details = new Models\Book_production_Model();
		$M_broker_details->select('Book_production_request.*,insurance_type.insurance_type_name');
		$M_broker_details->join('insurance_type','insurance_type.id = Book_production_request.insurance_type_id','left');
		$M_broker_details->like('insurance_type.insurance_type_name',$_POST['insurancetype']);
		
		
		$data['search']=$M_broker_details->findAll();
		// print_r($M_broker_details->getLastQuery()->getQuery());exit;
		// print_r($data['search']);exit;
		$M_insurancetype = new Models\Insurance_typeModel();
		$data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
		$data['page']='Book_production/list';
		echo view('templete',$data);

	}
	public function delete($id)
	{
		$M_insuranceClassInsert = new Models\Book_production_Model();
		if($M_insuranceClassInsert->delete(['id'=>$id])){
			return redirect()->to(site_url('Book_production'));
		}
	}
}

?>
