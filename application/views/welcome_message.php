<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter - Google Recaptcha</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <?php
        $this->load->helper('form');
        echo form_open('welcome/register', array('method' => 'POST'));
        echo '<br> First Name: ' . form_input(array('name' => 'firstName', 'placeholder' => 'First Name'));
        echo '<br> Last Name: ' . form_input(array('name' => 'lastName', 'placeholder' => 'Last Name'));
        ?>
        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
        <?php
        echo form_submit(array('value'=>'Submit'));
        echo form_close();
        ?>
    </body>
</html>