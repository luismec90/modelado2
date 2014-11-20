<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
         $this->estoyLogueado();
        $this->load->model('photo_model');

    }


    public function store()
    {
        $album_id = $this->input->post('album_id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');


        $data = ['album_id' => $album_id,
            'title' => $title,
            'description' => $description];

        $this->photo_model->create($data);

        $photo_id = $this->db->insert_id();

        $imageFileType = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);

        $target_file = "public/uploads/{$_SESSION["idUsuario"]}";
        if (!file_exists($target_file)) {
            mkdir($target_file, 0777);
        }
        $target_file .= "/$album_id";
        if (!file_exists($target_file)) {
            mkdir($target_file, 0777);
        }
        $target_file .= "/$photo_id.$imageFileType";

        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        $data = ["location" => $target_file];

        $where = ["id" => $photo_id];

        $this->photo_model->update($data, $where);

        $this->mensaje("Imagen subida exitosamente", "success", "album/show/$album_id");
    }

    public function delete()
    {
        $album_id = $this->input->post('album_id');

        $photo_id = $this->input->post('photo_id');

        $data = ['id' => $photo_id];

        $this->photo_model->delete($data);

        $this->mensaje("Imagen eliminada exitosamente", "success", "album/show/$album_id");
    }
}

