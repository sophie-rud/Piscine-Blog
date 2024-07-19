<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>


<?php require_once('../template/partial/header.html.twig'); ?>

    <main>

        <h1>Le super blog de la piscine</h1>

        <section id="articles">

            <?php foreach($articles as $article) { ?>

                <article class="articleBlog">
                    <h2> <?php echo $article['titre']; ?> </h2>
                    <div class="actionButtons">
                        <a href="http://localhost/piscine-blog/public/show-article?id=<?php echo $article['id_article']; ?>" >Afficher l'article</a>
                        <a href="http://localhost/piscine-blog/public/delete-article?id=<?php echo $article['id_article']; ?>" >Supprimer l'article</a>

                    </div>

                    <!-- <p> <?php echo $article['content']; ?> </p> -->
                    <!-- <p class="fontDate"> <?php echo $article['created_at'] ?> </p> -->
                </article>

            <?php } ?>

        </section>
        
    </main>

<?php require_once('../template/partial/footer.html.twig'); ?>

