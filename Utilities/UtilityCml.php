<?php namespace Wc1c\Schemas\Productscml\Utilities;

defined('ABSPATH') || exit;

/**
 * UtilityCml
 *
 * @package Wc1c\Schemas\Productscml\Utilities
 */
trait UtilityCml
{
	/**
	 * Проверка версии схемы
	 *
	 * @param $xml
	 *
	 * @return bool|string
	 */
	private function cmlCheckVersion($xml)
	{
		if($xml['ВерсияСхемы'])
		{
			return (string)$xml['ВерсияСхемы'];
		}

		return false;
	}

	/**
	 * Определение типа файла
	 *
	 * @param $file_name
	 *
	 * @return string|false
	 */
	private function cmlDetectFileType($file_name)
	{
		$types =
		[
			'import',
			'offers',
			'prices',
			'rests',
			'import_files'
		];

		foreach($types as $type)
		{
			$pos = stripos($file_name, $type);
			if($pos !== false)
			{
				return $type;
			}
		}

		return false;
	}
}