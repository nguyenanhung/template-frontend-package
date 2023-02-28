<?php

namespace nguyenanhung\Frontend\Your_Project\Config;

/**
 * Class Config
 *
 * @package   nguyenanhung\Frontend\Your_Project\Config
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Config
{
    public static function init()
    {
        return DataRepository::getData('config_global');
    }

    public static function configItem($item)
    {
        $config = self::init();
        if (isset($config[$item])) {
            return $config[$item];
        }

        return null;
    }
}
