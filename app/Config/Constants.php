<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
|--------------------------------------------------------------------------
| Composer Path
|--------------------------------------------------------------------------
|
| The path that Composer's autoload file is expected to live. By default,
| the vendor folder is in the Root directory, but you can customize that here.
*/
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Timing Constants
|--------------------------------------------------------------------------
|
| Provide simple ways to work with the myriad of PHP functions that
| require information to be in seconds.
*/
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/* CUSTOM */
include('../../custom_constants.php');

/* MESSAGES */
defined('CONTACTADDED')      || define('CONTACTADDED', 'Le contact a ??t?? ajout??.');
defined('CONTACTUPDATED')      || define('CONTACTUPDATED', 'Le contact a ??t?? modifi??.');
defined('CONTACTDELETED')      || define('CONTACTDELETED', 'Le contact a ??t?? supprim??.');

defined('GALLERYADDED')      || define('GALLERYADDED', 'La galerie a ??t?? cr????.');
defined('GALLERYUPDATED')      || define('GALLERYUPDATED', 'La galerie a ??t?? modifi??e.');
defined('GALLERYDELETED')      || define('GALLERYDELETED', 'La galerie, les photos ainsi que les tags associ??s ont bien ??t?? supprim??s.');

defined('OPTIONSUPDATED')       || define('OPTIONSUPDATED', 'Les options ont bien ??t?? mises ?? jour.');

defined('TAGADDED')      || define('TAGADDED', 'Le tag a ??t?? ajout??.');
defined('TAGDELETED')      || define('TAGDELETED', 'Le tag a ??t?? supprim??.');

defined('VIDEOADDED')      || define('VIDEOADDED', 'La vid??o a ??t?? ajout??e avec succ??s.');
defined('VIDEOUPDATED')      || define('VIDEOUPDATED', 'La vid??o a ??t?? modif??e avec succ??s.');
defined('VIDEODELETED')      || define('VIDEODELETED', 'La vid??o a ??t?? supprim??e avec succ??s.');

defined('SETTINGSPWDACTUALFAIL')      || define('SETTINGSPWDACTUALFAIL', 'Le mot de passe actuel n\'est pas le bon.');
defined('SETTINGSPWDCONFIRMFAIL')      || define('SETTINGSPWDCONFIRMFAIL', 'Les mots de passe ne correspondent pas.');

defined('ERROR')      || define('ERROR', 'Une erreur est survenue : ');
defined('ERROR_AUTH')      || define('ERROR_AUTH', 'Vous n\'??tes pas connect?? ou autoris?? ?? acc??der a cette ressource.');
defined('ERROR_VIDEO')      || define('ERROR_VIDEO', 'Le lien n\'est pas valide.');
defined('ERROR_DEMO')   ||  define('ERROR_DEMO', 'Cette action est impossible en mode d??monstration');

defined('CONTACT_LINKEDIN')     || define('CONTACT_LINKEDIN', 1);
defined('CONTACT_TWITTER')      || define('CONTACT_TWITTER', 2);
defined('CONTACT_FACEBOOK')     || define('CONTACT_FACEBOOK', 3);
defined('CONTACT_EMAIL')        || define('CONTACT_EMAIL', 4);
defined('CONTACT_PHONE')        || define('CONTACT_PHONE', 5);
defined('CONTACT_SNAPCHAT')     || define('CONTACT_SNAPCHAT', 6);
defined('CONTACT_ARTSTATION')   || define('CONTACT_ARTSTATION', 7);
defined('CONTACT_INSTAGRAM')   || define('CONTACT_INSTAGRAM', 8);