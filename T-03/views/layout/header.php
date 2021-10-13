<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="<?php print URL::asset('lib/fontawesome-free-5.15.1-web/css/all.min.css'); ?>" rel="stylesheet">
        <link href="<?php print URL::asset('lib/fontawesome-free-5.15.1-web/css/fontawesome.min.css'); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    

        <link href="<?php print URL::asset('css/style.css'); ?>" rel="stylesheet">

        <title>Home | Bilheteria Online</title>
    </head>
    <body class="home-page" id="home">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <a href="/home" title="Bilheteria Online">
                            <img class="logo" src="<?php print URL::asset('images/logo.jpg'); ?>" alt="" />
                        </a>
                    </div>
                    <?php print view('layout.navigation'); ?>                    
                </div>
            </div>
        </header>