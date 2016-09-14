<?php
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

// eliminate deadlocks, these may move into core at some point but are
// currently ahead of what's formally supported
#$conf['session_inc'] = 'sites/all/modules/ulmus/apdqc/apdqc.session.inc';
#$conf['lock_inc'] = 'sites/all/modules/ulmus/apdqc/apdqc.lock.inc';

// fast 404 to make advagg happy in the event fast 404 is default
// we may do this in the future, right now just make sure the setting is correct
//$conf['404_fast_paths_exclude'] = '/\/(?:styles)\// to /\/(?:styles|advagg_(cs|j)s)\//';
