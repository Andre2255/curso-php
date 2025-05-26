<main>
    <section>
        <img src="<?= $poster_url ?>" width="300" alt="Poster de <?= $title ?>"
            style="border-radius: 16px;">
    </section>

    <hgroup>
        <h2>Titulo:
            <?= $title ?>
        </h2>
        <p>
            <?= $until_message ?>
        </p>
        <p>Fecha de estreno:
            <?= $release_date ?>
        </p>
        <p>Detalles:
            <?= $overview ?>
        </p>
        <p>
            La siguente es:
            <?= $following_production ?>
        </p>
    </hgroup>
</main>