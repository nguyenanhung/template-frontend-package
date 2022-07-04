<?php
/**
 * Project template-frontend-package
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 04/07/2022
 * Time: 17:00
 */

namespace nguyenanhung\Frontend\Your_Project\Module;

/**
 * Class TestModule
 *
 * @package   nguyenanhung\Frontend\Your_Project\Module
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class TestModule extends BaseModule
{
    /**
     * TestModule constructor.
     *
     * @param array $options
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->logger->setLoggerSubPath(__CLASS__);
    }

    public function handle(): TestModule
    {
        $data           = [];
        $this->response = $data;

        return $this;
    }
}
