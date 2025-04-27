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
        <div class="col-8">
            <div class="card p-5">

                <h3 class="text-center">Jogo das Capitais</h3>

                <div class="row">
                    <div class="col">
                        <h5 class="text-success">Questão n.º <strong><?= $current_question + 1 . ' / ' . $total_questions ?></strong></h5>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <h4>Corretas: <strong class="text-success"><?= $correct_answers ?></strong></h4>
                        <span class="mx-3">|</span>
                        <h4>Erradas: <strong class="text-danger"><?= $incorrect_answers ?></strong></h4>
                    </div>
                </div>
                
                <hr>
                <h4>Qual é a capital do seguinte país: <strong class="text-primary"><?= $country ?></strong></h4>
                <hr>

                <div class="px-5 mt-5">
                    <h3 class="mb-5 border border-3 p-3" style="cursor: pointer" id="answer_0"><?= $capitals[$answers[0]][1] ?></h3>
                    <h3 class="mb-5 border border-3 p-3" style="cursor: pointer" id="answer_1"><?= $capitals[$answers[1]][1] ?></h3>
                    <h3 class="mb-5 border border-3 p-3" style="cursor: pointer" id="answer_2"><?= $capitals[$answers[2]][1] ?></h3>
                </div>

                <div class="text-center">
                    <a href="index.php?route=start" class="btn btn-secondary p-3 w-25">Desistir</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll("[id^='answer_']").forEach(element => {
        element.addEventListener('click', () => {
            let id = element.id.split('_')[1];
            window.location.href = `index.php?route=game&answer=${id}`;
        });
    });
</script>