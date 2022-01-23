<?php namespace Wc1c\Schemas\Productscml;

defined('ABSPATH') || exit;

use Wc1c\Abstracts\SchemaAbstract;

/**
 * Core
 *
 * @package Wc1c\Schemas\Productscml
 */
class Core extends SchemaAbstract
{
	/**
	 * Core constructor.
	 */
	public function __construct()
	{
		$this->setId('productscml');
		$this->setVersion('0.1.0');

		$this->setName(__('Products data exchange via CommerceML', 'productscml'));
		$this->setDescription(__('Standard data exchange using the standard exchange algorithm from 1C via CommerceML. Exchanges only contains products data.', 'wc1c'));
	}

	/**
	 * Initialize
	 */
	public function init()
	{
		$this->setOptions($this->configuration()->getOptions());

		if(true === wc1c()->context()->isAdmin('plugin'))
		{
			$admin = Admin::instance();
			$admin->setCore($this);
			$admin->initConfigurationsFields();
		}

		if(true === wc1c()->context()->isReceiver())
		{
			$receiver = Receiver::instance();
			$receiver->setCore($this);
			$receiver->initHandler();
		}

		return true;
	}
}