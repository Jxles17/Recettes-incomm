<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="recette-detail">
            <!-- Affichage du titre avant l'image -->
            <h1 class="recette-title"><?php the_title(); ?></h1>
            
            <?php
            // Récupérer l'ID de l'image personnalisée
            $image_id = get_post_meta(get_the_ID(), 'img', true);
            $image_url = wp_get_attachment_url($image_id); // Obtenir l'URL de l'image à partir de l'ID

            if ($image_url) : ?>
                <div class="recette-image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="recette-thumbnail" />
                </div>
            <?php else : ?>
                <p>Aucune image disponible pour cette recette.</p>
            <?php endif; ?>

            <div class="recette-meta">
                <strong>Temps de cuisson : </strong><?php echo get_post_meta(get_the_ID(), 'temps_de_cuisson', true); ?>
            </div>
            <div class="recette-ingredients">
                <h2>Ingrédients</h2>
                <?php echo get_post_meta(get_the_ID(), 'ingredients', true); ?>
            </div>
            <div class="recette-etapes">
                <h2>Étapes</h2>
                <?php echo get_post_meta(get_the_ID(), 'etapes', true); ?>
            </div>

            <!-- Bouton pour revenir à la page d'accueil ou voir d'autres recettes -->
            <a class="recette-button" href="<?php echo esc_url(home_url('/')); ?>">Retour à l'accueil</a>
        </div>
    <?php endwhile;
endif;

get_footer();
?>
