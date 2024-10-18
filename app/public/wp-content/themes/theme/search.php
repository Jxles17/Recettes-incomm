<?php
get_header(); // Inclure le header du thème
?>

<main class="site-main">
    <h1>Résultats de recherche pour : <?php echo get_search_query(); ?></h1>

    <?php if (have_posts()) : ?>
        <ul class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-result-item">
                    <a href="<?php the_permalink(); ?>">
                        <h2><?php the_title(); ?></h2>
                    </a>
                    <p><?php the_excerpt(); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>

        <!-- Pagination si nécessaire -->
        <div class="pagination">
            <?php
            // Afficher la pagination si il y a plus de résultats
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Précédent', 'textdomain' ),
                'next_text' => __( 'Suivant', 'textdomain' ),
            ) );
            ?>
        </div>

    <?php else : ?>
        <p>Aucun résultat trouvé pour votre recherche.</p>
    <?php endif; ?>
</main>

<?php
get_footer(); // Inclure le footer du thème
?>
