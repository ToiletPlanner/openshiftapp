<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Site extends CI_Controller {
    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('view_dashboard', $data);
        }
        else
        {
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('site', 'refresh');
    }

    public function charts()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('view_charts', $data);
        }
        else
        {
            redirect('login', 'refresh');
        }

    }

    public function testdata() {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('view_testdata', $data);
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
}