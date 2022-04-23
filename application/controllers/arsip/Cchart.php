<?PHP

class Cchart extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('user')=="") 
		{
			redirect('Clogin/jrpadmin');  //kembali ke Clogin apabila session kosong
		}

		$this->load->model('jerapah/Mchart');
		$this->load->helper(array('form', 'url', 'file', 'html', 'text'));
		$this->load->library('form_validation');
	}
	
	public function index() 
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 			= $this->session->userdata('level'); //kirim session level ke Vadmin
			$data['nm_cs'] 			= $this->session->userdata('nm_cs');

			$this->load->view('jerapah/Jrp_vchart',$data);
		
		} else {
			redirect("Cguest");
		}
	}

	function get_chart_data() {
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			if (isset($_POST['start']) AND isset($_POST['end'])) {
				$start_date = $_POST['start'];
				$end_date = $_POST['end'];
				$results = $this->Mchart->get_chart_data_for_visits($start_date, $end_date);
				if ($results === NULL) {
					echo json_encode('Data Tidak Ditemukan');
				} else {
					echo json_encode($results);
				}
			} else {
				echo json_encode('Pilih Tanggal Terlebih Dahulu');
			}

		} else {
			redirect("Cguest");
		}
	}
}
?>