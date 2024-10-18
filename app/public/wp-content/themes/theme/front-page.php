<?php session_start(); ?>
<?php include('bb_include/header.php'); ?>
</head>

<body id="home">
    <div class="conteneur">
        
        <!-- Inclure le header -->
        <?php include('bb_include/head.php'); ?>
        
        <main class="main-contenu">
            <!-- Boucle pour les articles -->
            <?php while(have_posts()): the_post(); ?>
                <div class="home_contenu">  
                    
                    <?php
                    $args = array(
                        'post_type' => 'recettes',
                        'posts_per_page' => 5, // Afficher 5 recettes
                    );
                    $query = new WP_Query($args);

                    if($query->have_posts()) : ?>
                        <div class="recettes-container">
                            <!-- Boucle des recettes -->
                            <?php while($query->have_posts()) : $query->the_post(); ?>
                                <div class="recette-card">
                                    <!-- Affichage du titre avant l'image -->
                                    <h2 class="recette-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>

                                    <?php 
                                    // Récupérer l'ID de l'image personnalisée via ACF
                                    $image_id = get_post_meta(get_the_ID(), 'img', true); // Remplace 'img' par le nom de ton champ ACF
                                    $image_url = wp_get_attachment_url($image_id); // Obtenir l'URL de l'image à partir de l'ID
                                    
                                    if ($image_url) : ?>
                                        <div class="recette-image">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="recette-thumbnail">
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Extrait de la recette -->
                                    <p class="recette-excerpt"><?php the_excerpt(); ?></p>
                                    
                                    <!-- Bouton pour voir la recette en détail -->
                                    <a class="recette-button" href="<?php the_permalink(); ?>">Voir la recette</a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p class="no-recipes">Aucune recette trouvée</p>
                    <?php endif; ?>
                    
                    <?php wp_reset_postdata(); // Réinitialiser la requête ?>
                    
                </div>
            <?php endwhile; ?>
        </main>
        
        <!-- Inclure le footer -->
        <?php include('bb_include/footer.php'); ?>  
        
        <!-- Appels aux scripts WordPress -->
        <?php wp_footer(); ?>
        
    </div>
</body>
</html>
