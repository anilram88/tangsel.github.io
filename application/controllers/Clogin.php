<?PHP

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user') == "") {
		// 	redirect('Clogin/jrpadmin');  //kembali ke Clogin apabila session kosong
		// }
	}

	public function index()
	{
		// $this->load->view('Vlogin');
		$data = array(
			'user' => $this->input->post('username', TRUE),
			'pass' => md5($this->input->post('password', TRUE))
		);

		$this->load->model('Mlogin'); // load Mlogin

		$hasil = $this->Mlogin->cek_user_arsip($data);

		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] 	= 'Sudah Loggin';
				$sess_data['id_user'] 		= $sess->id_user;
				$sess_data['user'] 			= $sess->user;
				$sess_data['nm_cs'] 		= $sess->nm_cs;
				$sess_data['level'] 		= $sess->level;

				$this->session->set_userdata($sess_data);
			}

			// if ($this->session->userdata('level')=='admin') 
			// {
			// 	echo "<script>alert('Selamat Datang Admin!');document.location='../Cadmin'</script>";

			// }
			// elseif ($this->session->userdata('level')=='user') 
			// {
			// 	// redirect('Cadmin');
			// 	echo "<script>alert('Selamat Datang User!');history.go(-1);</script>";
			// }	

			// if ($this->session->userdata('level') == 'Admin') {
				// redirect('jerapah/Cadmin');
				echo "<script>alert('Selamat Datang!');document.location='arsip/Cadmin'</script>";
			// } elseif ($this->session->userdata('level') == 'User') {
				// redirect('jerapah/Cpengaduan');
			// } 
		} else {
			echo "<script>alert('Username atau Password Salah!');history.go(-1);</script>";
		}
	}
}
