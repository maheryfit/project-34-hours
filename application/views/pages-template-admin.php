<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    $this->load->view("pages-template-admin/header");
    $this->load->view("body/$pages");
    $this->load->view("pages-template-admin/footer");
?>