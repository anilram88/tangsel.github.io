<?php
//Halaman Tambah Customer Service
defined('BASEPATH') OR exit('No direct script access allowed');

class Carsip extends CI_Controller
{

    function __construct()
    {
        parent::__construct(); 

        if ($this->session->userdata('user')=="") 
        {
            redirect('Welcome');  //kembali ke Clogin apabila session kosong
        }

        $this->load->model('arsip/Marsip');
        $this->load->helper('url');
    }

    function index()
    {
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $data['level']          = $this->session->userdata('level');
            $data['nm_cs']          = $this->session->userdata('nm_cs');
            $data['auto']           = $this->Marsip->no_urut();
			$data['kategori']     	= $this->Marsip->get_kategori()->result();
           
            $this->load->view('arsip/Arsip_vpengaduan_add',$data);

        } else {
            redirect("Welcome");
        }	
    }

    function ajax_list()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->load->helper('url');

		$list   = $this->Marsip->get_datatables();
		$data   = array();
		$no     = $_POST['start'];
		foreach ($list as $arsip) {
			$no++;
			$row    = array();
			$row[]  = $arsip->no_urut;
			$row[]  = $arsip->nik;
			$row[]  = $arsip->no_surat;
			$row[]  = date("d M Y",strtotime($arsip->tgl_surat));
            $row[]  = $arsip->nm_pemohon;
			$row[]  = $arsip->kategori;
			$row[]  = $arsip->keterangan;
            $row[]  = $arsip->kode_arsip;
            $row[]  = date("d M Y",strtotime($arsip->tgl_input));
            $row[]  = $arsip->input_by;
			if($arsip->attachment)
				$row[] = '<a class="glyphicon glyphicon-save" href="'.base_url('uploads/'.$arsip->kode_arsip.'/'.$arsip->attachment).'" target="_blank">  Download</a>';
			else
				$row[] = '(No Attachment)';
            
			
			//add html for action
            if($_SESSION['level']=="Admin")
            {
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_media('."'".$arsip->id_arsip."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_media('."'".$arsip->id_arsip."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';	
            }
						
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Marsip->count_all(),
						"recordsFiltered" => $this->Marsip->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	    } else {
            redirect("Welcome");
        }
	}

    public function ajax_add()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->_validate();				

		// $tgl_surat  = $this->input->post('tgl_surat');
        $tgl_surat  = date("Y-m-d", strtotime($this->input->post('tgl_surat')));
        $tgl_input  = date("Y-m-d", strtotime($this->input->post('tgl_input')));

		$upload_by  = $data['nm_cs'] = $this->session->userdata('nm_cs');
		
		$data = array(
		        'no_urut'       => $this->input->post('no_urut'),
		        'nik'           => $this->input->post('nik'),
		        'no_surat'      => $this->input->post('no_surat'),
		        'tgl_surat'     => $tgl_surat,
		        'nm_pemohon'    => $this->input->post('nm_pemohon'),
				'kategori'    	=> $this->input->post('kategori'),
		        'keterangan'    => $this->input->post('keterangan'),
                'kode_arsip'    => $this->input->post('kode_arsip'),
                'tgl_input'     => $tgl_input,
                'input_by'      => $upload_by
			);

		if(!empty($_FILES['attachment']['name']))
		{
			$upload = $this->_do_upload();
			$data['attachment'] = $upload;
		}

		$insert = $this->Marsip->save($data);
		
		echo json_encode(array("status" => TRUE)); 
		
	    } else {
                redirect("Welcome");
        }
    }

    private function _validate_edit()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('no_urut') == '')
		{
			$data['inputerror'][] = 'no_urut';
			$data['error_string'][] = 'No Urut Belum Terisi';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('nik') == '')
		{
			$data['inputerror'][] = 'nik';
			$data['error_string'][] = 'NIK Belum Terisi';
			$data['status'] = FALSE;
		}
		
		// if($this->input->post('no_surat') == '')
		// {
		// 	$data['inputerror'][] = 'no_surat';
		// 	$data['error_string'][] = 'Nomor Surat Belum Terisi';
		// 	$data['status'] = FALSE;
		// }

		if($this->input->post('tgl_surat') == '')
		{
			$data['inputerror'][] = 'tgl_surat';
			$data['error_string'][] = 'Tanggal Surat Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('nm_pemohon') == '')
		{
			$data['inputerror'][] = 'nm_pemohon';
			$data['error_string'][] = 'Nama Pemohon Belum Terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('kategori') == '')
		{
			$data['inputerror'][] = 'kategori';
			$data['error_string'][] = 'Kategori Belum Dipilih';
			$data['status'] = FALSE;
		}

        if($this->input->post('keterangan') == '')
		{
			$data['inputerror'][] = 'keterangan';
			$data['error_string'][] = 'Keterangan Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('kode_arsip') == '')
		{
			$data['inputerror'][] = 'kode_arsip';
			$data['error_string'][] = 'Kode Arsip Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('tgl_input') == '')
		{
			$data['inputerror'][] = 'tgl_input';
			$data['error_string'][] = 'Tanggal Input Belum Terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		} 
		
	    } else {
                redirect("Welcome");
        }
    }

	private function _validate()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$noSurat 	= $this->input->post('no_surat');
		$sql 		= $this->db->query("SELECT no_surat FROM tbarsip where no_surat='$noSurat'");
		$ceknoSurat = $sql->num_rows();

		if ($ceknoSurat > 0) 
		{
			$data['inputerror'][] = 'no_surat';
			$data['error_string'][] = 'Nomor Surat Sudah Ada';
			$data['status'] = FALSE; 
		}

		if($this->input->post('no_urut') == '')
		{
			$data['inputerror'][] = 'no_urut';
			$data['error_string'][] = 'No Urut Belum Terisi';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('nik') == '')
		{
			$data['inputerror'][] = 'nik';
			$data['error_string'][] = 'NIK Belum Terisi';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('no_surat') == '')
		{
			$data['inputerror'][] = 'no_surat';
			$data['error_string'][] = 'Nomor Surat Belum Terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tgl_surat') == '')
		{
			$data['inputerror'][] = 'tgl_surat';
			$data['error_string'][] = 'Tanggal Surat Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('nm_pemohon') == '')
		{
			$data['inputerror'][] = 'nm_pemohon';
			$data['error_string'][] = 'Nama Pemohon Belum Terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('kategori') == '')
		{
			$data['inputerror'][] = 'kategori';
			$data['error_string'][] = 'Kategori Belum Dipilih';
			$data['status'] = FALSE;
		}

        if($this->input->post('keterangan') == '')
		{
			$data['inputerror'][] = 'keterangan';
			$data['error_string'][] = 'Keterangan Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('kode_arsip') == '')
		{
			$data['inputerror'][] = 'kode_arsip';
			$data['error_string'][] = 'Kode Arsip Belum Terisi';
			$data['status'] = FALSE;
		}

        if($this->input->post('tgl_input') == '')
		{
			$data['inputerror'][] = 'tgl_input';
			$data['error_string'][] = 'Tanggal Input Belum Terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		} 
		
	    } else {
                redirect("Welcome");
        }
    }

    private function _do_upload()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$config['upload_path']          = 'uploads/'.$this->input->post('kode_arsip');
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        $config['max_size']             = 9024; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = $this->input->post('no_urut'); //just milisecond timestamp fot unique name
        // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!is_dir('uploads/'.$this->input->post('kode_arsip'))) 
        {
            mkdir('./uploads/'.$this->input->post('kode_arsip'), 0777, TRUE);
        }

        if(!$this->upload->do_upload('attachment')) //upload and validate
        {
            $data['inputerror'][]   = 'attachment';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status']         = FALSE;
            echo json_encode($data);
            exit();
        }
        
		return $this->upload->data('file_name');
		
	    } else {
                redirect("Welcome");
        }
	}

    public function ajax_delete($id_arsip)
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		//delete file
		$download = $this->Marsip->get_by_id($id_arsip);

		if(file_exists('uploads/'.$download->kode_arsip.'/'.$download->attachment) && $download->attachment)
			unlink('uploads/'.$download->kode_arsip.'/'.$download->attachment);
		
		$this->Marsip->delete_by_id($id_arsip);
		echo json_encode(array("status" => TRUE));
		
	    } else {
                redirect("Welcome");
        }
	}

    public function ajax_edit($id_arsip)
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$data = $this->Marsip->get_by_id($id_arsip);
		echo json_encode($data);
		
	    } else {
                redirect("Welcome");
        }
	}

	public function ajax_update()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->_validate_edit();
        $tgl_surat  = date("Y-m-d", strtotime($this->input->post('tgl_surat')));

		$data = array(
            // 'no_urut'       => $this->input->post('no_urut'),
            'nik'           => $this->input->post('nik'),
            // 'no_surat'      => $this->input->post('no_surat'),
            'tgl_surat'     => $tgl_surat,
            'nm_pemohon'    => $this->input->post('nm_pemohon'),
			'kategori'    	=> $this->input->post('kategori'),
            'keterangan'    => $this->input->post('keterangan'),
            // 'kode_arsip'    => $this->input->post('kode_arsip'),
            // 'tgl_input'     => $tgl_input,
            // 'input_by'      => $upload_by
			);

		if($this->input->post('remove_attachment')) // if remove image checked
		{
			if(file_exists('uploads/'.$this->input->post('kode_arsip').'/'.$this->input->post('remove_attachment')) && $this->input->post('remove_attachment'))
				unlink('uploads/'.$this->input->post('kode_arsip').'/'.$this->input->post('remove_attachment'));
			$data['attachment'] = '';
		}

		if(!empty($_FILES['attachment']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$download = $this->Marsip->get_by_id($this->input->post('id_arsip'));
			if(file_exists('uploads/'.$download->kode_arsip.'/'.$download->attachment) && $download->attachment)
				unlink('uploads/'.$download->kode_arsip.'/'.$download->attachment);

			$data['attachment'] = $upload;
		}

		$this->Marsip->update(array('id_arsip' => $this->input->post('id_arsip')), $data);
		echo json_encode(array("status" => TRUE));
		
	    } else {
                redirect("Welcome");
        }
	}

	// TAMBAH KATEGORI
	function index_kategori()
    {
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $data['level']          = $this->session->userdata('level');
            $data['nm_cs']          = $this->session->userdata('nm_cs');

			$this->load->view('arsip/Arsip_vkategori',$data);

        } else {
            redirect("Welcome");
        }	
    }

	function ajax_list_kategori()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->load->helper('url');

		$list   = $this->Marsip->get_datatables_kategori();
		$data   = array();
		$no     = $_POST['start'];
		foreach ($list as $kategori) {
			$no++;
			$row    = array();
			$row[]  = $no++;
			$row[]  = $kategori->kategori;
			$row[]  = $kategori->status;
			$row[]  = $kategori->created_by;
            $row[]  = date("d M Y",strtotime($kategori->created_date));         
            $row[] 	= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_media('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_media('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';							
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Marsip->count_all_kategori(),
						"recordsFiltered" => $this->Marsip->count_filtered_kategori(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	    } else {
            redirect("Welcome");
        }
	}

    public function ajax_add_kategori()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->_validate_kategori();		

        $tgl_input  = date("Y-m-d");

		$upload_by  = $data['nm_cs'] = $this->session->userdata('nm_cs');
		
		$data = array(
		        'kategori'      => $this->input->post('kategori'),
		        'status'      	=> $this->input->post('status'),
		        'created_by'   	=> $upload_by,
		        'created_date' 	=> $tgl_input,
			);

		$insert = $this->Marsip->save_kategori($data);
		
		echo json_encode(array("status" => TRUE));
		
	    } else {
                redirect("Welcome");
        }
    }

    private function _validate_kategori()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kategori') == '')
		{
			$data['inputerror'][] = 'kategori';
			$data['error_string'][] = 'Kategori Belum Terisi';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('status') == '')
		{
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Status Belum Terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
		
	    } else {
                redirect("Welcome");
        }
    }

    public function ajax_delete_kategori($id_kategori)
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		
		$this->Marsip->delete_by_id_kategori($id_kategori);
		echo json_encode(array("status" => TRUE));
		
	    } else {
                redirect("Welcome");
        }
	}

    public function ajax_edit_kategori($id_kategori)
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$data = $this->Marsip->get_by_id_kategori($id_kategori);
		echo json_encode($data);
		
	    } else {
                redirect("Welcome");
        }
	}

	public function ajax_update_kategori()
	{
	    if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {
		$this->_validate_kategori();

		$data = array(
            	'kategori'      => $this->input->post('kategori'),
		        'status'      	=> $this->input->post('status')
		        // 'created_by'   	=> $this->input->post('created_by'),
		        // 'created_date' 	=> $tgl_input,
			);

		$this->Marsip->update_kategori(array('id_kategori' => $this->input->post('id_kategori')), $data);
		echo json_encode(array("status" => TRUE));
		
	    } else {
                redirect("Welcome");
        }
	}
	// END TAMBAH KATEGORI
}
