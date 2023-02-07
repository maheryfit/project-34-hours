<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    $this->load->view("form-template/header");
    $this->load->view("body/$pages");
    $this->load->view("form-template/footer");
?>