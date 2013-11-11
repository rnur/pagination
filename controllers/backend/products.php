<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
		//Memanggil model produk dan dialiaskan menjadi datamodel
        $this->load->model('produk','datamodel'); 
		//Memanggil library pagination yang sudah tersedia
		$this->load->library("pagination");
    }
	   
	
	public function index()
	{
		 //Membuat judul yang disimpan dalam array $nur_data['title']
		$nur_data['title']='Data Products';	
		//Fungsinya adalah memilih database pada table products
		$db = $this->db->get('products');
		 
		 //Membuat array dalam hal_conf pada total_rows yang fungsinya untuk menampung jumlah baris yang ada di table products
		 $hal_conf['total_rows'] = $db->num_rows();
		 //Membuat array dalam hal_conf untuk mengatur jumlah baris yang ditampilkan dalam 1 halaman
		 $hal_conf['per_page'] = 10;
		 //Membuat array dalam hal_conf bertujuan untuk mengambil sekarang berada pada urutan berapa pada url dengan urutan ke empat
		 $hal_conf['uri_segment'] = 4;
		 //Membuat array dalam hal_conf untuk mengatur kata pada halaman pertama
		 $hal_conf['first_page'] = 'Awal';
		 //Membuat array dalam hal_conf untuk mengatur kata pada halaman akhir
		 $hal_conf['last_page'] = 'Akhir';
		 //Membuat array dalam hal_conf untuk mengatur kata pada halaman selanjutnya kalau diatas adalah tombol “>” / selanjutnya
		 $hal_conf['next_page'] = '&laquo;';
		 //Membuat array dalam hal_conf untuk mengatur kata pada halaman sebelumnya kalau diatas adalah tombol “<” / sebelumnya
		 $hal_conf['prev_page'] = '&raquo;';
		 //Membuat array dalam hal_conf untuk mengatur teks yang ingin ditampilkan dalam link "terakhir" di sebelah kanan.
		 $hal_conf['last_link'] = 'Akhir';
		 //Membuat array dalam hal_conf untuk mengatur teks yang ingin ditampilkan dalam link "awal" di sebelah kiri.
		 $hal_conf['first_link'] = 'Awal';
		 //Membuat array dalam hal_conf untuk mengeset URL / alamat yang digunakan
		 $hal_conf['base_url'] = base_url()."backend/products/index";
		 //menginisialisasi pagination class dengan menggunakan konfigurasi yang telah diatur sebelumnya yang disimpan dalam array $hal_conf.
		 $this->pagination->initialize($hal_conf);
		 
		 //Mengambil posisi halaman berapa sekarang yang di lihat dari url nya jika tidak ada berarti dalam posisi 0
         $hal = $this->uri->segment(4);
		 if($hal==""){
			 $hal=0;
		 }
           
		 //Untuk menampilkan data yang diambil dari model dan mengambil suatu function nur_db_produk dan mengirimkan dua variable yaitu per_page dan posisi halaman sekarang. Per_page adalah jumlah halamanya yang akan ditampilkan dan disimpan dalam array nur_data  
         $nur_data['nur_tampil'] = $this->datamodel->nur_db_produk($hal_conf["per_page"], $hal);
		 //membuat link navigasi halaman yang disimpan dalam array nur_data
		 $nur_data['page'] = $this->pagination->create_links();
		 //Membuat nomor awalan yaitu diamnbil posisi halaman sekarang yang disimpan dalam array nur_data
		 $nur_data['no'] = $hal;
		 //untuk memasukan template products dan variable data array dari nur_data yang dibuat tadi
		 $this->mytemplate->loadBackend('products',$nur_data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
