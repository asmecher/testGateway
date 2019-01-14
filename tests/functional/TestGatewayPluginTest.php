<?php

/**
 * @file tests/functional/TestGatewayFunctionalTest.php
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2000-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class TestGatewayFunctionalTest
 * @package plugins.gateways.testGateway
 *
 * @brief Functional tests for the test gateway plugin.
 */

import('lib.pkp.tests.WebTestCase');

class TestGatewayFunctionalTest extends WebTestCase {
	/**
	 * @copydoc WebTestCase::getAffectedTables
	 */
	protected function getAffectedTables() {
		return PKP_TEST_ENTIRE_DB;
	}

	/**
	 * Enable the plugin
	 */
	function testTestGateway() {
		$this->open(self::$baseUrl);

		// Check that the gateway is not serving.
		$this->open(self::$baseUrl . '/index.php/publicknowledge/gateway/plugin/TestGatewayPlugin');
		$this->assertTextNotPresent('This request is being served by the test gateway plugin.');

		$this->logIn('admin', 'admin');
		$this->waitForElementPresent($selector='link=Website');
		$this->clickAndWait($selector);
		$this->click('link=Plugins');

		// Find and enable the plugin
		$this->waitForElementPresent($selector = '//input[@id=\'select-cell-TestGatewayPlugin-enabled\']');
		$this->click($selector); // Enable plugin
		$this->waitForElementPresent('//div[contains(text(),\'The plugin "Test Gateway Plugin" has been enabled.\')]');

		// Check that the gateway is not serving.
		$this->open(self::$baseUrl . '/index.php/publicknowledge/gateway/plugin/TestGatewayPlugin');
		$this->assertTextPresent('This request is being served by the test gateway plugin.');

		// Find the plugin's tab
		$this->open(self::$baseUrl);
		$this->logOut();
	}
}
