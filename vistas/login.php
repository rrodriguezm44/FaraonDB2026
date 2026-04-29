<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FaraonDb | Login <?php echo date("Y"); ?></title>

  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <style>
  body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    font-family: 'Roboto', sans-serif;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
  }

  .login-container {
    width: 100%;
    max-width: 450px;
    padding: 20px;
  }

  .login-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    padding: 40px;
    backdrop-filter: blur(10px);
  }

  .login-header {
    text-align: center;
    margin-bottom: 40px;
  }

  .login-header h1 {
    color: #667eea;
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    letter-spacing: -1px;
  }

  .login-header p {
    color: #666;
    font-size: 1rem;
    margin-top: 10px;
  }

  .input-field input[type=text]:focus+label,
  .input-field input[type=password]:focus+label {
    color: #667eea !important;
  }

  .input-field input[type=text]:focus,
  .input-field input[type=password]:focus {
    border-bottom: 2px solid #667eea !important;
    box-shadow: 0 1px 0 0 #667eea !important;
  }

  .input-field input[type=text],
  .input-field input[type=password] {
    border-bottom: 2px solid #ddd;
    transition: all 0.3s ease;
  }

  .btn-login {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    width: 100%;
    height: 50px;
    line-height: 50px;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    transition: all 0.3s ease;
    margin-top: 20px;
  }

  .btn-login:hover {
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    transform: translateY(-2px);
  }

  .input-field .prefix {
    color: #667eea;
  }

  .input-field .prefix.active {
    color: #667eea;
  }

  .card-icon {
    font-size: 4rem;
    color: #667eea;
    margin-bottom: 20px;
  }

  /* Validation styles */
  .invalid-feedback {
    color: #f44336;
    font-size: 0.8rem;
    margin-top: 5px;
    display: none;
  }

  .was-validated .invalid-feedback {
    display: block;
  }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <i class="material-icons card-icon">lock_outline</i>
        <h1>FARAON</h1>
        <p>Sistema de Gestión</p>
      </div>

      <form method="post" class="needs-validation-login" novalidate>
        <!-- USUARIO DEL SISTEMA -->
        <div class="input-field">
          <i class="material-icons prefix">person</i>
          <input type="text" id="loginUsuario" name="loginUsuario" required>
          <label for="loginUsuario">Usuario</label>
          <div class="invalid-feedback">Debe ingresar su usuario.</div>
        </div>

        <!-- CONTRASEÑA DEL USUARIO -->
        <div class="input-field">
          <i class="material-icons prefix">lock</i>
          <input type="password" id="loginPassword" name="loginPassword" required>
          <label for="loginPassword">Contraseña</label>
          <div class="invalid-feedback">Debe ingresar su contraseña.</div>
        </div>

        <!-- BOTON INGRESO AL SISTEMA -->
        <?php
        $login = new UsuarioControlador();
        $login->login();
        ?>

        <button type="submit" class="btn btn-login waves-effect waves-light">
          <i class="material-icons left">login</i>
          Iniciar Sesión
        </button>
      </form>
    </div>
  </div>

  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
  // Initialize Materialize components
  document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus on username field
    var usernameField = document.getElementById('loginUsuario');
    if (usernameField) {
      usernameField.focus();
    }
  });
  </script>
</body>

</html>