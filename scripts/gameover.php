<?php

$total_questions = $_SESSION['game']['total_questions'];
$correct_answers = $_SESSION['game']['correct_answers'];
$incorrect_answers = $_SESSION['game']['incorrect_answers'];

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 card p-5 shadow-lg rounded-4">
            <h3 class="text-center text-primary mb-4">Jogo das Capitais</h3>
            <hr class="mb-4">

            <div class="p-4">
                <h4 class="mb-3">Resumo da Partida</h4>
                <h5>Total de questões: <strong><?= $total_questions ?></strong></h5>
                <h5>Respostas corretas: <strong class="text-success"><?= $correct_answers ?></strong></h5>
                <h5>Respostas erradas: <strong class="text-danger"><?= $incorrect_answers ?></strong></h5>
            </div>

            <div class="text-center mt-4">
                <a href="index.php?route=start" class="btn btn-outline-success w-50 py-3 rounded-pill">Jogar novamente</a>
            </div>
        </div>
    </div>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
        font-family: "Poppins", sans-serif;
    }
    .container {
        
        max-width: 1000px;
        text-align: center;
    }

    body {
        background-color: #f7f7f7;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-success {
        border-color:rgb(21, 255, 0);
        color: rgb(21, 255, 0);
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: rgb(21, 255, 0);
        color: white;
        transform: scale(1.05);
    }

    h3.text-primary, h4 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #007bff;
    }

    h5 {
        font-size: 1.2rem;
        font-weight: 500;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-danger {
        color: rgb(255, 0, 0) !important;
    }

    hr {
        border: 1px solid #007bff;
        margin: 10px 0;
    }

    .text-center {
        text-align: center;
    }
</style>
