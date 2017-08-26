<?php
// This is the shared settings file which allows you to globally override ELMSLN core
// settings that are applied universally to all systems creates. Use this in order
// to simplify the centralization of settings you want to apply everywhere automatically
// without having to invoke them on every site. Some examples are provided where this is useful.

// fastest way to get tincan integration across the network
// $conf['tincanapi_endpoint'] = '';
// $conf['tincanapi_auth_user'] = '';
// $conf['tincanapi_auth_password'] = '';

// re-enable the legacy zurb foundation components css/js
//$conf['foundation_access_legacy'] = TRUE;
// re-enable the legacy materializecss components css/js
//$conf['materializecss_legacy'] = TRUE;

// you can change this to modify the global profile as to where "people" is
//$conf['elmsln_global_profile'] = 'cis';
// change the bakery authority for all other systems to be CIS instead of CPR / people
//$conf['elmsln_bakery_authority'] = 'cis';
// this prevents users from losing their access if they no longer appear in the section
// which can help with alternate access gaining / removing workflows as well as safe-gaurd
// against bugginess in internal synchronization routines
//$conf['cis_section_strict_access'] = FALSE;

// you might need this section if doing anything with reverse proxies
/*if ( (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')
  || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
  || (isset($_SERVER['HTTP_HTTPS']) && $_SERVER['HTTP_HTTPS'] == 'on')
) {
  $_SERVER['HTTPS'] = 'on';
}*/
// it assumes that the browser has javascript so it can deliver via ajax
// commented out by default because we don't like to assume that unless we have to
#$_COOKIE['has_js'] = TRUE;

# env indicator - useful when working on multiple environments
#$conf['environment_indicator_overwrite'] = TRUE;
#$conf['environment_indicator_overwritten_name'] = 'Dev: Local';
#$conf['environment_indicator_overwritten_color'] = '#42b96a';

// fast 404 to make advagg happy in the event fast 404 is default
// we may do this in the future, right now just make sure the setting is correct
//$conf['404_fast_paths_exclude'] = '/\/(?:styles)\// to /\/(?:styles|advagg_(cs|j)s)\//';
