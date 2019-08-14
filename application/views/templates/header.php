<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Doge News :
            <?php echo $title; ?>
        </title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/header.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>css/header.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/upoader.css">
    </head>

    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <nav class="my-0 mr-md-auto align-items-center d-flex">
                <a class="my-0 mr-md-auto btn btn-primary" href="<?php echo base_url();?>index.php/News">HOME</a>
                <h5 class="my-0 mr-md-auto font-weight-normal ml-2">
                    <?php echo $title; ?>
                </h5>
            </nav>
            <nav class="my-2 my-md-0 mr-md-3 d-sm-none d-md-block">
                <a class="p-2 text-dark" href="#"><img src="<?php echo $this->session->userdata('image');?>" class="rounded" alt="User image"></a>
                <a class="p-2 text-dark" href="#"><?php echo $this->session->userdata('name');?></a>
            </nav>
            <a class="btn btn-outline-primary" href="<?php echo base_url();?>index.php/Logout">Logout</a>
        </div>