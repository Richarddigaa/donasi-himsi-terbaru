<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | Donasi Himsi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = ['email' => $user['email'], 'id_role' => $user['id_role'], 'password' => $user['password']];
                $this->session->set_userdata($data);
                if ($user['id_role'] == '001') {
                    redirect('admin');
                } else {
                    if ($user['image'] == 'logo-donasi.png') {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-info alert-message" role="alert">Silahkan 
                            Ubah Profile Anda untuk Ubah Photo Profil</div>'
                        );
                    }
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>
                    <meta http-equiv="refresh" content="2">'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>
                <meta http-equiv="refresh" content="2">'
            );
            redirect('auth');
        }
    }

    public function register()
    {

        $queryIDUser = "SELECT max(id_donatur) as maxID FROM donatur";
        $data['idU'] = $this->db->query($queryIDUser)->result_array();


        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diisi!!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[donatur.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]', [ 
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register | Donasi Himsi';
            $data['role'] = $this->ModelUser->roleWhere(['id_role' => '002'])->result_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'id_donatur' => $this->input->post('id_user', true),
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'gambar' => 'logo-donasi.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => '002',
                'tanggal_input' => date('Y-m-d')
            ];

            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Selamat!! 
                    akun anda sudah dibuat. Silahkan login!</div>
                    <meta http-equiv="refresh" content="2">'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">Kamu berhasil logout</div>
            <meta http-equiv="refresh" content="2">'
        );

        redirect('user');
    }
}
