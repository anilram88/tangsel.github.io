<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marsip extends CI_Model
{
	//Script Optimalisasi Datatable
	var $table = 'tbarsip';
    var $column_order = array(null, 'no_urut','nik','no_surat','nm_pemohon','keterangan','kode_arsip','input_by'); 
    var $column_search = array('no_urut','nik','no_surat','nm_pemohon','keterangan','kode_arsip','input_by'); 
    var $order = array('no_urut' => 'DESC');

	// TABLE KATEGORI
	var $table_kategori 		= 'tbkategori';
    var $column_order_kategori 	= array(null,'kategori','status'); 
    var $column_search_kategori	= array('kategori','status'); 
    var $order_kategori 		= array('kategori' => 'ASC');

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // FUNGSI TAMBAH DATA ARSIP
	private function _get_datatables_query()
	{
		
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
    
    public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

    function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

    public function get_by_id($id_arsip)
	{
		$this->db->from($this->table);
		$this->db->where('id_arsip',$id_arsip);
		$query = $this->db->get();

		return $query->row();
	}

    public function delete_by_id($id_arsip)
	{
		$this->db->where('id_arsip', $id_arsip);
		$this->db->delete($this->table);
	}

    public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

    public function no_urut()
    {
        $this->db->select('RIGHT(tbarsip.no_urut,7) as no_urut', FALSE);
        $this->db->order_by('no_urut','DESC');    
        $this->db->limit(1);    

        $query = $this->db->get('tbarsip');  //cek dulu apakah ada sudah ada no urut di tabel.    
        if($query->num_rows() <> 0){      
             //cek kode jika telah tersedia    
             $data      = $query->row();      
             $nourut    = intval($data->no_urut) + 1; 
        }
        else{      
             $nourut = 1;  //cek jika no urut belum terdapat pada table
        }
            $tgl            = date('dmY'); 
            $batas          = str_pad($nourut, 7, "0", STR_PAD_LEFT);    
            $nouruttampil   = $tgl.$batas;  //format no urut
            return $nouruttampil;  
    }

	public function get_kategori()
	{
		$this->db->from($this->table_kategori);
		$this->db->where('status','Aktif');
		$query = $this->db->get();

		return $query;
	}

	// function get_kategori()
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->table_kategori);        
    //     $this->db->order_by('kategpri','ASC');
    //     $this->db->where('status','Aktif');
        
    //     $query = $this->db->get();
    //     $result = $query->result();

    //     $kategori_ = array();
    //     foreach ($result as $row) 
    //     {
    //         $kategori_[] = $row->kategori;
    //     }
    //     return $kategori_;
    // }
    // END FUNGSI TAMBAH DATA ARSIP

	// FUNGSI TAMBAH DATA KATEGORI
	private function _get_datatables_query_kategori()
	{
		
		$this->db->from($this->table_kategori);

		$i = 0;
	
		foreach ($this->column_search_kategori as $item) // loop column 
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

				if(count($this->column_search_kategori) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kategori[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order_kategori))
		{
			$order = $this->order_kategori;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_kategori()
	{
		$this->_get_datatables_query_kategori();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
    
    public function count_all_kategori()
	{
		$this->db->from($this->table_kategori);
		return $this->db->count_all_results();
	}

    function count_filtered_kategori()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

    public function save_kategori($data)
	{
		$this->db->insert($this->table_kategori, $data);
		return $this->db->insert_id();
	}

    public function get_by_id_kategori($id_kategori)
	{
		$this->db->from($this->table_kategori);
		$this->db->where('id_kategori',$id_kategori);
		$query = $this->db->get();

		return $query->row();
	}

    public function delete_by_id_kategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete($this->table_kategori);
	}

    public function update_kategori($where, $data)
	{
		$this->db->update($this->table_kategori, $data, $where);
		return $this->db->affected_rows();
	}
	
	//END TAMBAH DATA KATEGORI
}
?>