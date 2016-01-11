<body>
    <header>
        <div>
            <span><img src="assets/pictures/logo.jpg" alt="icone du site" /></span>
            <span><?php echo $content['template_header']; ?></span>
        </div>
        <nav>
            <ul>
                <!-- Bouton accueil -->
                <li><a href='?page=home' title="<?php echo $content['template_nav_home_title']; ?>"><?php echo $content['template_nav_home_text']; ?></a></li>
                <!-- Bouton Menu -->
        <?php 
            if (isset($userPermissions['menu'])) { ?>
                <li><a href='?page=menu' title="<?php echo $content['template_nav_menu_title']; ?>"><?php echo $content['template_nav_menu_text']; ?></a></li>
        <?php } ?>
                <!-- Bouton recettes -->
        <?php 
            if (isset($userPermissions['managerecipes'])) { ?>
                <li><a href='?page=managerecipes' title="<?php echo $content['template_nav_recipe_title']; ?>"><?php echo $content['template_nav_recipe_text']; ?></a></li>
        <?php } ?>
                <!-- Bouton utilisateurs -->
        <?php 
            if (isset($userPermissions['manageusers'])) { ?>
                <li><a href='?page=manageusers' title="<?php echo $content['template_nav_users_title']; ?>"><?php echo $content['template_nav_users_text']; ?></a></li>
        <?php } ?>
                <!-- Bouton Profil -->
        <?php 
            if (isset($userPermissions['profil'])) { ?>
                <li><a href='?page=profil' title="<?php echo $content['template_nav_profil_title']; ?>"><?php echo $content['template_nav_profil_text']; ?></a></li>
        <?php } ?>
                <!-- Bouton De/Co/nnexion -->
        <?php 
            if (!isset($_SESSION['id'])) { ?>
                <li><a href='?page=connexion' title="<?php echo $content['template_nav_co_title'] ?>"><?php echo $content['template_nav_co_text'] ?></a></li>
        <?php } else { ?>
                <li><a href='?page=deconnexion' title="<?php echo $content['template_nav_deco_title'] ?>"><?php echo $content['template_nav_deco_text'] ?></a></li>
        <?php } ?>        
            </ul>
        </nav>
    </header>