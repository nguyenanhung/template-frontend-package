<?php

namespace nguyenanhung\Frontend\Your_Project\Module;

use nguyenanhung\Frontend\Your_Project\Base\BaseCore;
use nguyenanhung\Frontend\Your_Project\Database\Database;

/**
 * Class BaseModule
 *
 * @package   nguyenanhung\Frontend\Your_Project\Module
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseModule extends BaseCore
{
    /**
     * BaseModule constructor.
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
        $this->db = new Database($options);
    }
}
