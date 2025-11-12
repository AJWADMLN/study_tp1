<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Jeu de Devinette (AJAX)</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #8EC5FC, #E0C3FC);
      text-align: center;
      padding-top: 100px;
    }

    .container {
      background: white;
      padding: 25px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      display: inline-block;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    input {
      padding: 10px;
      font-size: 18px;
      width: 120px;
      border-radius: 8px;
      border: 1px solid #ccc;
      text-align: center;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      background: #6C63FF;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-left: 10px;
    }

    button:hover {
      background: #5848c2;
    }

    .message {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2> خمن الرقم بين 1 و 100</h2>

    <form id="guessForm">
      <input type="number" id="guess" name="guess" min="1" max="100" required>
      <button type="submit">تخمين</button>
    </form>

    <div class="message" id="message"></div>
  </div>

  <script>
    const form = document.getElementById("guessForm");
    const messageDiv = document.getElementById("message");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      const response = await fetch("function.php", {
        method: "POST",
        body: formData
      });

      const result = await response.json();
      messageDiv.textContent = result.message;
    });
  </script>

</body>
</html>
