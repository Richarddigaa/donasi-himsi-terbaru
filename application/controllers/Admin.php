<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['totalDonasi'] = $this->db->get('donasi')->num_rows();
        $data['totalKategori'] = $this->db->get('kategori')->num_rows();
        $data['totalPembayaran'] = $this->db->get('pembayaran')->num_rows();
        $data['totalRiwayat'] = $this->db->get('transaksi')->num_rows();
        $data['totalLaporan'] = $this->db->get('pencairan')->num_rows();

        $queryDonasi = "SELECT * FROM donasi JOIN kategori ON donasi.id_kategori = kategori.id_kategori WHERE status_donasi = 'Belum dicairkan' and dana_terkumpul > 100000";
        $data['totalPencairan'] = $this->db->query($queryDonasi)->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function donatur()
    {
        $data['title'] = 'Donatur | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/donatur', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_donatur()
    {
        $data['title'] = 'Tambah Donatur | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $queryIDUser = "SELECT max(id_donatur) as maxID FROM donatur";
        $data['idU'] = $this->db->query($queryIDUser)->result_array();


        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diisi!!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[donatur.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah-donatur', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('donatur', [
                'id_donatur' => $this->input->post('id_donatur'),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => $this->input->post('email', true),
                'gambar' => 'logo-donasi.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' => '002',
                'tanggal_input' => time()
            ]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Kategori berhasil ditambahkan</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/donatur');
        }
    }

    public function hapus_donatur($id)
    {

        $this->ModelAdmin->hapus_donatur($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message" role="alert">donatur berhasil dihapus</div>
                                    <meta http-equiv="refresh" content="2">'
        );
        redirect('admin/donatur');
    }

    public function kategori()
    {
        $data['title'] = 'Kategori | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori()
    {
        $data['title'] = 'Tambah Kategori | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $queryIDKategori = "SELECT max(id_kategori) as maxID FROM kategori";
        $data['idK'] = $this->db->query($queryIDKategori)->result_array();

        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required|min_length[3]',
            ['required' => 'Nama kategori harus diisi', 'min_length' => 'Nama Kategori terlalu pendek']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah-kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('kategori', [
                'id_kategori' => $this->input->post('id_kategori'),
                'kategori' => $this->input->post('kategori')
            ]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Kategori berhasil ditambahkan</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/kategori');
        }
    }

    public function edit_kategori($id)
    {
        $data['title'] = 'Edit Kategori | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->ModelAdmin->getrow(array('id_kategori' => $id), 'kategori');

        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required|min_length[3]',
            ['required' => 'Nama kategori harus diisi', 'min_length' => 'Nama Kategori terlalu pendek']
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $simpan = ['kategori' => $this->input->post('kategori')];
            $this->db->where('id_kategori', $id);
            $this->db->update('kategori', $simpan);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Kategori berhasil diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/kategori');
        }
    }

    public function hapus_kategori($id)
    {
        $this->ModelAdmin->hapus_kategori($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message" role="alert">Kategori berhasil dihapus</div>
                                    <meta http-equiv="refresh" content="2">'
        );
        redirect('admin/kategori');
    }

    public function donasi()
    {
        $data['title'] = 'Donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->db->get('donasi')->result_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/donasi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_donasi()
    {
        $data['title'] = 'Tambah Donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $queryIDDonasi = "SELECT max(id_donasi) as maxID FROM donasi";
        $data['idD'] = $this->db->query($queryIDDonasi)->result_array();

        $this->form_validation->set_rules('donasi', 'Judul Donasi', 'required|min_length[3]', [
            'required' => 'Judul Donasi harus diisi',
            'min_length' => 'Judul Donasi terlalu pendek'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi',
        ]);
        $this->form_validation->set_rules('dana_dibutuhkan', 'Dana Yang Dibutuhkan', 'required', [
            'required' => 'Dana Yang Dibutuhkan harus diisi'
        ]);
        $this->form_validation->set_rules('dana_terkumpul', 'Dana Yang Terkumpul', 'required', [
            'required' => 'Dana Yang Terkumpul harus diisi'
        ]);
        $this->form_validation->set_rules('detail', 'Detail', 'required|min_length[3]', [
            'required' => 'Detail harus diisi',
            'min_length' => 'Detail terlalu pendek'
        ]);
        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah-donasi', $data);
            $this->load->view('templates/footer');
        } else {
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Silahkan Upload Gambar</div>
                                <meta http-equiv="refresh" content="4">'
                );
                redirect('admin/tambah_donasi');
            } else {
                $gambar = $this->upload->data();
                $img = $gambar['file_name'];

                // Fungsi untuk menghapus format Rupiah dan mengubah menjadi angka
                function bersihkanRupiah($string)
                {
                    $string = str_replace('Rp', '', $string);
                    $string = str_replace('.', '', $string);
                    return $string;
                }
                $dana = $this->input->post('dana_dibutuhkan', true);
                $dana2 = $this->input->post('dana_terkumpul', true);
                $dana_rupiah = bersihkanRupiah($dana);
                $dana_terkumpul = bersihkanRupiah($dana2);

                $data = [
                    'id_donasi' => $this->input->post('id_donasi', true),
                    'judul' => $this->input->post('donasi', true),
                    'id_kategori' => $this->input->post('kategori', true),
                    'dana_dibutuhkan' => $dana_rupiah,
                    'detail' => $this->input->post('detail', true),
                    'dana_terkumpul' => $dana_terkumpul,
                    'gambar' => $img
                ];
                $this->ModelAdmin->simpanDonasi($data);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-message" role="alert">Donasi berhasil ditambahkan</div>
                                    <meta http-equiv="refresh" content="2">'
                );
                redirect('admin/donasi');
            }
        }
    }

    public function hapusDonasi($id)
    {
        $this->ModelAdmin->hapusDonasi($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message" role="alert">Donasi berhasil dihapus</div>
                                    <meta http-equiv="refresh" content="2">'
        );
        redirect('admin/donasi');
    }

    public function ubahDonasi()
    {
        $data['title'] = 'Ubah Donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->ModelAdmin->donasiWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('donasi', 'Judul Donasi', 'required|min_length[3]', [
            'required' => 'Judul Donasi harus diisi',
            'min_length' => 'Judul Donasi terlalu pendek'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi',
        ]);
        $this->form_validation->set_rules('dana_dibutuhkan', 'Dana Yang Dibutuhkan', 'required', [
            'required' => 'Dana Yang Dibutuhkan harus diisi'
        ]);
        $this->form_validation->set_rules('dana_terkumpul', 'Dana Yang Terkumpul', 'required', [
            'required' => 'Dana Yang Terkumpul harus diisi'
        ]);
        $this->form_validation->set_rules('detail', 'Detail', 'required|min_length[3]', [
            'required' => 'Detail harus diisi',
            'min_length' => 'Detail terlalu pendek'
        ]);
        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-donasi', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                unlink('./assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $img = $gambar['file_name'];
            } else {
                $img = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'judul' => $this->input->post('donasi', true),
                'id_kategori' => $this->input->post('kategori', true),
                'dana_dibutuhkan' => $this->input->post('dana_dibutuhkan', true),
                'detail' => $this->input->post('detail', true),
                'dana_terkumpul' => $this->input->post('dana_terkumpul', true),
                'gambar' => $img
            ];
            $this->ModelAdmin->updateDonasi($data, ['id_donasi' => $this->input->post('id')]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Donasi berhasil diubah</div>
                                <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/donasi');
        }
    }

    public function pembayaran()
    {
        $data['title'] = 'Metode Pembayaran | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->db->get('pembayaran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pembayaran()
    {
        $data['title'] = 'Tambah Metode Pembayaran | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $queryIDPembayaran = "SELECT max(id_pembayaran) as maxID FROM pembayaran";
        $data['idP'] = $this->db->query($queryIDPembayaran)->result_array();

        $this->form_validation->set_rules(
            'nama_bank',
            'Nama Bank',
            'required|min_length[3]',
            ['required' => 'Nama Pembayaran harus diisi', 'min_length' => 'Nama Pembayaran terlalu pendek']
        );

        $this->form_validation->set_rules(
            'rekening',
            'Rekening',
            'required|min_length[10]|max_length[12]',
            ['required' => 'No Rekening harus diisi', 'min_length' => 'Minimal 10 angka', 'max_length' => 'Maksimal 12 angka']
        );

        $this->form_validation->set_rules(
            'pemilik_rekening',
            'Pemilik Rekening',
            'required',
            ['required' => 'Nama Pemilik Rekening harus diisi']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah-pembayaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('pembayaran', [
                'id_pembayaran' => $this->input->post('id_pembayaran'),
                'nama_bank' => $this->input->post('nama_bank'),
                'rekening' => $this->input->post('rekening'),
                'pemilik_rekening' => $this->input->post('pemilik_rekening'),
            ]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Metode Pembayaran berhasil ditambahkan</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/pembayaran');
        }
    }

    public function edit_pembayaran($id)
    {
        $data['title'] = 'Ubah Metode Pembayaran | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['data'] = $this->ModelAdmin->getrow(array('id_pembayaran' => $id), 'pembayaran');

        $this->form_validation->set_rules(
            'nama_bank',
            'Nama Bank',
            'required|min_length[3]',
            ['required' => 'Nama Bank Harus Diisi', 'min_length' => 'Nama Bank terlalu pendek']
        );

        $this->form_validation->set_rules(
            'rekening',
            'Rekening',
            'required|min_length[3]',
            ['required' => 'No Rekening harus diisi', 'min_length' => 'No Rekening terlalu pendek']
        );
        $this->form_validation->set_rules(
            'pemilik_rekening',
            'Pemilik Rekening',
            'required',
            ['required' => 'Nama Pemilik Rekening harus diisi']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-pembayaran', $data);
            $this->load->view('templates/footer');
        } else {
            $simpan = [
                'nama_bank' => $this->input->post('nama_bank'),
                'rekening' => $this->input->post('rekening'),
                'pemilik_rekening' => $this->input->post('pemilik_rekening'),
            ];
            $this->db->where('id_pembayaran', $id);
            $this->db->update('pembayaran', $simpan);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Metode Pembayaran berhasil diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/pembayaran');
        }
    }

    public function hapus_pembayaran($id)
    {
        $this->ModelAdmin->hapus_metode($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message" role="alert">Donasi berhasil dihapus</div>
                                    <meta http-equiv="refresh" content="2">'
        );
        redirect('admin/pembayaran');
    }

    public function konfirmasi($id)
    {
        $simpan = [
            'status_transaksi' => "Sudah dikonfirmasi"
        ];
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $simpan);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message" role="alert">Konfirmasi berhasil</div>
                                <meta http-equiv="refresh" content="2">'
        );
        redirect('admin/konfirmasiDonasi');
    }

    public function konfirmasiDonasi()
    {
        $data['title'] = 'Konfirmasi Donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['konfirmasi'] = $this->db->get('transaksi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/konfirmasi', $data);
        $this->load->view('templates/footer');
    }

    public function riwayatDonasi()
    {
        $data['title'] = 'Riwayat Donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['riwayatDonasi'] = $this->db->get('transaksi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/riwayatDonasi', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile Saya | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
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
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $password =  password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
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
            redirect('admin/profile');
        }
    }

    public function pencairanDana()
    {
        $data['title'] = 'Pencairan Dana | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->db->get('donasi')->result_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pencairan-dana', $data);
        $this->load->view('templates/footer');
    }

    public function inputPencairan($id)
    {
        $data['title'] = 'Pencairan Dana | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->ModelAdmin->donasiWhere(['id_donasi' => $this->uri->segment(3)])->result_array();

        $data['data'] = $this->ModelAdmin->getrow(array('id_donasi' => $id), 'donasi');

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $queryIDPencairan = "SELECT max(id_pencairan) as maxID FROM pencairan";
        $data['idPe'] = $this->db->query($queryIDPencairan)->result_array();

        $this->form_validation->set_rules(
            'nama_rekening',
            'Nama Rekening',
            'required|min_length[3]',
            ['required' => 'Nama Rekening harus diisi', 'min_length' => 'Nama Rekening terlalu pendek']
        );

        $this->form_validation->set_rules(
            'nomor_rekening',
            'Nomor Rekening',
            'required|min_length[10]|max_length[12]',
            ['required' => 'No Rekening harus diisi', 'min_length' => 'Minimal 10 angka', 'max_length' => 'Maksimal 12 angka']
        );

        $this->form_validation->set_rules(
            'nama_penerima',
            'Nama Penerima',
            'required|min_length[3]',
            ['required' => 'Nama Penerima harus diisi', 'min_length' => 'Nama Penerima terlalu pendek']
        );

        $this->form_validation->set_rules(
            'detail_pencairan',
            'Detail Pencairan',
            'required|min_length[3]',
            ['required' => 'Detail Pencairan harus diisi', 'min_length' => 'Detail Pencairan terlalu pendek']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/input-pencairan', $data);
            $this->load->view('templates/footer');
        } else {
            $simpan = [
                'status_donasi' => 'Sudah dicairkan'
            ];
            $this->db->where('id_donasi', $id);
            $this->db->update('donasi', $simpan);

            $this->db->insert('pencairan', [
                'id_pencairan' => $this->input->post('id_laporan', true),
                'id_donasi' => $this->input->post('id_donasi', true),
                'nama_donasi' => $this->input->post('nama_donasi', true),
                'kategori_donasi' => $this->input->post('kategori_donasi', true),
                'dana_cair' => $this->input->post('dana_cair', true),
                'bank_tujuan' => $this->input->post('nama_rekening', true),
                'no_rekening_tujuan' => $this->input->post('nomor_rekening', true),
                'nama_penerima_tujuan' => $this->input->post('nama_penerima', true),
                'detail_pencairan' => $this->input->post('detail_pencairan', true),
                'tanggal_pencairan' => time()
            ]);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Pencairan Dana Berhasil</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/pencairanDana');
        }
    }

    public function upload_buktiPencairan()
    {
        $data['title'] = 'Upload bukti penyaluran donasi | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/upload_buktipenyaluran');
        $this->load->view('templates/footer');
    }

    public function uploadBukti_Donasi()
    {
        $data['title'] = 'Upload Bukti | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['upload'] = $this->ModelAdmin->uploadWhere(['id_pencairan' => $this->uri->segment(3)])->result_array();
        $this->form_validation->set_rules(
            'bukti',
            'Bukti Laporan',
            'max_size',
            ['max_size' => '4096']
        );

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/upload_bukti', $data);
            $this->load->view('templates/footer');
        } else { //konfigurasi sebelum gambar diupload 
            if ($this->upload->do_upload('bukti')) {
                $gambar = $this->upload->data();
                unlink('./assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $img = $gambar['file_name'];
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-message" role="alert">Kategori berhasil diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
                );
            } else {
                $img = $this->input->post('old_pict', TRUE);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Kategori tidak diupdate</div>
                                    <meta http-equiv="refresh" content="2">'
                );
            }
            $data = [
                'bukti_pencairan' => $img
            ];
            $this->ModelAdmin->uploadBukti($data, ['id_pencairan' => $this->input->post('id_laporan')]);
            redirect('admin/upload_buktiPencairan');
        }
    }



    public function laporanPencairan()
    {
        $data['title'] = 'Laporan Pencairan Dana | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['laporan_pencairan'] = $this->db->get('pencairan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan-pencairan', $data);
        $this->load->view('templates/footer');
    }

    public function print_laporan_pencairan()
    {
        // Get the month from the URL parameters
        $selectedMonth = $this->input->get('month');

        // Query to fetch the data based on the selected month
        if ($selectedMonth != '') {
            // Filter by the selected month
            $query = "SELECT * FROM pencairan WHERE MONTH(FROM_UNIXTIME(tanggal_pencairan)) = ?";
            $pencairan = $this->db->query($query, array($selectedMonth))->result_array();
        } else {
            // If no month selected, get all data
            $query = "SELECT * FROM pencairan";
            $pencairan = $this->db->query($query)->result_array();
        }

        // Load the view for the printable report, passing the filtered data
        $data['pencairan'] = $pencairan;
        $data['selectedMonth'] = $selectedMonth;

        // Load the view for the printable page
        $this->load->view('admin/print-laporan-pencairan', $data);
    }

    public function pdf_laporan_pencairan()
    {
        // Mendapatkan bulan dan tahun yang dipilih dari query string (URL)
        $month = $this->input->get('month');
        $year = $this->input->get('year');

        // Memfilter data berdasarkan bulan dan tahun
        $this->db->select('*');
        $this->db->from('pencairan');

        if ($month != '') {
            $this->db->where("MONTH(FROM_UNIXTIME(tanggal_pencairan))", $month);
        }

        if ($year != '') {
            $this->db->where("YEAR(FROM_UNIXTIME(tanggal_pencairan))", $year);
        }

        $data['laporan_pencairan'] = $this->db->get()->result_array();

        // Memuat Dompdf
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/donasi-himsi/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        // Memuat view untuk laporan
        $this->load->view('admin/pdf-laporan-pencairan', $data);

        $paper_size  = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);

        // Mengkonversi HTML menjadi PDF
        $dompdf->load_html($html);
        $dompdf->render();

        // Mengunduh atau menampilkan PDF
        $dompdf->stream("laporan_pencairan_donasi.pdf", array('Attachment' => 0));
    }

    public function ubah_password()
    {
        $data['title'] = 'Ubah Password | Admin Donasi Himsi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ubah_password');
        $this->load->view('templates/footer'); // Menampilkan kembali form jika validasi gagal
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
                '<div class="alert alert-success alert-message" role="alert">tidak ada yang diperbaharui</div>
                                    <meta http-equiv="refresh" content="2">'
            );
            redirect('admin/profile');
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
            redirect('admin/profile');
        }
    }
}
