<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        if (!$this->session->has_userdata('id'))
        {
                redirect("/");
        }
    }

    public function index()
    {         
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News recientes';
        $this->load->view('templates/header', $data);
        $this->load->view('news/news', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function save ()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Crear una nueva noticia';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/edit');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->news_model->set_news();
            redirect("/news");
        }
    }

    public function edit ($slug = NULL)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = "Editar noticia";
        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

}