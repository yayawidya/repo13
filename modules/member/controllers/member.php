<?php
if (!defined('BASEPATH')) exit('No direct script access
allowed');
class Member extends MY_Controller {
 public function __construct()
 {
 parent::__construct();
 $this->load->library('cart');
 $this->load->model('keranjang_model');
 }
 public function index()
 {
 $data['produk'] = $this->keranjang_model->get_produk_all();
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/list_produk',$data);
}
public function search(){
 $keyword = $this->input->post('keyword');
 $data['produk'] = $this->keranjang_model->search($keyword);

 $hasil=$this->render_backend_member('list_produk', array($data),true);

 $callback = array(
 	'hasil'=>$hasil, //set array hasil dengan isi dari view.php yg diload tadi
 );
echo json_encode($callback);
}
 public function tampil_cart()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/tampil_cart',$data);
 }
 public function check_out()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/check_out',$data);
 }
 public function detail_produk()
 {
 $id=($this->uri->segment(3))?$this->uri->segment(3):0;
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/detail_produk',$data);
 }
 function tambah()
 {
 $data_produk= array('id' => $this->input->post('id'),
 'name' => $this->input->post('nama'),
 'price' => $this->input->post('harga'),
 'gambar' => $this->input->post('gambar'),
 'qty' =>$this->input->post('qty')
 );
 $this->cart->insert($data_produk);
 $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Sukses </h4>
                    <p>Menambah ke keranjang belanja</p>
                </div>');    
        $this->load->view('welcome_message');
 redirect('member');
 }
 function hapus($rowid)
 {
 if ($rowid=="all")
 {
 $this->cart->destroy();
 }
 else
 {
 $data = array('rowid' => $rowid,
 'qty' =>0);
 $this->cart->update($data);
 }
 redirect('member/tampil_cart');
 }
 function ubah_cart()
 {
 $cart_info = $_POST['cart'] ;
 foreach( $cart_info as $id => $cart)
 {
 $rowid = $cart['rowid'];
 $price = $cart['price'];
 $gambar = $cart['gambar'];
 $amount = $price * $cart['qty'];
 $qty = $cart['qty'];
 $data = array('rowid' => $rowid,
 'price' => $price,
 'gambar' => $gambar,
 'amount' => $amount,
 'qty' => $qty);
 $this->cart->update($data);
 }
 redirect('member/tampil_cart');
 }
 public function proses_order()
 {
 //-------------------------Input data pelanggan--------------------------
 $data_pelanggan = array('nama' => $this->session->userdata('nama_member'),
 'email' => $this->session->userdata('email'),
 'alamat' => $this->session->userdata('alamat'),
 'telp' => $this->session->userdata('telp'));
 $id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
 //-------------------------Input data order------------------------------
 $data_order = array('tanggal' => date('Y-m-d'),
 'pelanggan' => $id_pelanggan);
 $id_order = $this->keranjang_model->tambah_order($data_order);
 //-------------------------Input data detail order-----------------------
 if ($cart = $this->cart->contents())
 {
 foreach ($cart as $item)
 {
 $data_detail = array('order_id'=>$id_order,
 'produk' => $item['id'],
 'qty' => $item['qty'],
 'harga' =>$item['price']);
 $proses = $this->keranjang_model->tambah_detail_order($data_detail);
 }
 }
 //-------------------------Hapus shopping cart--------------------------
 $this->cart->destroy();
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/sukses',$data);


 $this->load->library('email');
    $config=array();
    $config['charset']='utf-8';
    $config['useragent']='Codeigniter';
    $config['protocol']="smtp";
    $config['mailtype']="html";
    $config['smtp_host']="ssl://smtp.gmail.com";
    $config['smtp_port']="465";
    $config['smtp_timeout']="400";
    $config['smtp_user']="lindatavia99@gmail.com";
    $config['smtp_pass']="miftakhu1";
    $config['crlf']="\r\n";
    $config['newline']="\r\n";
    $config['wordwrap']=TRUE;
    
  	$this->email->initialize($config);
    //konfigurasi pengiriman email
    $this->email->from($config['smtp_user']);
    $this->email->to($data_pelanggan['email']);
    $this->email->subject("Anda telah berhasil melalukan check out di ArlinShop");
    $this->email->message('');

    if ($this->email->send()){
      $this->session->set_flashdata('msg', '<div class="alert alert-info">
                    <h4>Info</h4>
                    <p>Silahkan Cek Email Anda Untuk Proses verifikasi</p>
                </div>');
    }else{
      $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                    <h4>Gagal</h4>
                    <p>Gagal Mengirim Verifikasi Ke Email Anda</p>
                </div>');
      
    }
    
 }
 public function produk_kategori(){
 	$kategori 			= ($this->uri->segment(3))?$this->uri->segment(3):0;
 	$data['produk'] 	= $this->keranjang_model->get_produk_kategori($kategori);
 	$data['kategori'] 	= $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/list_produk',$data);
 }
   public function tentang()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all();
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/tentang',$data);
}
 public function cara_bayar()
 {
 $data['kategori'] = $this->keranjang_model->get_kategori_all(); 
 $data['email'] = $this->session->userdata('email');
 $data['active'] = $this->session->userdata('active');
 $this->render_backend_member('member/cara_bayar',$data);
 }
}
?>