<?PHP

class Cadmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user') == "") {
			redirect('Welcome');  //kembali ke Clogin apabila session kosong
		}

		$this->load->model('arsip/Madmin');
		$this->load->helper('text');
	}

	public function index()
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 				= $this->session->userdata('level'); //kirim session level ke Vadmin
			$data['nm_cs'] 				= $this->session->userdata('nm_cs');

			$this->load->view('arsip/Arsip_vadmin', $data);
		} else {
			redirect("Welcome");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nm_cs');
		redirect('Welcome');
		session_destroy();
		
	}

	public function view_chart()
	{

		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 			= $this->session->userdata('level'); //kirim session level ke Vadmin
			$data['nm_cs'] 			= $this->session->userdata('nm_cs');

			$data['tbjrp_kategori']	= $this->Madmin->tampil_kategori()->result();

			$this->load->view('Jrp_vchart', $data);
		} else {
			redirect("Welcome");
		}
	}

	// Fungsi Master User
	public function tampil_user()
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 			= $this->session->userdata('level');
			$data['nm_cs'] 			= $this->session->userdata('nm_cs');
			$data['tb_user'] 		= $this->Madmin->tampil_data_user()->result();

			$this->load->view('arsip/Arsip_vuser', $data);
		} else {
			redirect("Welcome");
		}
	}

	public function tambah_user()
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 			= $this->session->userdata('level');
			$data['nm_cs'] 			= $this->session->userdata('nm_cs');

			$nm_cs		= $this->input->post('nm_cs');
			$user 		= $this->input->post('username');
			$password 	= MD5($this->input->post('password'));
			$level 		= $this->input->post('level');
			$status 	= $this->input->post('status');

			$data1 = array(
				'nm_cs' 		=> $nm_cs,
				'user' 			=> $user,
				'pass' 			=> $password,
				'level' 		=> $level,
				'status' 		=> $status
			);

			$this->Madmin->input_data_user($data1, 'tb_user');
			echo "<script>alert('Data Berhasil Disimpan');history.go(-1);</script>";
		} else {
			redirect("Welcome");
		}
	}

	public function update_user()
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$nm_cs 		= $this->input->post('nm_cs');
			$user 		= $this->input->post('username');
			$password 	= MD5($this->input->post('password'));
			$level 		= $this->input->post('level');
			$status 	= $this->input->post('status');
			$id_user 	= $this->input->post('id_user');

			$data = array(
				'nm_cs' 		=> $nm_cs,
				'user' 			=> $user,
				'pass' 			=> $password,
				'level'			=> $level,
				'status' 		=> $status
			);

			$where = array(
				'id_user' => $id_user
			);

			$this->Madmin->update_data_user($where, $data, 'tb_user');
			echo "<script>alert('Data Berhasil Di Update');history.go(-1);</script>";
		} else {
			redirect("Welcome");
		}
	}

	public function hapus_user($id_user)
	{
		if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

			$data['level'] 			= $this->session->userdata('level');
			$data['nm_cs'] 			= $this->session->userdata('nm_cs');

			$where 					= array('id_user' => $id_user);

			$this->Madmin->hapus_data_user($where, 'tb_user');
			echo "<script>alert('Data Berhasil Dihapus');history.go(-1);</script>";
		} else {
			redirect("Welcome");
		}
	}
}
