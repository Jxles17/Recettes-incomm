<header>
    <a href="<?= esc_url( home_url( '/' ) ); ?>" id="logo" title="<?= get_bloginfo( 'name' ); ?>"></a>

    <div class="site-title">
        <h1><?= get_bloginfo( 'name' ); ?></h1>
    </div>

    <div class="search-bar">
        <?php get_search_form(); ?> <!-- Formulaire de recherche personnalisé -->
    </div>

    <nav id="site-navigation" class="nav" role="navigation">
        <button class="menu-toggle">☰</button>
        <?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav-menu' ) ); ?>
    </nav>
</header>
