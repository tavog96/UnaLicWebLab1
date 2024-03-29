<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('news');
                    return $query->result_array();
            }

            $query = $this->db->get_where('news', array('slug' => $slug));
            return $query->row_array();
        }

        public function get_news_by_id($id=FALSE)
        {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('news');
                    return $query->result_array();
            }

            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
        }
        
    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $id = $this->input->post('id');

        if ($id==NULL)
        {
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text'),
                'image' => $this->input->post('image')
            );
    
            return $this->db->insert('news', $data);
        }
        else
        {
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text'),
                'id' => $id,
                'image' => $this->input->post('image')
            );
    
            return $this->db->replace('news', $data);
        }
    }

    public function delete_news($slug = FALSE)
    {
        if ($slug != FALSE)
        {
            return $this->db->delete('news', array('slug' => $slug)); 
        }
    }
}