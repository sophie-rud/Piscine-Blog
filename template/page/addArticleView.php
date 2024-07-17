<?php require_once ('../template/partial/header.php');?>

<main>

    <h2>Ajouter un article</h2>


    <form method="post">

        <label> Titre
            <input type="text" id="titre" name="titre" />
        </label>

        <label> Contenu
                <input type="text" id="content" name="content" />
        </label>

        <input type="submit"/>

    </form>



    <?php if($isRequestOk) { ?>

        <p class="messageOk">L'article a bien été enregistré en BDD</p>

    <?php } ?>

</main>


<?php require_once ('../template/partial/footer.php');?>
