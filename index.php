<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>DesafioCarefy</title>
  </head>
  <body>
    <header class="header">
      <div class="logo-container">
        <a href="index.php">
          <img src="public/img/logo.png" alt="Logo" />
        </a>
      </div>
      <nav class="navigation">
        <ul>
          <li><a href="src/birthday.php">Aniversariantes
          </a></li>
          <li><a href="src/companyBirthDay.php">Aniversariantes de Empresa</a></li>
        </ul>
      </nav>
    </header>
    <div class="table-container">
      <h2>Colaboradores:</h2>
      <table class="content">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Data de Entrada</th>
          </tr>
        </thead>
        <tbody>
          <?php include 'src/data.php'; ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
