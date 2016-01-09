<?php
	function println ($string_message) {
	    $_SERVER['SERVER_PROTOCOL'] ? print "$string_message<br />" : print "$string_message\n";
	}

    $content_file = file_get_contents('assets/content/content.json');
    $content = json_decode($content_file, TRUE);

    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $content['template_title']; ?></title>
    <link type="text/css" href="assets/css/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <div>
            <span><img src="assets/pictures/logo.jpg" alt="icone du site" /></span>
            <span><?php echo $content['template_header']; ?></span>
        </div>
        <nav>
            <ul>
                <li><a href='index.php' title="<?php echo $content['template_nav_home_title']; ?>"><?php echo $content['template_nav_home_text']; ?></a></li>
                <li><a href='?page=menu-choice' title="<?php echo $content['template_nav_choice_title']; ?>"><?php echo $content['template_nav_choice_text']; ?></a></li>                
        <?php 
            if (isset($_SESSION['role']['admin']) && $_SESSION['role']['admin']) { ?>
                <li><a href='?page=add-recipe' title="<?php echo $content['template_nav_recipe_title']; ?>"><?php echo $content['template_nav_recipe_text']; ?></a></li>
        <?php } ?>
        <?php 
            if (empty($_SESSION)) { ?>
                <li><a href='?page=connexion' title="<?php echo $content['template_nav_co_title'] ?>"><?php echo $content['template_nav_co_text'] ?></a></li>
        <?php } else { ?>
                <li><a href='?page=deconnexion' title="<?php echo $content['template_nav_deco_title'] ?>"><?php echo $content['template_nav_deco_text'] ?></a></li>
        <?php } ?>        
            </ul>
        </nav>
    </header>
    <?php 
        if(isset($_GET['page'])){
            switch($_GET['page']){
                case "connexion":
                        if(isset($_GET['treatment']) && $_GET['treatment'] == true){
                            include "3-controller/treatment-connexion.php";
                        }
                        include "2-views/connexion.php";
                    break;
                case "registration":
                        if(isset($_GET['treatment']) && $_GET['treatment'] == true){
                            include "3-controller/treatment-registration.php";
                        } else if(isset($_GET['works']) && $_GET['works'] == true){
                            include "2-views/registration.php";
                        } else {
                            include "2-views/registration.php";
                        }
                    break;  
                case "menu-choice":
                    if(!empty($_SESSION)){
                        include "2-views/menu-choice.php";
                        if(isset($_GET['treatment']) && $_GET['treatment'] == true){
                            include "3-controller/treatment-menu.php";
                        }
                    } else {
                        include "2-views/connexion.php";
                    }
                    break;
                case "show-menu":
                    if(!empty($_SESSION)){
                        include "2-views/show-menu.php";
                    } else {
                        include "2-views/connexion.php";
                    }
                    break;
                case "show-recipe":
                    if(!empty($_SESSION)){
                        include "2-views/show-recipe.php";
                    } else {
                        include "2-views/connexion.php";
                    }
                    break; 
                case "add-recipe":
                    if(!empty($_SESSION)){
                        include "2-views/add-recipe.php";
                            if(isset($_GET['treatment']) && $_GET['treatment'] == true){
                            include "3-controller/treatment-recipe.php";
                        }
                    } else {
                        include "2-views/connexion.php";
                    }
                    break;
                case "deconnexion":
                    include '3-controller/treatment-deconnexion.php';
                    break;
                default:
                    include "2-views/front-page.php";
                    break;
            }
        } else {
            include "2-views/front-page.php";
        }
    ?>
    <footer>
        <p><?php echo $content['template_footer']; ?></p>
    </footer>
</body>
</html>