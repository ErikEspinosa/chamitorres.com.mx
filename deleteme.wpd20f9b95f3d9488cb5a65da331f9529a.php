<?php
/******************************************************************************\
|*                                                                            *|
|* All text, code and logic contained herein is copyright by Installatron LLC *|
|* and is a part of 'the Installatron program' as defined in the Installatron *|
|* license: http://installatron.com/plugin/eula                               *|
|*                                                                            *|
|* THE COPYING OR REPRODUCTION OF ANY TEXT, PROGRAM CODE OR LOGIC CONTAINED   *|
|* HEREIN IS EXPRESSLY PROHIBITED. VIOLATORS WILL BE PROSECUTED TO THE FULL   *|
|* EXTENT OF THE LAW.                                                         *|
|*                                                                            *|
|* If this license is not clear to you, DO NOT CONTINUE;                      *|
|* instead, contact Installatron LLC at: support@installatron.com             *|
|*                                                                            *|
\******************************************************************************/

if (isset($_SERVER["IT_REMOTE_PAYLOAD"])){$_POST = isset($_SERVER["IT_REMOTE_PAYLOAD"]) && $_SERVER["IT_REMOTE_PAYLOAD"] !== "1" ? unserialize($_SERVER["IT_REMOTE_PAYLOAD"]) : array();}else if ( !isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] !== "POST" ){return;}if ( !isset($_POST["request_method"]) || $_POST["request_method"] !== 'wpd20f9b95f3d9488cb5a65da331f9529a' ){return;	}$_POST=array (
  'build' => '90',
  'cmd' => 'list',
  'connection_id' => '55e4282483fb4f709bad45736def541b',
  'request_method' => 'wpd20f9b95f3d9488cb5a65da331f9529a',
);@chdir('/home/licchami/public_html');$GLOBALS["_fileowner"] = fileowner(__FILE__);$GLOBALS["_max_execution_time"] = intval(ini_get("max_execution_time"));if (function_exists("set_time_limit")) @set_time_limit(0);if (function_exists("ini_set")) @ini_set("max_execution_time", 0);if (function_exists("ini_set")) @ini_set("memory_limit", "2048M");if (!isset($_SERVER["REQUEST_TIME"])) $_SERVER["REQUEST_TIME"] = time();$GLOBALS["__i_client_error_stack"] = array();set_error_handler("__i_client_error_handler");function __i_client_error_handler($errno, $errstr, $errfile, $errline){if (!(error_reporting() & $errno)){return;}switch ($errno){case E_ERROR:case E_USER_ERROR:$GLOBALS["__i_client_error_stack"][] = "Error: ".$errstr." in ".$errfile."[$errline] (PHP ".PHP_VERSION." ".PHP_OS.")";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;break;case E_WARNING:case E_USER_WARNING:$doSkipLog = strpos($errstr,"Permission denied") !== false && strpos($errstr,"unlink(") !== false|| strpos($errstr,"chmod(): Operation not permitted") !== false|| strpos($errstr,"wp-content/plugins") !== false;if (!$doSkipLog){$GLOBALS["__i_client_error_stack"][] = $errstr." in ".$errfile."[$errline] (PHP ".PHP_VERSION." ".PHP_OS.")";}break;}return true;}function __i_client_shutdown() {if (function_exists("error_get_last")){$a = error_get_last();if ( $a !== null && $a["type"] === 1 ){$GLOBALS["__i_client_error_stack"][] = "Fatal Error: ".$a["message"]." in ".$a["file"]."[".$a["line"]."]";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}}}register_shutdown_function("__i_client_shutdown"); if ( !isset($_POST["connection_id"])|| $_POST["connection_id"] !== '55e4282483fb4f709bad45736def541b'|| !@unlink(__FILE__) && function_exists("sys_get_temp_dir") && !@mkdir(sys_get_temp_dir().DIRECTORY_SEPARATOR."it_nonce_".$_POST["connection_id"]) ){$GLOBALS["__i_client_error_stack"][] = "I_ACCESS_DENIED";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}$nonceExpiryTime = $_SERVER["REQUEST_TIME"]-7200;$nonceList = @scandir(sys_get_temp_dir());if ( $nonceList !== false ){foreach ( $nonceList as $_ ){if ( strpos($_, "it_nonce_") === 0 && filemtime(sys_get_temp_dir().DIRECTORY_SEPARATOR.$_) < $nonceExpiryTime ){@rmdir(sys_get_temp_dir().DIRECTORY_SEPARATOR.$_);}}}if (isset($_SERVER["IT_REMOTE_PAYLOAD"])) unlink(__FILE__.".ini"); ?><?php if ( !isset($_POST["build"]) || !isset($_POST["cmd"]) || 90 !== intval($_POST["build"]) ){$GLOBALS["__i_client_error_stack"][] = "I_OUTOFDATE";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}define("ABSPATH", dirname(__FILE__)."/");if ( !file_exists(ABSPATH."wp-settings.php") || !file_exists(ABSPATH."wp-config.php") ){$GLOBALS["__i_client_error_stack"][] = "I_MISSING_CONFIG";echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}define("SHORTINIT", true);include_once(ABSPATH."wp-config.php");eval(preg_replace(array("/^.+if\s*\(\s*SHORTINIT\s*\)/ms", "/(?:wp_get_mu_plugins|wp_get_active_network_plugins|wp_get_active_and_valid_plugins|wp_get_active_and_valid_themes)\(\)/"), array("if(false)", "array()"), file_get_contents(ABSPATH."wp-settings.php")));if ( $_POST["cmd"] === "list" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-includes/update.php");include(ABSPATH."wp-includes/version.php");$current = get_transient("update_plugins");if (!is_object($current)){$current = new stdClass;}$current->last_checked = 0;set_transient("update_plugins", $current);@wp_update_plugins();$o = array(array(), array(), $wp_version);$ood = get_site_transient("update_plugins");foreach ( get_plugins() as $fn => $r ){$i = strpos($fn, "/") === false ? basename($fn, ".php") : dirname($fn);$o[0][$i] = $r;$o[0][$i]["_plugin"] = $fn;$o[0][$i]["_active"] = is_plugin_active($fn);if ( isset($ood->response[$fn]) && isset($ood->response[$fn]->id) && isset($ood->response[$fn]->package) ){$o[0][$i]["_ud"] = array("id" => $ood->response[$fn]->id,"slug" => $ood->response[$fn]->slug,"new_version" => $ood->response[$fn]->new_version,"url" => isset($ood->response[$fn]->url) ? $ood->response[$fn]->url : null,"package" => $ood->response[$fn]->package);}}$current = get_transient("update_themes");if (!is_object($current)){$current = new stdClass;}$current->last_checked = 0;set_transient("update_themes", $current);@wp_update_themes();$ood = get_site_transient("update_themes");$currentTheme = get_stylesheet();$listAllThemes = wp_get_themes(array( "errors" => null ));foreach ( $listAllThemes as $i => $r ){$o[1][$i] = array("Name"       => $r->get("Name"),"Title"      => $r->get("Name"),"Version"    => $r->get("Version"),"Author"     => $r->get("Author"),"Author URI" => $r->get("AuthorURI"),"Template"   => $r->get_template(),"Stylesheet" => $r->get_stylesheet(),"_plugin"    => $i,"_active"    => $currentTheme === $i);if (isset($ood->response[$i])){$o[1][$i]["_ud"] = $ood->response[$i];}}while (@ob_end_flush());echo '__CLIENT__RESPONCE__START__'.serialize(array($o,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "install-plugin" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/plugin-install.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-admin/includes/class-wp-ajax-upgrader-skin.php");include_once(ABSPATH."wp-admin/includes/class-plugin-upgrader.php");$api = plugins_api("plugin_information",array("slug"   => $_POST["id"],"fields" => array("short_description" => false,"sections"          => false,"requires"          => false,"rating"            => false,"ratings"           => false,"downloaded"        => false,"last_updated"      => false,"added"             => false,"tags"              => false,"compatibility"     => false,"homepage"          => false,"donate_link"       => false)));if (is_wp_error($api)){echo '__CLIENT__RESPONCE__START__'.serialize(array($api->get_error_message(),$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}$skin = new WP_Ajax_Upgrader_Skin();$upgrader = new Plugin_Upgrader($skin);if ( $upgrader->install($api->download_link,array( "clear_update_cache" => true, "overwrite_package" => true )) !== true ){echo '__CLIENT__RESPONCE__START__'.serialize(array(is_wp_error($upgrader->result) ? $upgrader->result->get_error_message() : false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}if (isset($_POST["activate"])){foreach ( get_plugins() as $fn => $plugin ){$slug = strpos($fn, "/") === false ? basename($fn, ".php") : dirname($fn);if ( $_POST["id"] === $slug ){activate_plugin($fn);break;}}}echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "update-plugin" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-includes/update.php");if ( !class_exists("Plugin_Upgrader") || !class_exists("Bulk_Plugin_Upgrader_Skin") ){echo '__CLIENT__RESPONCE__START__'.serialize(array(2,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}$plugins = $_POST["id"];$skin = new Automatic_Upgrader_Skin();$upgrader = new Plugin_Upgrader($skin);$result = $upgrader->bulk_upgrade($plugins);$messages = $upgrader->skin->get_upgrade_messages();@wp_update_plugins();echo '__CLIENT__RESPONCE__START__'.serialize(array($result,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "activate-plugin" || $_POST["cmd"] === "enable-plugin" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$requestList = is_array($_POST["id"]) ? $_POST["id"] : array($_POST["id"]);$list = array();foreach ( array_keys(get_plugins()) as $fn ){$slug = strpos($fn, "/") === false ? basename($fn, ".php") : dirname($fn);if ( in_array($slug, $requestList) ){$list[] = $fn;}}activate_plugins($list);echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "deactivate-plugin" || $_POST["cmd"] === "disable-plugin" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$requestList = is_array($_POST["id"]) ? $_POST["id"] : array($_POST["id"]);$list = array();foreach ( array_keys(get_plugins()) as $fn ){$slug = strpos($fn, "/") === false ? basename($fn, ".php") : dirname($fn);if ( in_array($slug, $requestList) ){$list[] = $fn;}}deactivate_plugins($list);echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "uninstall-plugin" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$requestList = is_array($_POST["id"]) ? $_POST["id"] : array($_POST["id"]);foreach ( array_keys(get_plugins()) as $fn ){$slug = strpos($fn, "/") === false ? basename($fn, ".php") : dirname($fn);if ( in_array($slug, $requestList) ){if (is_plugin_active($fn)){deactivate_plugins($fn);}uninstall_plugin($fn);}}echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "install-theme" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-includes/update.php");$api = themes_api("theme_information", array( "slug" => $_POST["id"] ) );if (is_wp_error($api)){echo '__CLIENT__RESPONCE__START__'.serialize(array($api->get_error_message(),$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}$skin = new WP_Ajax_Upgrader_Skin();$upgrader = new Theme_Upgrader($skin);if ( $upgrader->install($api->download_link, array( "clear_update_cache" => true, "overwrite_package" => true )) !== true ){echo '__CLIENT__RESPONCE__START__'.serialize(array(is_wp_error($upgrader->result) ? $upgrader->result->get_error_message() : false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}if (isset($_POST["activate"])){$listAllThemes = wp_get_themes(array( "errors" => null ));foreach ( $listAllThemes as $slug => $theme ){if ( $slug === $_POST["id"] ){if ( $theme->get_stylesheet() !== $theme->get_template() && !isset($listAllThemes[$theme->get_template()]) ){echo '__CLIENT__RESPONCE__START__'.serialize(array("The '".$theme->get_stylesheet()."' theme cannot be activated without its parent, '".$theme->get_template()."'.",$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}switch_theme( $theme->get_template(), $theme->get_stylesheet() );break;}}}echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "activate-theme" || $_POST["cmd"] === "enable-theme" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$listAllThemes = wp_get_themes(array( "errors" => null ));foreach ( $listAllThemes as $slug => $theme ){if ( $slug === $_POST["id"] ){if ( get_stylesheet() === $slug ){break;}if ( $theme->get_stylesheet() !== $theme->get_template() && !isset($listAllThemes[$theme->get_template()]) ){echo '__CLIENT__RESPONCE__START__'.serialize(array("The '".$theme->get_stylesheet()."' theme cannot be activated without its parent, '".$theme->get_template()."'.",$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}switch_theme( $theme->get_template(), $theme->get_stylesheet() );break;}}if ( get_stylesheet() === $slug ){echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else{echo '__CLIENT__RESPONCE__START__'.serialize(array(false,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}}else if ( $_POST["cmd"] === "update-theme" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");include_once(ABSPATH."wp-admin/includes/class-wp-upgrader.php");include_once(ABSPATH."wp-includes/update.php");if ( !class_exists("Theme_Upgrader") || !class_exists("Bulk_Theme_Upgrader_Skin") ){echo '__CLIENT__RESPONCE__START__'.serialize(array(2,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";exit;}$themes = $_POST["id"];$skin = new Automatic_Upgrader_Skin();$upgrader = new Theme_Upgrader($skin);$result = $upgrader->bulk_upgrade($themes);$messages = $upgrader->skin->get_upgrade_messages();@wp_update_themes();echo '__CLIENT__RESPONCE__START__'.serialize(array($result,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}else if ( $_POST["cmd"] === "uninstall-theme" ){include_once(ABSPATH."wp-admin/includes/file.php");include_once(ABSPATH."wp-admin/includes/plugin.php");include_once(ABSPATH."wp-admin/includes/theme.php");include_once(ABSPATH."wp-admin/includes/misc.php");include_once(ABSPATH."wp-admin/includes/template.php");$requestList = is_array($_POST["id"]) ? $_POST["id"] : array($_POST["id"]);$listAllThemes = wp_get_themes(array( "errors" => null ));foreach ( $listAllThemes as $slug => $theme ){if ( in_array($slug, $requestList) ){if ( get_stylesheet() === $slug ){echo '__CLIENT__RESPONCE__START__'.serialize(array("Cannot delete the active theme.",$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}foreach ( $listAllThemes as $sub_slug => $sub_theme ){$sub_theme_parent = $sub_theme->parent();if ( $sub_theme_parent && $sub_theme_parent->get_stylesheet() === $slug && $sub_theme_parent->exists() ){echo '__CLIENT__RESPONCE__START__'.serialize(array("Cannot delete parent theme '$slug' that has an active child theme '$sub_slub'.",$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}}delete_theme($theme->get_stylesheet());}}echo '__CLIENT__RESPONCE__START__'.serialize(array(true,$GLOBALS["__i_client_error_stack"]))."__CLIENT__RESPONCE__END__";}?>