<?php

    // database
    $semua_soal = [
        [
            "id" => "1",
            "soal" => "Siapakah Presiden pertama indonesia ? ",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "2",
            "soal" => "Siapakah Orang Terkaya di dunia ?",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "3",
            "soal" => "Berapa Banyak Jumlah Planet di Tata Surya ?",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "4",
            "soal" => "Jurusan manakah yang tidak terdapat di FSM ?",
            "pilihan" => ["Biotek","Fisika","Elektro","Informatika"] 
        ],
        [
            "id" => "5",
            "soal" => "Siapakah Presiden pertama indonesia ? ",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "6",
            "soal" => "Siapakah Presiden pertama indonesia ? ",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "7",
            "soal" => "Siapakah Orang Terkaya di dunia ?",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "8",
            "soal" => "Berapa Banyak Jumlah Planet di Tata Surya ?",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "9",
            "soal" => "Siapakah Presiden pertama indonesia ? ",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ],
        [
            "id" => "10",
            "soal" => "Siapakah Presiden pertama indonesia ? ",
            "pilihan" => ["Jokowi","Soekarno","Trump","Megawati"] 
        ]

    ]



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php 
        // mengecek index mana yang terdapat di super variable global
        $n = sizeof($semua_soal);
        $index = 1;
        for($i = 0;$i < $n;$i++){
            if(isset($_GET[$i])){
                $index = $i;
            }
        }
    ?>
    <section id="template">
        <h4>Soal no <?= $_GET[$index]["id"]?></h4   >
        <h2><?= $_GET[$index]["soal"]?></h2>
        <p>Pilihan Jawaban</p>
        <input type="radio" name="pilihan" value="<?= $_GET[$index]["pilihan"][0] ?>"><?= $_GET[$index]["pilihan"][0] ?></input><br/>
        <input type="radio" name="pilihan" value="<?= $_GET[$index]["pilihan"][1] ?>"><?= $_GET[$index]["pilihan"][1] ?></input><br/>
        <input type="radio" name="pilihan" value="<?= $_GET[$index]["pilihan"][2] ?>"><?= $_GET[$index]["pilihan"][2] ?></input><br/>
        <input type="radio" name="pilihan" value="<?= $_GET[$index]["pilihan"][3] ?>"><?= $_GET[$index]["pilihan"][3] ?></input><br/>   
        <div>
            <?php 
                // membuat URL untuk next index dan previous index
                // increment
                $next_index = $index + 1;
                if($next_index <= 9){
                    // next URL
                    $next = http_build_query(array($next_index => $semua_soal[$next_index]));
                }
                // decrement
                $prev_index = $index - 1;
                if($prev_index >= 0){
                    // previous URL
                    $prev = http_build_query(array($prev_index => $semua_soal[$prev_index]));
                }
            ?>
            <a href="TemplateSoal.php?<?= $prev ?>">prev</a>
            <a href="TemplateSoal.php?<?= $next ?>">next</a>
        </div>
    </section>
    
    <section id="container">
        <h1>Kumpulan Soal</h1>
        <ul>
            <?php
                $counter = 0; 
                $location = 1;
                foreach($semua_soal as $sool) : 
                    // agar dapat memberikan array kedalam URL
                    // dengan memberikan index kedalam url
                    $query = http_build_query(array($counter => $sool));    
                    $counter++;
            ?>
            <li>
                <a href="TemplateSoal.php?<?= $query ?>">
                    nomer soal <?= $sool["id"]; ?>
                </a>
              
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    
</body>
</html>

