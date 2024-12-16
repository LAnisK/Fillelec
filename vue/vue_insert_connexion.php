<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillelec - Page de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .input-field:focus {
            border-color: #007bff;
            outline: none;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: block;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="https://via.placeholder.com/100" alt="Logo Fillelec" class="logo">
        <h1>Se connecter à Fillelec</h1>
        <form action="#" method="post">
            <input type="text" class="input-field" placeholder="Nom d'utilisateur" required>
            <input type="password" class="input-field" placeholder="Mot de passe" required>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </div>

</body>
</html>

