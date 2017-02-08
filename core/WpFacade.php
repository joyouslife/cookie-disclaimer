<?php
namespace toyga\core;

class WpFacade
{
	protected $app;
	private $_pluginMainFile;

	public function __construct(&$app)
	{
		$this->app = $app;
		$this->_pluginMainFile = $this->app->mainFile;
	} // end __construct

	public function isBackend()
	{
		return defined('WP_BLOG_ADMIN');
	} // end isBackend

	public function isAjax()
	{
		return defined('DOING_AJAX') && DOING_AJAX;
	} // end isAjax

    public function registerActivationEvent($pluginMainFile, $method)
    {
        register_activation_hook($pluginMainFile, $method);
    } // end registerActivationEvent

    public function addAction(
        $hook, $method, $pirority = 10, $paramsCount = 1
    )
    {
        add_action($hook, $method, $pirority, $paramsCount);
    } // end addAction

    public function addCss(
        $handle, $src = false, $deps = array(),
        $ver = false, $media = false
    )
    {
        wp_enqueue_style($handle, $src, $deps, $ver, $media);
    } // end addCss

    public function addJs(
        $handle, $src = false, $deps = array(),
        $ver = false, $inFooter = false
    )
    {
        wp_enqueue_script($handle, $src, $deps, $ver, $inFooter);
    } // end addJs

    public function getPluginUrl($fileName = '')
    {
        return $this->getUrlByPath($this->_pluginMainFile, $fileName);
    } // end getPluginUrl

    public function getUrlByPath($filePath, $fileName = '')
    {
        return plugins_url($fileName, $filePath);
    } // end getUrlByPath

    public function getCssUrl($fileName = '')
    {
        return $this->getPluginUrl('static/css/'.$fileName);
    } // end getCssUrl

    public function getJsUrl($fileName = '')
    {
        return $this->getPluginUrl('static/js/'.$fileName);
    } // end getJsUrl

    public function getImagesUrl($fileName = '')
    {
        return $this->getPluginUrl('static/images/'.$fileName);
    } // end getImagesUrl

    public function addMenuPage(
        $pageTitle, $menuTitle, $capability, $menuSlug,
        $function = '', $iconUrl = '', $position = null
    )
    {
        $page = add_menu_page(
            $pageTitle,
            $menuTitle,
            $capability,
            $menuSlug,
            $function,
            $iconUrl,
            $position
        );

        return $page;
    } // end addMenuAction

    public function getOption($optionName, $defaultValue = '')
    {
        return  get_option($optionName, $defaultValue);
    } // end get_option


    public function updateOption($optionName, $newValue, $autoload = true)
    {
        return update_option($optionName, $newValue, $autoload);
    } // end updateOption

    public function getSiteUrl($path = '', $scheme = null)
    {
        return site_url($path, $scheme);
    } // end getSiteUrl;

    public function addQueryArg()
    {
        $args = func_get_args();

        return call_user_func_array('add_query_arg', $args);
    } // end addQueryArg

    public function isMobile()
    {
        return wp_is_mobile();
    } // end isMobile

    public function isRtl()
    {
        return is_rtl();
    } // end isMobile

    public function getPluginPath($fileName = '')
    {
        return plugin_dir_path($this->_pluginMainFile).$fileName;
    } // end getPluginPath

    public function getPluginBasenamePath($path)
    {
        return plugin_basename($path);
    } // end getPluginBasenamePath

    public function loadPluginTextdomain($domain, $languagesFolderPath = false)
    {
        load_plugin_textdomain($domain, false, $languagesFolderPath);
    } // end loadPluginTextdomain
}