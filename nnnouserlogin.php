<?php
/**
 * @version 1.0.0
 * @package NNNouserlogin
 * @copyright 2015 Niels Nübel- NN-Medienagentur
 * @license This software is licensed under the MIT license: http://opensource.org/licenses/MIT
 * @link http://www.nn-medienagentur.de
 */

defined('_JEXEC') or die;

/**
 * Plugin class for Login only with Username
 *
 * @since  3.1
 */
class plgSystemNNNouserlogin extends JPlugin
{
	protected $app;

	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);

		$this->loadLanguage();

		if ($this->app->isSite())
		{
			$doc = JFactory::getDocument();
			if($this->params->get('loadCSS',0))
			{
				$stylsheet = 'media/plg_system_nnnouserlogin/css/style.css';
				$doc->addStyleSheet($stylsheet);
			}
			if($this->params->get('loadJS',0))
			{
				$javascript = 'media/plg_system_nnnouserlogin/js/script.js';
				$doc->addScript($javascript);
			}
		}
	}

	function onAfterRoute() {

		$username = $this->app->input->get('username');

		if ($this->app->isSite() && $this->params->get('username') == $username && $username !== null )
		{
				JPluginHelper::importPlugin('user');
				$options = array();
				$options['action'] = 'core.login.site';
				$response = new stdClass();
				$response->username = $username;
				JFactory::getApplication()->triggerEvent('onUserLogin', array((array)$response, $options));
		}
	}

	public function onAfterRender()
	{
		if ($this->app->isSite())
		{
			$file = 'default.php';

			@ob_start();
			$overridePath = FOFPlatform::getInstance()->getTemplateOverridePath('plg_system_nnnouserlogin', true);

			JLoader::import('joomla.filesystem.file');

			if (JFile::exists($overridePath . '/' . $file))
			{
				include_once $overridePath . '/' . $file;
			}
			else
			{
				include_once __DIR__ . '/tmpl/' . $file;
			}

			$html = @ob_get_clean();

			$body = $this->app->getBody();
			$body = str_replace('</body>', $html . '</body>', $body);
			$this->app->setBody($body);
		}
	}
}
