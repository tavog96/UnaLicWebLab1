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
        $this->load->helper('url');
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

        $data['news_item']['id']=$this->validateField($data['news_item'], 'id');
        $data['news_item']['title']=$this->validateField($data['news_item'], 'title');
        $data['news_item']['text']=$this->validateField($data['news_item'], 'text');
        $data['news_item']['image']=$this->validateField($data['news_item'], 'image');

        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function delete($slug = NULL)
    {
        if ($slug!=NULL)
        {
            $this->news_model->delete_news($slug);
            redirect("/news");
        }
        show_404();
    }

    public function save ($new=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Crear una nueva noticia';
        $data['error'] = '';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $id = $this->input->post('id');

            if ($id==NULL || $id=="")
            {
                if ($new==null)
                {
                    $data['error'] = APP_ERR_SAVE_FORM;
                }
                $data['news_item']['id']='';
                $data['news_item']['title']='';
                $data['news_item']['text']='';
                $data['news_item']['image']=base_url().'img/no-image-available.png';
                $this->load->view('templates/header', $data);
                $this->load->view('news/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $news=$this->news_model->get_news_by_id($id);
                redirect("/News/edit/".$news['slug']."/error");
            }
        }
        else
        {
            $this->news_model->set_news();
            redirect("/news");
        }
    }

    public function edit ($slug = NULL, $error = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }
        $data['news_item']['id']=$this->validateField($data['news_item'], 'id');
        $data['news_item']['title']=$this->validateField($data['news_item'], 'title');
        $data['news_item']['text']=$this->validateField($data['news_item'], 'text');
        $data['news_item']['image']=$this->validateField($data['news_item'], 'image');
        
        $data['title'] = "Editar noticia";
        $data['error'] = "";
        if ($error!=null)
        {
            $data['error']=APP_ERR_SAVE_FORM;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

    private function validateField ($res, $index)
    {
        $emptyres='';
        if ($index=='image')
        {
            $emptyres = base_url().'img/no-image-available.png';
        }
        if (isset($res[$index]))
        {
            if ($res[$index]=='')
            {
                return $emptyres;
            }
            else
            {
                return $res[$index];
            }
        }
        else
        {
            return $emptyres;
        }
    }
}