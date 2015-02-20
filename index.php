<?php

/**
 * @defgroup plugins_gateways_testGateway Test Gateway Plugin
 */
 
/**
 * @file plugins/gateways/testGateway/index.php
 *
 * Copyright (c) 2014-2015 Simon Fraser University Library
 * Copyright (c) 2003-2015 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_gateways_testGateway
 * @brief Test gateway plugin wrapper.
 *
 */

require_once('TestGatewayPlugin.inc.php');

return new TestGatewayPlugin();

?>
