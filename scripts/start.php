
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $total_questions = intval($_POST['text_total_questions']) ?? 10;

    prepare_game($total_questions);

    header('Location: index.php?route=game');
    exit;
}

function prepare_game($total_questions)
{
    global $capitals;

    $ids = [];
    while(count($ids) < $total_questions) {
        $id = rand(0, count($capitals) - 1);
        if(!in_array($id, $ids)) {
            $ids[] = $id;
        }
    }

    $questions = [];
    foreach($ids as $id) {
        
        $answers = [];
        $answers[] = $id;
        while(count($answers) < 3) {
            $tmp = rand(0, count($capitals) - 1);
            if(!in_array($tmp, $answers)) {
                $answers[] = $tmp;
            }
        }

        shuffle($answers);

        $questions[] = [
            'question' => $capitals[$id][0],
            'correct_answer' => $id,   
            'answers' => $answers 
        ];
    }

    $_SESSION['questions'] = $questions;

    $_SESSION['game'] = [
        'total_questions' => $total_questions,
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0,
    ];
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card p-5 shadow-lg rounded-4" style="background-color: #f8f9fa;">

                <div class="row text-center mb-4">
                    <div class="col">
                        <h3 class="display-5 text-primary">Jogo das Capitais</h3>
                        <hr class="w-25 mx-auto bg-primary" style="height: 2px;">
                    </div>
                </div>

                <form action="index.php?route=start" method="post">
                    <div class="row justify-content-center mb-4">
                        <div class="col-10 col-md-8">
                            <div class="mb-3">
                                <label for="text_total_questions" class="form-label text-muted fs-5">Número de questões</label>
                                <input type="number" class="form-control form-control-lg text-center" id="text_total_questions" name="text_total_questions" value="10" min="3" max="20">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Iniciar</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    *{
        font-family: "Poppins", sans-serif;

    }
    .container {
        max-width: 1000px;
        text-align: center;
    }

    .card {
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        transition: all 0.3s ease;
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1.25rem;
    }
    .btn-primary:hover {
        transform: scale(1.05);
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    h3.display-5 {
        font-size: 1.8rem;
        font-weight: 600;
    }

    .card hr {
        width: 60px;
        height: 2px;
        background-color: #007bff;
    }

    .text-center {
        text-align: center;
    }
</style>
