<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Menampilkan halaman dashboard user.
     *
     * Data yang dikirim ke view:
     * - $user: informasi user yang login
     * - $donasi: seluruh data donasi dari database
     *
     * View yang digunakan:
     * - templates/user_header.php
     * - templates/user_navbar.php
     * - user/index.php
     * - templates/user_footer.php
     */
    public function index()
    {
        $data['title'] = 'Home | Donasi Himsi';
        $data['donasi'] = $this->db->query("SELECT * FROM donasi WHERE status_donasi = 'Belum dicairkan' ORDER BY id_donasi DESC LIMIT 8 ")->result_array();

        if ($this->session->userdata('email')) {
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/user_footer');
        } else {
            $data['user'] = 'pengunjung';

            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/user_footer');
        }
    }


    public function donasi()
    {
        // log_message('debug', 'Fungsi donasi() dipanggil');
        // $mem_before = memory_get_usage();

        $data['title'] = 'Bantu Mereka | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/donasi', $data);
        $this->load->view('templates/user_footer');

        // $mem_after = memory_get_usage();
        // $mem_peak = memory_get_peak_usage();

        // log_message('debug', 'Memory used by donasi(): ' . ($mem_after - $mem_before) . 'bytes');
        // log_message('debug', 'Peak memory usage so far: ' . $mem_peak . 'bytes');
    }

    public function detailDonasi()
    {
        $data['title'] = 'Detail Donasi | Donasi Himsi';
        if ($this->session->userdata('email')) {
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['donasi'] = $this->ModelAdmin->donasiWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/detailDonasi', $data);
            $this->load->view('templates/user_footer');
        } else {
            $data['donasi'] = $this->ModelAdmin->donasiWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/detailDonasi', $data);
            $this->load->view('templates/user_footer');
        }
    }

    public function riwayatDonasi()
    {
        $data['title'] = 'Detail Donasi | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['user_berdonasi'] = $this->db->get('transaksi')->result_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/riwayatDonasi', $data);
        $this->load->view('templates/user_footer');
    }

    public function berdonasi()
    {
        $data['title'] = 'Detail Donasi | Donasi Himsi';
        if ($this->session->userdata('email')) {

            // mengambil sesion user login
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

            // mengambil id donasi berdasarkan user mau donasi
            $data['donasi'] = $this->ModelAdmin->donasiWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

            // mengambil data pembayaran
            $data['pembayaran'] = $this->db->get('pembayaran')->result_array();

            // untuk membuat id transaksi
            $queryIDBerdonasi = "SELECT max(id_transaksi) as maxID FROM transaksi";
            $data['idB'] = $this->db->query($queryIDBerdonasi)->result_array();

            // form validation agar user input seusai sistem
            $this->form_validation->set_rules(
                'dana',
                'Dana Yang Akan Didonasikan',
                'required|min_length[7]',
                [
                    'required' => 'Dana Yang Akan Didonasikan harus diisi',
                    'min_length' => 'Dana Yang Akan Didonasikan Minimal Rp. 1.000'
                ]
            );

            $this->form_validation->set_rules(
                'pembayaran',
                'Metode Pembayaran',
                'required',
                ['required' => 'Silahkan Pilih Metode Pembayaran']
            );
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/user_header', $data);
                $this->load->view('templates/user_navbar', $data);
                $this->load->view('user/berdonasi', $data);
                $this->load->view('templates/user_footer');
            } else {
                function bersihkanRupiah($string)
                {
                    $string = str_replace('Rp', '', $string);
                    $string = str_replace('.', '', $string);
                    return $string;
                }
                $dana = $this->input->post('dana', true);
                $dana_rupiah = bersihkanRupiah($dana);
                session_start();
                // simpan ke database
                $data = [
                    'id_transaksi' => $this->input->post('id_berdonasi', true),
                    'id_donatur' => $this->input->post('id_user', true),
                    'id_donasi' => $this->input->post('id_donasi', true),
                    'id_pembayaran' => $this->input->post('pembayaran', true),
                    'dana_didonasikan' => $dana_rupiah,
                    'tanggal_donasi' => date('Y-m-d'),
                    'anonim' => $this->input->post('anonim') ? $this->input->post('anonim') : 0,
                ];
                $_SESSION['donasi_data'] = $data;
                $this->ModelUser->simpanBerdonasi($data);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-message" role="alert">Silahkan Melakakukan Pembayaran </div>
                                    <meta http-equiv="refresh" content="4">'
                );
                redirect('user/bayar');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu</div>
            <meta http-equiv="refresh" content="2">'
            );
            redirect('auth');
        }
    }

    public function profile()
    {
        $data['title'] = 'Profile Saya | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function ubahProfile()
    {
        $data['title'] = 'Ubah Profile | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required|trim',
            ['required' => 'Nama tidak Boleh Kosong']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/ubahProfile', $data);
            $this->load->view('templates/user_footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            //jika ada gambar yang akan diupload 
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $gambar_lama = $data['user']['gambar'];
                if ($gambar_lama != 'logo-donasi.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                }
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambar_baru);
            } else {
                echo "gagal";
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('donatur');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>
                                            <meta http-equiv="refresh" content="2">');
            redirect('user/profile');
        }
    }

    public function tentangKami()
    {
        $data['title'] = 'Tentang Kami | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/tentangKami', $data);
        $this->load->view('templates/user_footer');
    }

    public function lapor_donasi()
    {
        $data['title'] = 'Laporan Donasi | Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['lapor'] = $this->ModelUser->laporWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/lapor_donasi', $data);
        $this->load->view('templates/user_footer');
    }

    public function struk($id)
    {
        $data['data_berdonasi'] = $this->db->query("SELECT * FROM transaksi 
            INNER JOIN donatur
            ON transaksi.id_donatur = donatur.id_donatur
            INNER JOIN donasi
            ON transaksi.id_donasi = donasi.id_donasi
            INNER JOIN pembayaran
            ON transaksi.id_pembayaran = pembayaran.id_pembayaran
            WHERE transaksi.id_transaksi = '$id' ")->result_array();
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/donasi-himsii/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('user/pdf-struk.php', $data);
        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF 
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("struk_donasi_himsi.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

    // public function transaksi()
    // {
    //     $data['title'] = 'transaksi | Donasi Himsi';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     unset($_SESSION['donasi_data']);
    //     $data['user_berdonasi'] = $this->db->get('transaksi')->result_array();

    //     $this->load->view('templates/user_header', $data);
    //     $this->load->view('templates/user_navbar', $data);
    //     $this->load->view('user/transaksi', $data);
    //     $this->load->view('templates/user_footer');
    // }

    public function bayar()
    {
        $data['title'] = 'Pembayaran | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        if (isset($_SESSION['donasi_data'])) {
            $data['bayar'] =
                $this->ModelUser->transaksiWhere(['id_transaksi' => $_SESSION['donasi_data']['id_transaksi']])->result_array();
            $id =
                $_SESSION['donasi_data']['id_transaksi'];
            $metode =
                $_SESSION['donasi_data']['id_pembayaran'];
            $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi
            INNER JOIN pembayaran ON transaksi.id_pembayaran = pembayaran.id_pembayaran WHERE transaksi.id_transaksi = '$id'")->result_array();
        } else {
            $data['bayar'] = $this->ModelUser->transaksiWhere(['id_transaksi' => $this->uri->segment(3)])->result_array();
            $id = $this->uri->segment(3);
            $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi
            INNER JOIN pembayaran ON transaksi.id_pembayaran = pembayaran.id_pembayaran WHERE transaksi.id_transaksi = '$id'")->result_array();
        }
        $this->form_validation->set_rules(
            'gambar',
            'Gambar',
            'max_size',
            ['max_size' => '4096']
        );

        $config['upload_path'] = './assets/img/bukti-transfer/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_navbar', $data);
            $this->load->view('user/bayar', $data);
            $this->load->view('templates/user_footer');
        } else { //konfigurasi sebelum gambar diupload 
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                unlink('./assets/img/bukti-transfer/' . $this->input->post('old_bukti', TRUE));
                $img = $gambar['file_name'];
            } else {
                $img = $this->input->post('old_bukti', TRUE);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Kategori tidak diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
                );
            }
            $data = [
                'bukti' => $img
            ];
            $this->ModelUser->updateTransaksi($data, ['id_transaksi' => $this->input->post('idTransaksi')]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Kategori berhasil diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            unset($_SESSION['donasi_data']);
            redirect('user/riwayatDonasi');
        }
    }

    public function ubah_password()
    {
        $data['title'] = 'Ubah Password | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('user/ubah_password');
        $this->load->view('templates/user_footer'); // Menampilkan kembali form jika validasi gagal
    }

    public function new_password()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id_donatur'];
        $data['id'] = $id;

        // Validasi form
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Cek apakah validasi berhasil
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-message" role="alert">tidak ada yang diperbaharui</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('user/profile');
        } else {
            // Ambil ID user dari URL
            // Periksa apakah ID valid
            if (empty($id)) {
                echo "ID user tidak ditemukan.";
                return;
            }

            // Ambil password dan enkripsi
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Siapkan data untuk disimpan
            $simpan = ['password' => $password];

            // Update password di database
            $this->db->where('id_donatur', $id);
            $this->db->update('donatur', $simpan);

            // Cek apakah update berhasil
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-message" role="alert">Password berhasil di perbaharui</div>
                                    <meta http-equiv="refresh" content="2">'
                );
            } else {
                $this->session->set_flashdata('pesan', 'Gagal memperbarui password');
            }

            // Redirect setelah update
            redirect('user/profile');
        }
    }
}
