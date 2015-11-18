<?php

// Allow RestWS calls to pass through on bakery installs, otherwise webservices
// reroute looking for the bakery login cookie and fail.
// If bakery isn't installed this does nothing and can be ignored.
if (isset($conf['restws_basic_auth_user_regex'])) {
  $conf['bakery_is_master'] = TRUE;
}

// httprl setting to avoid really long timeouts
$conf['httprl_install_lock_time'] = 1;
// make authcache happy with the safer controller if we're using it
$conf['authcache_p13n_frontcontroller_path'] = 'authcache.php';
/*
// CDN support through automatic variable generation
$tmp = explode('.', $base_url);
if (isset($tmp[0])) {
  $stack = str_replace('https://', '', str_replace('http://', '', $tmp[0]));
  $conf['cdn_status'] = 2;
  $tmp2 = explode('/', $base_url);  $tmpbase = $tmp2[2];
  $conf['cdn_basic_mapping'] = $tmp2[0] . '//' . str_replace($stack, 'cdn1', $tmpbase) . '/' . $stack  . "\n";  $conf['cdn_basic_mapping'] .= $tmp2[0] . '//' . str_replace($stack, 'cdn2', $tmpbase) . '/' . $stack  . "\n"; 
  $conf['cdn_basic_mapping'] .= $tmp2[0] . '//' . str_replace($stack, 'cdn3', $tmpbase) . '/' . $stack  . "\n"; 
  $conf['cdn_basic_mapping_https'] = str_replace('http://', 'https://', $conf['cdn_basic_mapping']);
}
 */
// you might need this section if doing anything with reverse proxies
/*if ( (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')
  || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
  || (isset($_SERVER['HTTP_HTTPS']) && $_SERVER['HTTP_HTTPS'] == 'on')
) {
  $_SERVER['HTTPS'] = 'on';
}*/
// you might need to set this for varnish and authcache to be happy
// it assumes that the browser has javascript so it can deliver via ajax
// commented out by default because we don't like to assume that unless we have to
#$_COOKIE['has_js'] = TRUE;

# env indicator - useful when working on multiple environments
#$conf['environment_indicator_overwrite'] = TRUE;
#$conf['environment_indicator_overwritten_name'] = 'Dev: Local';
#$conf['environment_indicator_overwritten_color'] = '#42b96a';
# APC cache backend
# Comment this back in for apc super fast support, not all systems support this

#$conf['apc_show_debug'] = TRUE;
$conf['cache_backends'][] = 'sites/all/modules/ulmus/apdqc/apdqc.cache.inc';
#$conf['cache_backends'][] = 'sites/all/modules/ulmus/apc/drupal_apc_cache.inc';
$conf['cache_backends'][] = 'sites/all/modules/ulmus/authcache/authcache.cache.inc';
$conf['cache_backends'][] = 'sites/all/modules/ulmus/authcache/modules/authcache_builtin/authcache_builtin.cache.inc';

#$conf['session_inc'] = 'sites/all/modules/ulmus/apdqc/apdqc.session.inc';
#$conf['lock_inc'] = 'sites/all/modules/ulmus/apdqc/apdqc.lock.inc';
/*
# APC as default, so these can be commented out
$conf['cache_class_cache'] = 'DrupalAPCCache';
$conf['cache_class_cache_admin_menu'] = 'DrupalAPCCache';
$conf['cache_class_cache_block'] = 'DrupalAPCCache';
$conf['cache_class_cache_bootstrap'] = 'DrupalAPCCache';
$conf['cache_class_cache_entity_file'] = 'DrupalAPCCache';
$conf['cache_class_cache_entity_og_membership'] = 'DrupalAPCCache';
$conf['cache_class_cache_entity_og_membership_type'] = 'DrupalAPCCache';
$conf['cache_class_cache_field'] = 'DrupalAPCCache';
$conf['cache_class_cache_menu'] = 'DrupalAPCCache';
$conf['cache_class_cache_libraries'] = 'DrupalAPCCache';
$conf['cache_class_cache_token'] = 'DrupalAPCCache';
$conf['cache_class_cache_views'] = 'DrupalAPCCache';
$conf['cache_class_cache_path_breadcrumbs'] = 'DrupalAPCCache';
$conf['cache_class_cache_path'] = 'DrupalAPCCache';
$conf['cache_class_cache_book'] = 'DrupalAPCCache';
*/
# Default DB for the ones that change too frequently and are small
$conf['cache_default_class']    = 'APDQCache';
# THIS MUST BE SERVED FROM DB FOR STABILITY
$conf['cache_class_cache_cis_connector'] = 'APDQCache';
$conf['cache_class_cache_form'] = 'APDQCache';

// this is assuming all databases using this file operate off of default
// this should always be true of ELMSLN connected systems but just be aware
// of this in case your doing any prefixing or crazy stuff like connecting to
// multiple databases
$databases['default']['default']['init_commands']['isolation'] = "SET SESSION tx_isolation='READ-COMMITTED'";
$databases['default']['default']['init_commands']['lock_wait_timeout'] = "SET SESSION innodb_lock_wait_timeout = 20";
$databases['default']['default']['init_commands']['wait_timeout'] = "SET SESSION wait_timeout = 600";

// fast 404 to make advagg happy in the event fast 404 is default
// we may do this in the future, right now just make sure the setting is correct
//$conf['404_fast_paths_exclude'] = '/\/(?:styles)\// to /\/(?:styles|advagg_(cs|j)s)\//';
