<?php session_start(); ?>
<?php include('bb_include/header.php'); ?>
</head>

<body id="page" >
    <div class="conteneur">
        
        <?php include('bb_include/head.php'); ?>
        
    <main>


                <article>

                            <h1 class="">Erreur 404</h1>
                            <h2>Page introuvable</h2>
        
                            <p>Cette page n'existe pas, veuillez utiliser le menu principal pour naviguer sur le site.</p>
                            
                        
                        

                </article>
        
            
    </main>
        
    <?php include('bb_include/footer.php') ?>  
    <?php wp_reset_query(); ?>
    <?php wp_footer(); ?>
    </div>
</body>
</html>