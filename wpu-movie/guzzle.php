<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
    'query' => [
        'apikey' => '575b7ddf',
        's' => 'transformer'
    ]

]);

$result = json_decode ($response->getBody()->getContents(), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" contents="width=device-width, initial-scale=1.0">
    <meta http-equive="X-UA-Compatible" contents="ie=edge">
    <title>Movie</title>
</head>
<bodt>
    <?php foreach ($result ['Search'] as $movie) : ?>
    <ul>
        <li>Title : <?= $movie['Title']; ?></li>
        <li>Year : <?= $movie['Year']; ?><li>
                <img src= "<?= $movie['Poster']; ?>" width= "80">
            </li>
        </li>
    </ul>
    <?php endforeach; ?>
</body>
</html>

