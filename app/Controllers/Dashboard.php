<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
class Dashboard extends BaseController
{
  public function __construct()
  {
		// start session
    // $this->checkLogin();
  }

  public function index()
  {
    $data['title']   = "Dashboard";
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branchs = new Models\Cover_note_utilization_Model();
   $data['covercount'] = $M_branchs->countAll();
   //work this code
   $M_branchs = new Models\Insurance_typeModel();

   $data['insurance'] = $M_branchs->where('is_deleted=0')->where('is_active=1')->countAllResults();
   $M_branchss = new Models\ManageClaimsInsurerModel();
   $data['claim'] = $M_branchss->where('status',0)->countAll();
   $datas = new Models\ManageClaimsInsurerModel();
   $data['claims'] = $datas->where('To > now() - INTERVAL 7 day')->findAll();
   $data['cliamseven']=count($data['claims']);
   $datas = new Models\ManageClaimsInsurerModel();
   $data['claims'] = $datas->where('To > now() - INTERVAL 90 day')->findAll();
   $data['cliamnighty']=count($data['claims']);
   $datas = new Models\ManageClaimsInsurerModel();
   $data['claims'] = $datas->where('To > now() - INTERVAL 1 month')->findAll();
   $data['cliammonth']=count($data['claims']);
    $datas = new Models\ManageClaimsInsurerModel();
   $data['claimall'] = $datas->countAll();
   $data['page']='dashboard/dashboard';
    // echo "<pre>"; print_r($data['cliamseven']); exit;
   echo view('templete',$data);
 }
 public function dashboard_print($type)
 {
  $filename = $this->create_pdf($type);
  return redirect()->to(base_url('public/pdf/dashboard/'.$filename));
}
public function create_pdf()
{
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="border: 1px solid;border-left:none;border-right:none;padding:7px;text-align: center;">
  <p style="margin: auto;font-size: 16px;font-weight:bold;">Milmar Insurance Consultants Ltd</p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;border-left:none;border-right:none;padding:7px;text-align: center;">
  <p style="margin: auto;font-size: 15px;">Expired Policies from (25-May-2021 to 25-May-2021)</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:5px;border-left:none;border-right:none;">
  <table>
  <tr>
  <td style="border: 1px solid;width:120px;text-align: center;">
  <p style="font-size: 12px;"> <b>Head Office</b> </p>
  </td>
  <td style="text-align: right;"></td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;border-left:none;border-right:none;padding:7px;">
  <p style="margin: auto;font-size: 13px;font-weight:bold;">Currency : Tanzanian Shillings</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td colspan="11" class="full" style="border: 1px solid;border-left:none;border-right:none;padding:7px;text-align: center;background:#cacad4;">
  <p style="margin: auto;font-size: 13px;font-weight:bold;">Reliance Insurance Company (Tanzania) Limited</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;border-left:none;padding:7px;">
  <p style="font-size: 12px;"> <b>Risk Note # </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>File # </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Date </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Reg # </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Insured Name </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Cover Information </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Period / Mobile # </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>SMS </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Email </b> </p>
  </td>
  <td style="border: 1px solid;padding:7px;">
  <p style="font-size: 12px;"> <b>Sum Assured </b> </p>
  </td>
  <td style="border: 1px solid;border-right:none;padding:7px;">
  <p style="font-size: 12px;"> <b>New Premium(in TZS) </b> </p>
  </td>
  </tr>';
  for ($i=0; $i < 8; $i++) {
        // code...
    $html .= '<tr>
    <td style="border: 1px solid;border-left:none;padding:7px;">
    <p style="font-size: 11px;"> 26758</p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> MAY955</p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> 25-May-2021 </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> T293CKL </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> RAJESH PRINJIVAN VITHLANI </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> T293CKL, TOYOTA, RAV 4, STATION WAGON, GOLDEN, 2000/Private-Third Party Only, ExpiryDate: 25-May-2021, File no:MAY955 </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> 26-May-2021 - to - 25-May-2022 / <br> +255713400555</p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;"> </p>
    </td>
    <td style="border: 1px solid;padding:3px;">
    <p style="font-size: 11px;">0.00 </p>
    </td>
    <td style="border: 1px solid;border-right:none;padding:3px;">
    <p style="font-size: 11px;">  118,000.00 </p>
    </td>
    </tr>';
  }
  $html .= '<tr>
  <td colspan="7" style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;">
  <p style="font-size: 12px;font-weight:bold;"> TOTAL PREMIUM : </p>
  </td>
  <td colspan="3" style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;"></td>
  <td style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;">
  <p style="font-size: 12px;font-weight:bold;"> 1,043,903.97 </p>
  </td>
  </tr>
  <tr>
  <td colspan="3" style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;">
  <p style="font-size: 12px;font-weight:bold;"> Tanzanian Shillings </p>
  </td>
  <td colspan="4" style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;">
  <p style="font-size: 12px;font-weight:bold;"> GRAND TOTAL PREMIUM : </p>
  </td>
  <td colspan="3" style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;"></td>
  <td style="border-top: 1px solid;border-bottom: 1px solid;padding:7px;text-align:right;">
  <p style="font-size: 12px;font-weight:bold;">  1,633,903.97 </p>
  </td>
  </tr></table>';
  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path','orientation' => 'L']);
  $mpdf->WriteHTML($html);
  $filename = 'DASHBOARD-'.rand(100,9999).time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/dashboard/'.$filename);
      // $mpdf->Output();
  return $filename;
}
}
