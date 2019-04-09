<?php

$ingredient = !empty($_GET['ingredient']) ? $_GET['ingredient'] : 'Tomato';


$url = 'https://www.themealdb.com/api/json/v1/1/filter.php?';
$url .= http_build_query(
    [
        'i' => $ingredient
    ]
);
// $url2 = 'https://www.themealdb.com/api/json/v1/1/search.php?'
// $url2 .= http_build_query(
//     [
//         's' => $name
//     ]
// )

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result);
echo '<pre>';
print_r($url);
echo '</pre>';

$rand = rand(0, 5);
echo $rand;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TheMeal</title>
</head>
<body>
    <form action="#" method="get">
        <input type="text" name="ingredient" placeholder="Tomato" >
        <input type="submit">
    </form>

    <h1>Meal with <?= $ingredient; ?></h1>
    <?php foreach ($result->meals as $key => $_name): ?>
        <?php if($key == $rand): ?> 
            <div>Nom de la recette: <?= $_name->strMeal ?></div>
        <?php endif ?>
    <?php endforeach; ?>
  
</body>
</html>
