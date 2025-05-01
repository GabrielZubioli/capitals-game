<?php
session_start();
$_SESSION['game']['hint_used'] = true;
echo json_encode(['status' => 'ok']);
?>
