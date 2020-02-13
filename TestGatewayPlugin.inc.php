<?php

/**
 * @file TestGatewayPlugin.inc.php
 *
 * Copyright (c) 2014-2020 Simon Fraser University
 * Copyright (c) 2003-2020 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file LICENSE.
 *
 * @class TestGatewayPlugin
 * @brief Simple example gateway plugin
 */

import('lib.pkp.classes.plugins.GatewayPlugin');

class TestGatewayPlugin extends GatewayPlugin {
	/**
	 * @copydoc LazyLoadPlugin::register
	 */
	function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path, $mainContextId);
		$this->addLocaleData();
		return $success;
	}

	/**
	 * Get the name of this plugin. The name must be unique within
	 * its category.
	 * @return String name of plugin
	 */
	function getName() {
		return 'TestGatewayPlugin';
	}

	function getDisplayName() {
		return __('plugins.gateways.testGateway.displayName');
	}

	function getDescription() {
		return __('plugins.gateways.testGateway.description');
	}

	/**
	 * Handle fetch requests for this plugin.
	 * @param $args array Arguments to this request.
	 * @param $request PKPRequest Request object.
	 */
	function fetch($args, $request) {
		if (!$this->getEnabled()) return false;
		echo 'This request is being served by the test gateway plugin.';
		return true;
	}
}

