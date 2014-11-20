<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->estoyLogueado();
        $this->load->model('album_model');
        $this->load->model('photo_model');

    }


    public function index()
    {
        $data["albumes"] = $this->album_model->read(['user_id' => $_SESSION["idUsuario"]]);

        foreach ($data["albumes"] as $album) {
            $album->photos = $this->photo_model->read(['album_id' => $album->id]);
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('album/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $this->load->view('layouts/header');
        $this->load->view('album/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        $name = $this->input->post('name');
        if (!$name) {
            $this->mensaje("Por favor inténtalo nuevamente", "error");
        }

        $data = ['user_id' => $_SESSION["idUsuario"],
            'name' => $name];
        $this->album_model->create($data);

        $this->mensaje("Álbum creado exitosamente", "success");
    }

    public function show($album_id)
    {
        $data["album"] = $this->album_model->read(['id' => $album_id]);

        $data["album"][0]->photos = $this->photo_model->read(['album_id' => $data["album"][0]->id]);

        $this->load->view('layouts/header', $data);
        $this->load->view('album/show');
        $this->load->view('layouts/footer');
    }

    public function delete()
    {
        $album_id = $this->input->post('album_id');

        $data = ['id' => $album_id];

        $this->album_model->delete($data);

        $this->mensaje("Álbum eliminado exitosamente", "success", "album");
    }

    public function showAlbums($user_id)
    {
        $data["albumes"] = $this->album_model->read(['user_id' => $user_id]);

        foreach ($data["albumes"] as $album) {
            $album->photos = $this->photo_model->read(['album_id' => $album->id]);
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('album/index');
        $this->load->view('layouts/footer');


    }

    public function showAlbum($user_id,$album_id)
    {
        $data["album"] = $this->album_model->read(['id' => $album_id]);

        $data["album"][0]->photos = $this->photo_model->read(['album_id' => $data["album"][0]->id]);

        $this->load->view('layouts/header', $data);
        $this->load->view('album/show');
        $this->load->view('layouts/footer');


    }

}

