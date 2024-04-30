<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/css/style.css" />
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
        <a href="../index.php">
          <img src="../public/img/logo.png" alt="Logo" />
        </a>
      </div>
      <nav class="navigation">
        <ul>
          <li><a href="birthday.php">Aniversariantes</a></li>
          <li><a href="companyBirthDay.php">Aniversariantes de Empresa</a></li>
        </ul>
      </nav>
    </header>
    <div class="table-container">
      <?php
        function getDataFromSheet($apiId, $parameters = []) {
            $url = "https://sheetdb.io/api/v1/" . $apiId;
            
            if (!empty($parameters)) {
                $url .= '?' . http_build_query($parameters);
            }

            $response = file_get_contents($url);
            return json_decode($response, true);
        }

        date_default_timezone_set('America/Sao_Paulo');

        $currentDate = date('d-m');

        $employees = getDataFromSheet("x7msubhu7axc1");

        
        $foundCompanyAnniversaries = false;

        foreach ($employees as $employee) {
            if (!empty($employee["DATA DE SAIDA"])){
                continue;
            }

            $specialDate = date_create_from_format('d/m/Y', $employee["DATA DE ENTRADA"])->format('d-m');

            if ($specialDate == $currentDate) {
               
                $foundCompanyAnniversaries = true;
                
                break;
            }
        }

        
        echo "<table class='content'>";
        echo "<thead>";

        if ($foundCompanyAnniversaries) {
            
            echo "<tr><th colspan='3'><h2>Parabéns pelo Aniversário na Empresa!🎉🎊</h2></th></tr>";
        }

        echo "<tr><th>Nome</th><th>Data</th><th>Tipo</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        if ($foundCompanyAnniversaries) {
            foreach ($employees as $employee) {
                if (!empty($employee["DATA DE SAIDA"])){
                    continue;
                }

                $specialDate = date_create_from_format('d/m/Y', $employee["DATA DE ENTRADA"])->format('d-m');

                if ($specialDate == $currentDate) {
                    echo "<tr>";
                    echo "<td><strong>" . $employee["COLABORADOR"] . "</strong></td>";
                    echo "<td><strong>" . $employee["DATA DE ENTRADA"] . "</strong></td>";
                    echo "<td>Aniversário na Empresa</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<tr><td colspan='3'><h2>Não há aniversariantes de empresa hoje.😔😔</h2></td></tr>";
        }

        echo "</tbody></table>";
      ?>
    </div>
  </body>
</html>
