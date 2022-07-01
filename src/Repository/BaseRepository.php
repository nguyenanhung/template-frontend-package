<?php

namespace nguyenanhung\Frontend\Your_Project\Repository;

use nguyenanhung\Frontend\Your_Project\Base\BaseCore;

/**
 * Class BaseRepository
 *
 * @package   nguyenanhung\Frontend\Your_Project\Repository
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseRepository extends BaseCore
{
    /**
     * BaseRepository constructor.
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
}
