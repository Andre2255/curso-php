<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Desactiva la verificación SSL
$result = curl_exec($ch);

// Verificar si hubo un error en la solicitud
if ($result === false) {
    echo "Error en la solicitud cURL: " . curl_error($ch);
} else {
    // Intentar decodificar el JSON
    $data = json_decode($result, true);

    // Comprobar si la decodificación fue exitosa
    if (json_last_error() === JSON_ERROR_NONE) {
        //mOstrar los datos obtenidos
        //echo json_encode($data, JSON_PRETTY_PRINT);
    } else {
        echo "Error al decodificar el JSON: " . json_last_error_msg();
    }
}

curl_close($ch);
?>

<head>
    <title>
        La próxima película de Marvel
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"] ?>" width="300" alt="Poster de <?= $data["title"] ?>"
            style="border-radius: 16px;">
    </section>

    <hgroup>
        <h2>Titulo:
            <?= $data["title"] ?>
        </h2>
        <p>
            Se estrena en: <?= $data["days_until"] ?> días
        </p>
        <p>Fecha de estreno:
            <?= $data["release_date"] ?>
        </p>
        <p>Detalles:
            <?= $data["overview"] ?>
        </p>
        <p>
            La siguente es: 
            <?= $data["following_production"] ["title"]?>
        </p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        place-content: center;
    }
    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin: 0 auto;
    }
</style>