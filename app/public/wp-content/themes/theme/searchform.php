<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-bar">
        <input type="search" class="search-input" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" title="Recherche" />
        <button type="submit" class="search-button">Rechercher</button>
    </div>
</form>
