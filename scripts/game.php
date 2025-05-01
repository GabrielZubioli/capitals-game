<?php

if(isset($_GET['answer'])) {

    $current_question = $_SESSION['game']['current_question'];

    $answer = $_GET['answer'];
    $answer_given = $_SESSION['questions'][$current_question]['answers'][$answer];

    if($answer_given == $_SESSION['questions'][$_SESSION['game']['current_question']]['correct_answer']) {
        $_SESSION['game']['correct_answers']++;
    } else {
        $_SESSION['game']['incorrect_answers']++;
    }

    if($_SESSION['game']['current_question'] == $_SESSION['game']['total_questions'] - 1) {
        header('Location: index.php?route=gameover');
        exit;
    }

    $_SESSION['game']['current_question']++;

    header('Location: index.php?route=game');
    exit;
}

$current_question = $_SESSION['game']['current_question'];
$total_questions = $_SESSION['game']['total_questions'];

$correct_answers = $_SESSION['game']['correct_answers'];
$incorrect_answers = $_SESSION['game']['incorrect_answers'];

$country = $_SESSION['questions'][$current_question]['question'];
$answers = $_SESSION['questions'][$current_question]['answers'];

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-5 shadow-lg rounded-4">

                <h3 class="text-center text-primary mb-4">Jogo das Capitais</h3>

                <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-success">Questão: <strong><?= $current_question + 1 . ' / ' . $total_questions ?></strong></h5>
                    <h5><span class="text-success"><?= $correct_answers ?></span> | <span class="text-danger"><?= $incorrect_answers ?></span></h5>
                </div>

                <hr class="my-4">

                <h4 class="text-center text-muted mb-4">Qual é a capital do seguinte país?</h4>
                <h3 class="text-center text-primary mb-5"><?= $country ?></h3>

                <div class="d-grid gap-2 mb-4">
                    <div class="answer-option" id="answer_0"><?= $capitals[$answers[0]][1] ?></div>
                    <div class="answer-option" id="answer_1"><?= $capitals[$answers[1]][1] ?></div>
                    <div class="answer-option" id="answer_2"><?= $capitals[$answers[2]][1] ?></div>
                </div>

                <div class="text-center">
                    <a href="index.php?route=start" class="btn btn-outline-danger w-50 py-2 rounded-pill">Desistir</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll("[id^='answer_']").forEach(element => {
        element.addEventListener('click', () => {
            const id = element.id.split('_')[1];
            const correctAnswer = <?= array_search($_SESSION['questions'][$current_question]['correct_answer'], $answers) ?>;

            document.querySelectorAll("[id^='answer_']").forEach((el, idx) => {
                if (idx == correctAnswer) {
                    el.style.backgroundColor = '#2ecc71';
                    el.style.color = 'white';
                } else {
                    el.style.backgroundColor = '#dc3545';
                    el.style.color = 'white';
                }
                el.style.pointerEvents = 'none';
            });
            setTimeout(() => {
                window.location.href = `index.php?route=game&answer=${id}`;
            }, 1000);
        });
    });
</script>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
        font-family: "Poppins", sans-serif;
    }

    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .answer-option {
        background-color: #fff;
        border: 2px solid #dee2e6;
        padding: 15px;
        border-radius: 12px;
        font-size: 1.1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .answer-option:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        font-weight: 600;
        text-transform: uppercase;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    h3.text-primary {
        font-size: 1.8rem;
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .text-success {
        color: #2ecc71 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .card hr {
        border: 1px solid #007bff;
        margin: 10px 0;
    }
    .correct {
    background-color: #2ecc71 !important;
    color: white !important;
}
.incorrect {
    background-color: #dc3545 !important;
    color: white !important;
}

</style>
