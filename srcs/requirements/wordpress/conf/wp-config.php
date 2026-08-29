<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wpuser' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wppassword' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'mariadb:3306' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'MIIC<lZ0=}]ao=@TH;}p%bM|Nxs}+e!n7+_jabIAL@F=[mAnOE_{,^TW+]bS<*6U' );
define( 'SECURE_AUTH_KEY',  'd9${3^2o4#L|4.j)[`;O5$gHCo0~xd#J/-V,E~7AT}-;l}X+oNSO1]@`VS&Dzeil' );
define( 'LOGGED_IN_KEY',    '6(jp*onXS+8gSi$NwYWF?v HKeW5`zEJKT&q1QK>k`{<(oIH.QmiX%s*&WcqSpPq' );
define( 'NONCE_KEY',        '< 88~o~9iN]L4O`r7{Zoa/(;sNO(]0#l>^e7U<E_Vx79.*vp,SqNZEWBsZE$Ju~z' );
define( 'AUTH_SALT',        '80x)*hoVYuK3g(@0uE0NwVy.q8^_Jx>8+pZ<yuIl;W *Erjm$:PD5$x)0rJX<K)U' );
define( 'SECURE_AUTH_SALT', 'k:5pTDV;pu}fPn+0N!UBg[4wL,F;cSJ5F<yw^hL?m8hoIM^h?3[h@~S3cIWlc ?[' );
define( 'LOGGED_IN_SALT',   '&Pe(L*oei:RTdObyfwU<s]tIkL%uy?*dwU)e3=[?U^6W+z<R{[w}~0-3t[QZ/;w~' );
define( 'NONCE_SALT',       'CT:]a_g^s>ptqF;J@5ADq>Vv*;uz3Ey9TW5Hq9dgIWuU)lEc_68RKlUWkFIa:< g' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
