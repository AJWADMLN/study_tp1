<?php
session_start();

// توليد الرقم العشوائي بين 1 و100 إذا مازال ما تولدش
function getRandomNumber() {
    if (empty($_SESSION['number'])) {
        $_SESSION['number'] = rand(1, 100);
        $_SESSION['attempts'] = 0;
    }
    return $_SESSION['number'];
}


function addAttempt() {
    $_SESSION['attempts'] = ($_SESSION['attempts'] ?? 0) + 1;
    return $_SESSION['attempts'];
}


function verifyGuess($guess) {
    $number = getRandomNumber();
    addAttempt();

    if ($guess < $number) {
        return "Too low!";
    } elseif ($guess > $number) {
        return "Too high!";
    } else {
        $attempts = $_SESSION['attempts'];
        session_destroy(); // نرجعو اللعبة من الأول منين يربح
        return "🎉 Correct! You guessed it in $attempts attempts.";
    }
}
?>
