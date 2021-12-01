<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Pegawai extends RestController
{

    // function __construct()
    // {
    //     // Construct the parent class
    //     parent::__construct();
    // }

    public function index_get()
    {
        $data = $this->db->get('pegawai')->result();

        $this->response($data, RestController::HTTP_OK);
    }
}