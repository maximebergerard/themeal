<?php

$ingredient = !empty($_GET['ingredient']) ? $_GET['ingredient'] : 'Tomato';
$id = !empty($_GET['id']) ? $_GET['id'] : '52772';


// $url = 'https://www.themealdb.com/api/json/v1/1/filter.php?';
// $url2 = 'https://www.themealdb.com/api/json/v1/1/lookup.php?';
$url .= http_build_query(
    [
        'i' => $ingredient
    ]
);

$urls = [
    "https://www.themealdb.com/api/json/v1/1/filter.php?", 
    "https://www.themealdb.com/api/json/v1/1/lookup.php?"
];

foreach ($urls as $_urls) 
{
    $curl = curl_init($_url)
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result);
    echo $_urls;
}
// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// $result = curl_exec($curl);
// curl_close($curl);
// $result = json_decode($result);
// echo '<pre>';
// print_r($url);
// echo '</pre>';




// $rand = rand(0, 5);

// foreach ($result->meals as $key => $_id) 
// {
//     if ($key == $rand) {
//         echo $_id->strMeal;
//         echo $_id->idMeal;
//         $id = $_id->idMeal;
//     }
// }

// $url2 .= http_build_query(
//     [
//         'i' => $id
//     ]
//     );
    
// $curl2 = curl_init($url2);
// curl_setopt($curl2, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, false);
// $result2 = curl_exec($curl2);
// curl_close($curl2);

// $result2 = json_decode($result2);

// echo '<pre>';
// print_r($url2);
// echo '</pre>';

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
        <input type="number" name="id" placeholder="0" >
        <input type="submit">
    </form>

    <h1>Meal with <?= $ingredient; ?></h1>
  
</body>
</html>
