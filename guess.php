<?php
include 'function.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guess = intval($_POST['guess'] ?? 0);
    $message = verifyGuess($guess);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu de Devinette</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ABE2, #5563DE);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            text-align: center;
            width: 320px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 10px;
            width: 100px;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            margin-top: 15px;
            background: #5563DE;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #3b49b4;
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
            color: #222;
        }

        .restart {
            display: inline-block;
            margin-top: 15px;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .restart:hover {
            background: #3e8e41;
        }
    </style>
</head>
<body>

<div class="container">
    <h2> خمن الرقم بين 1 و 100</h2>

    <form method="POST">
        <input type="number" name="guess" min="1" max="100" required>
        <br>
        <button type="submit">تخمين</button>
    </form>

    <div class="message">
        <?php if (!empty($message)) echo htmlspecialchars($message); ?>
    </div>

    <?php if (strpos($message, 'Correct!') !== false): ?>
        <a href="guess.php" class="restart">إعادة اللعب</a>
    <?php endif; ?>
</div>

</body>
</html>
