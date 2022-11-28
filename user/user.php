<?php
session_start();
if (empty($_SESSION["user"]) || !isset($_SESSION["user"])) {
    header('Location: ../connexion/connexion.php');
}
require "cobdd.php";


$height = $_SESSION['user']['height'] * 0.01;
$weight = $_SESSION['user']['weight'];
$imc = number_format($weight / ($height * $height), 1, ',');

$currentdate = date('Y-m-d');
$date7 = date('Y-m-d', strtotime($currentdate . '- 7 days'));
$date6 = date('Y-m-d', strtotime($currentdate . '- 6 days'));
$date5 = date('Y-m-d', strtotime($currentdate . '- 5 days'));
$date4 = date('Y-m-d', strtotime($currentdate . '- 4 days'));
$date3 = date('Y-m-d', strtotime($currentdate . '- 3 days'));
$date2 = date('Y-m-d', strtotime($currentdate . '- 2 days'));
$date1 = date('Y-m-d', strtotime($currentdate . '- 1 days'));

// === calorie du jour
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $currentdate);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats0 = $query->fetchAll();
if (empty($resultats0)) {
    $calorie = 0;
    // echo $calorie . " ";
} else {
    $calorie = $resultats0[0]['calorie'];
    // echo $calorie . " ";
}


// === calorie j-1
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $date1);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats1 = $query->fetchAll();
if (empty($resultats1)) {
    $calorie1 = 0;
    // echo $calorie1 . " ";
} else {
    $calorie1 = $resultats1[0]['calorie'];
    // echo $calorie1 . " ";
}


// === calorie j-2
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $date2);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats2 = $query->fetchAll();
if (empty($resultats2)) {
    $calorie2 = 0;
    // echo $calorie2 . " ";
} else {
    $calorie2 = $resultats2[0]['calorie'];
    // echo $calorie2 . "  ";
}


// === calorie j-3
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $date3);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats3 = $query->fetchAll();
if (empty($resultats3)) {
    $calori3 = 0;
    // echo $calorie;
} else {
    $calorie3 = $resultats3[0]['calorie'];
    // echo $calorie;
}


// === calorie j-4
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $currentdate);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats4 = $query->fetchAll();
if (empty($resultats4)) {
    $calorie4 = 0;
    // echo $calorie;
} else {
    $calorie4 = $resultats4[0]['calorie'];
    // echo $calorie;
}


// === calorie j-5
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $currentdate);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats5 = $query->fetchAll();
if (empty($resultats5)) {
    $calorie5 = 0;
    // echo $calorie;
} else {
    $calorie5 = $resultats5[0]['calorie'];
    // echo $calorie;
}


// === calorie j-6
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $currentdate);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats6 = $query->fetchAll();
if (empty($resultats6)) {
    $calorie6 = 0;
    // echo $calorie;
} else {
    $calorie6 = $resultats6[0]['calorie'];
    // echo $calorie;
}


// === calorie j-7
$sql = "SELECT * FROM `calorie` WHERE `date` =:date AND `emailuser`= :emailuser";
$query = $db->prepare($sql);
$query->bindParam(':date', $currentdate);
$query->bindParam(':emailuser', $_SESSION["user"]["email"]);
$query->execute();
$resultats7 = $query->fetchAll();
if (empty($resultats7)) {
    $calorie7 = 0;
    // echo $calorie;
} else {
    $calorie7 = $resultats7[0]['calorie'];
    // echo $calorie;
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mon compte</title>
</head>

<body>
    <h1>
        bonjour <?= $_SESSION['user']['username']; ?>
    </h1>
    <p> votre imc est de <?php echo $imc ?> </p>
    <a href="../deconnexion.php">Deconnexion</a>

    <form action="userupdate.php" method="post">
        <div>
            <p>votre taille actuelle est de <?= $_SESSION['user']['height'] ?> cm</p>
            <input type="text" placeholder="Taille en cm" name="height" pattern="[0-9]{3}" autocomplete="off">
        </div>
        <div>
            <p>votre poids actuel est de <?= $_SESSION['user']['weight'] ?> kg</p>
            <input type="text" placeholder="Poids en kg" name="weight" pattern="[0-9]{2-3}" autocomplete="off">
        </div>
        <button type="submit" name="submit">Valider</button>
    </form>
    <div>
        <div>
            <form action="calorieupdate.php" method="POST">
                <div>
                    <input type="date" name="date" id="date" <?= 'min="' . $date7 . '"' ?> <?= 'max="' . $currentdate . '"' ?> <?= 'value="' . $_SESSION['calorie']['date'] . '"' ?>>
                </div>
                <div>
                    <p>le nombre de calorie actuel est de <?= $_SESSION['calorie']['calorie'] ?></p>
                </div>
                <div>
                    <input type="text" name="calorie" id="calorie" placeholder="ajouter les calories">
                </div>
                <div>
                    <button type="submit" name="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <div class="graph">
        <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

        <script>
            const barCanvas = document.getElementById("barCanvas");

            let chartColors = {
                green: 'rgb(93, 226, 17)',
                red: 'rgb(255, 99, 132)',
            };

            let ctx = document.getElementById("barCanvas").getContext("2d");
            const barChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: [jour1],
                    datasets: [{
                        label: "Total de Calories",
                        backgroundColor: [
                            chartColors.green,
                        ],
                        data: [800, 1400, 3200, 700, 500, 2000, 4200, 2500],
                    }],
                },
                options: {
                    elements: {
                        // changer la couleur du block
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: "Ta consommation de calories des 7 derniers jours",
                            color: "#FF8845",
                            font: {
                                size: 18,
                            }
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                // changer la couleur du texte
                                color: "#FF8845",
                                // changer la taille de la police
                                font: {
                                    size: 16,
                                }
                            }
                        },
                        x: {
                            ticks: {
                                color: "#FF8845",
                                font: {
                                    size: 16,
                                }
                            }
                        }
                    }
                }
            });

            let colorChangeValue = 3200; //set this to whatever is the deciding color change value
            let dataset = barChart.data.datasets[0];
            for (var i = 0; i < dataset.data.length; i++) {
                if (dataset.data[i] > colorChangeValue) {
                    dataset.backgroundColor[i] = chartColors.red;
                }
            }
            barChart.update();
        </script>
    </div>
</body>

</html>