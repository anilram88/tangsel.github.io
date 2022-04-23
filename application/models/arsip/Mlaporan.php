<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model
{
    
    var $table = 'tbarsip';
    var $column_order = array('no_urut','nik','no_surat','nm_pemohon','keterangan','kode_arsip','input_by'); 
    var $column_search = array('no_urut','nik','no_surat','nm_pemohon','keterangan','kode_arsip','input_by'); 
    var $order = array('no_urut' => 'DESC');

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function _get_datatables_query()
    {
        //custom filter
        if($this->input->post('nm_pemohon'))
        {
            $this->db->where('nm_pemohon', $this->input->post('nm_pemohon'));
        }
        if($this->input->post('nik'))
        {
            $this->db->like('nik', $this->input->post('nik'));
        }
        if($this->input->post('no_surat'))
        {
            $this->db->like('no_surat', $this->input->post('no_surat'));
        }
        if($this->input->post('kategori'))
        {
            $this->db->like('kategori', $this->input->post('kategori'));
        }
        if($this->input->post('kode_arsip'))
        {
            $this->db->like('kode_arsip', $this->input->post('kode_arsip'));
        }
        if($this->input->post('tgl_input'))
        {
            $this->db->like('tgl_input', $this->input->post('tgl_input'));
        }

        $this->db->from($this->table);
        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        } 
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
   function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_list_kode_arsip($kd_arsip, $column)
    {
        $this->db->select('DISTINCT(kode_arsip)');
        $this->db->limit(10);
        $this->db->from($this->table);
        $this->db->like('kode_arsip',$kd_arsip);
        return $this->db->get()->result_array();
    }

    function get_list_kategori($kategori_, $column)
    {
        $this->db->select('DISTINCT(kategori)');
        $this->db->limit(10);
        $this->db->from($this->table);
        $this->db->like('kategori',$kategori_);
        return $this->db->get()->result_array();
    }
}
?>