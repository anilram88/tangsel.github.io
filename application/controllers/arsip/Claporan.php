<?php
//Halaman Tambah Customer Service
defined('BASEPATH') OR exit('No direct script access allowed');

class Claporan extends CI_Controller
{

    function __construct(){
        parent::__construct(); 

        if ($this->session->userdata('user')=="") 
        {
            redirect('Welcome');  //kembali ke Clogin apabila session kosong
        }

        $this->load->model('arsip/Mlaporan'); 
        $this->load->helper('url');
    }

    function index(){
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $data['level']      = $this->session->userdata('level');
            $data['nm_cs']      = $this->session->userdata('nm_cs');

            $this->load->helper('url');
            $this->load->helper('form');

            // $kd_arsip_bulan_    = $this->Mlaporan->get_list_kode_arsip_bulan();
            // $nm_cs_     = $this->Mlaporan->get_list_cs();

            // $opt = array('' => 'Semua Kode Arsip');
            // foreach ($kd_arsip_bulan_ as $kd_arsip_bulan) {
            //     $opt[$kd_arsip_bulan] = $kd_arsip_bulan;
            // }

            // $opt1 = array('' => 'Semua Customer Service');
            // foreach ($nm_cs_ as $nm_cs) {
            //     $opt1[$nm_cs] = $nm_cs;
            // }

            // $data['form_filter_kd_arsip_bulan'] = form_dropdown('',$opt,'','id="kd_arsip_bulan" class="form-control"');
            // $data['form_filter_cs'] = form_dropdown('',$opt1,'','id="nm_cs" class="form-control"');
            $this->load->view('arsip/Arsip_vlaporan', $data);

        } else {
            redirect("Welcome");
        }
    }

    function get_kode_arsip(){
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $kd_arsip   = $this->input->get('kd_arsip');
            $query      = $this->Mlaporan->get_list_kode_arsip($kd_arsip, 'kode_arsip');

            echo json_encode($query);
        } else {
            redirect("Welcome");
        }
    }

    function get_kategori(){
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $kategori   = $this->input->get('kategori_');
            $query      = $this->Mlaporan->get_list_kategori($kategori, 'kategori');

            echo json_encode($query);
        } else {
            redirect("Welcome");
        }
    }
    
    function ajax_list(){
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $list   = $this->Mlaporan->get_datatables(); 
            $data   = array();
            $no     = $_POST['start'];
            foreach ($list as $laporan) {
                $no++;
                $row    = array();
                $row[]  = $laporan->no_urut;
                $row[]  = $laporan->nik;
                $row[]  = $laporan->no_surat;
                $row[]  = date("d M Y",strtotime($laporan->tgl_surat));
                $row[]  = $laporan->nm_pemohon;
                $row[]  = $laporan->keterangan;
                $row[]  = $laporan->kategori;
                $row[]  = $laporan->kode_arsip;
                $row[]  = date("d M Y",strtotime($laporan->tgl_input));
                $row[]  = $laporan->input_by;

                $data[] = $row;
            }

            $output = array(
                            "draw"              => $_POST['draw'],
                            "recordsTotal"      => $this->Mlaporan->count_all(),
                            "recordsFiltered"   => $this->Mlaporan->count_filtered(),
                            "data"              => $data,
                    );
            //output to json format
            echo json_encode($output);

        } else {
            redirect("Welcome");
    }
    }

    function generate_pdf(){
        if (isset($_SESSION['level']) && isset($_SESSION['nm_cs'])) {

            $data['level']      = $this->session->userdata('level');
            $data['nm_cs']      = $this->session->userdata('nm_cs');
            // $this->load->view('Vlap_pengaduan', $data);

            $data['produk'] = $this->produk_model->get_produk();
                $this->load->view('jerapah/Jrp_vcetak_produk', $data);
        
        } else {
            redirect("Welcome");
        }
    }
}
?>