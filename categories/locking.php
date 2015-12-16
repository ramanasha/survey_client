<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\PopularityContestClient\Categories;


use OCP\IConfig;
use OCP\IL10N;

/**
 * Class Locking
 *
 * @package OCA\PopularityContestClient\Categories
 */
class Locking implements ICategory {
	/** @var \OCP\IConfig */
	protected $config;

	/** @var \OCP\IL10N */
	protected $l;

	/**
	 * @param IConfig $config
	 * @param IL10N $l
	 */
	public function __construct(IConfig $config, IL10N $l) {
		$this->config = $config;
		$this->l = $l;
	}

	/**
	 * @return string
	 */
	public function getCategory() {
		return 'locking';
	}

	/**
	 * @return string
	 */
	public function getDisplayName() {
		return (string) $this->l->t('Information about the encryption status (enabled?, module)');
	}

	/**
	 * @return array (string => string|int)
	 */
	public function getData() {
		return [
			'status' => $this->config->getAppValue('core', 'encryption_enabled', 'no'),
			'module' => $this->config->getAppValue('core', 'default_encryption_module', ''),
		];
	}
}
