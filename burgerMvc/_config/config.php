<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);


// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();


// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Paths
//define('PATH_REQUIRE', substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // Pour fonctions d'inclusion php

//define('PATH', substr($_SERVER['PHP_SELF'], 0, -9)); // Pour images, fichiers etc (html)

// Website informations
define('WEBSITE_TITLE', 'Burger Code');
define('WEBSITE_NAME', 'Burger Code');
define('WEBSITE_URL', 'https://monsite.com');
define('WEBSITE_ROOT', $_SERVER["DOCUMENT_ROOT"] . '/burgerMvc/');
//define('WEBSITE_DESCRIPTION', 'Ici on vend des burgers');
//define('WEBSITE_KEYWORDS', 'Burger Vente');
//define('WEBSITE_LANGUAGE', '');
//define('WEBSITE_AUTHOR', 'Udemy');
//define('WEBSITE_AUTHOR_MAIL', 'U@U.fr');

// Facebook Open Graph tags
//define('WEBSITE_FACEBOOK_NAME', 'Udemy');
//define('WEBSITE_FACEBOOK_DESCRIPTION', 'Udemy site de cours en ligne');
//define('WEBSITE_FACEBOOK_URL', 'https://www.facebook.com/udemy
// ');


// DataBase informations
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'burger_code');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'Coucou les Amis Dev!695.');


//LANGUAGE
//define('DEFAULT_LANGUAGE', 'fr');
