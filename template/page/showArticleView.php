<?php require_once ('../template/partial/header.php'); ?>

    <main>

        <h1>Le super blog</h1>

        <article>
            <!-- On affiche le titre correspondant à l'id recherché -->
            <h2> <?php echo $article['titre'] ?> </h2>
            <p> <?php echo $article['content']; ?> </p>
            <p class="fontDate"> <?php echo $article['created_at'] ?> </p>

        </article>

    </main>

<?php require_once ('../template/partial/footer.php'); ?>
