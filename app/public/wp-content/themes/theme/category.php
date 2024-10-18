<?php session_start(); ?>
<?php include('bb_include/header.php'); ?>
</head>

<body id="category" >
<div class="conteneur">
    
    <?php include('bb_include/head.php'); ?>
    
    <main>

         <?php if(is_category('10')){ } ?>

        <?php while(have_posts()): the_post(); ?>
            <article>

                        <h1 class=""><?php the_title() ?></h1>
                
      
                        <?php if ( has_post_thumbnail() ) { ?>
                  
                              <?php $imageData = wp_get_attachment_image_src(get_post_thumbnail_id ( $post_ID ), 'large');
                               // attribut src de l'image à la une
                               echo '<img src="'.$imageData[0].'" class="left"/>'; ?>
                            
                        <?php } ?>
                        
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">Lire la suite</a>

            </article>
        <?php endwhile;?> 
        
</main>
    
<?php include('bb_include/footer.php') ?>  
<?php wp_reset_query(); ?>
<?php wp_footer(); ?>
</div>
</body>
</html>