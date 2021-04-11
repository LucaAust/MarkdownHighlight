<?php

namespace Plugins\MarkdownHighlight;

use \Typemill\Plugin;

class MarkdownHighlight extends Plugin
{
	protected $settings;
	
    public static function getSubscribedEvents()
    {
		return array(
			'onTwigLoaded' 			=> 'onTwigLoaded'
		);
    }

    public function onSettingsLoaded($settings)
    {
        $this->settings = $settings->getData();
    }
	
	public function onTwigLoaded()
	{
		/* add external CSS and JavaScript */
        $settings = $this->getPluginSettings('MarkdownHighlight');

		$this->addCSS('/MarkdownHighlight/public/designs/'. $settings["theme"] . '.css');
		$this->addJS('/MarkdownHighlight/public/highlight.min.js');

		/* initialize the script */
		$this->addInlineJS('hljs.highlightAll();');
	}
}