<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Coucou les Amis Dev!695.');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9EW9wcpel<r9a%v;BYeN[7kYNSLA .!+Y(Z ^YvT=8Oig9_vu_H 5S,E]`!N0R5i');
define('SECURE_AUTH_KEY',  '@-`RchSP):;4sgkN SX~[AZ%+MAfBoE3r=$KF0x)u^LBCR.dUzS#+w2aw}@n;TGw');
define('LOGGED_IN_KEY',    'OsP^^iZvUx4cV8Z&]6up9$UPRjM3Ne @;rc?595:eUEdi0 -Y*3&uwUxR7*-in*3');
define('NONCE_KEY',        'm.-ZT)H?JGpv<c3L3Zt*#mT7zHM_Fy%=s3W3bkYXk#aY.O2EX[<*7$vRD@>=0tVO');
define('AUTH_SALT',        '*k7M7&@n(^)&jw]8(=op&W~z1X(R+FMJH!MO)}Q$n,P1j5~U`%zxkl)6:81~-*y%');
define('SECURE_AUTH_SALT', '.TBC]_cL+<%?:1<}_[r=$~Q}(@u_`-N:Q|taTY^;JfsGJTJ#x4<6#ou(Napz:,GZ');
define('LOGGED_IN_SALT',   's>?X,C%#qT9tSKb{,WoGf1:429W~~nc1axg:paV+o3^_Ocz@4ovh&[^94pS7E&xf');
define('NONCE_SALT',       'a~={y)Lp{p(%KSyf|,N`YpF+&Yh3PIbE&s+ZFhTCk9`Hnaxi$O?y?r5/PN))Ws_N');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');