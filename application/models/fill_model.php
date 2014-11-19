<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fill_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    function poblarBD()
    {

        $this->user();
        $this->album();
        $this->photo();

    }

    private function user()
    {
        $this->db->empty_table('user');

        $data = array(
            'id' => 1,
            'first_name' => 'Luis Fernando',
            'last_name' => 'Montoya Gómez',
            'email' => 'estudiante1',
            'password' => sha1("123"),
        );
        $this->db->insert('user', $data);

        $data = array(
            'id' => 5,
            'first_name' => 'Juan Camilo',
            'last_name' => 'Monsalve Ramírez',
            'email' => 'monitor1',
            'password' => sha1("123"),

        );
        $this->db->insert('user', $data);

    }

    private function album()
    {
        $this->db->empty_table('album');

        $data = array(
            'id' => 1,
            'user_id' => 1,
            'name' => 'Álbum 1'
        );
        $this->db->insert('album', $data);

        $data = array(
            'id' => 2,
            'user_id' => 1,
            'name' => 'Álbum 2'
        );
        $this->db->insert('album', $data);

        $data = array(
            'id' => 3,
            'user_id' => 1,
            'name' => 'Álbum 3'
        );
        $this->db->insert('album', $data);
    }

    private function photo()
    {
        $this->db->empty_table('photo');

        $data = array(
            'id' => 1,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/1.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 2,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/2.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 3,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/3.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 4,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/4.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 5,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/5.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 6,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/6.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

        $data = array(
            'id' => 7,
            'album_id' => 1,
            'location' => 'public/uploads/1/1/7.jpg',
            'title' => 'Un título cualquiera...',
            'description' => 'Una descripción cualquiera...',
        );
        $this->db->insert('photo', $data);

    }
}
