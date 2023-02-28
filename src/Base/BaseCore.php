<?php

namespace nguyenanhung\Frontend\Your_Project\Base;

use nguyenanhung\Frontend\Your_Project\Template\Template;
use nguyenanhung\MyDebug\Benchmark;
use nguyenanhung\MyDebug\Logger;
use nguyenanhung\MyCache\Cache;
use nguyenanhung\MyRequests\MyRequests;
use nguyenanhung\Frontend\Your_Project\Helper\Helper;

/**
 * Class BaseCore
 *
 * @package   nguyenanhung\Frontend\Your_Project\Base
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 *
 * @property \nguyenanhung\Frontend\Your_Project\Database\Database $db
 */
class BaseCore
{
    const VERSION = '1.0.0';
    const KEY_DATABASE = 'DATABASE';
    const KEY_OPTIONS = 'OPTIONS';
    const KEY_AUTH = 'AUTH';
    const KEY_CONFIG = 'CONFIG';
    const KEY_API_SERVICE = 'API_SERVICE';
    const KEY_HANDLE = 'HANDLE';

    /** @var \nguyenanhung\Frontend\Your_Project\Helper\Helper */
    protected $helper;
    /** @var \nguyenanhung\MyDebug\Benchmark */
    protected $benchmark;
    /** @var \nguyenanhung\MyDebug\Logger */
    protected $logger;
    /** @var \nguyenanhung\MyCache\Cache */
    protected $cache;
    /** @var \nguyenanhung\MyRequests\MyRequests */
    protected $requests;
    /** @var string $cachePrefix */
    protected $cachePrefix;
    /** @var array SDK Config Options */
    protected $options;
    /** @var array SDK Config */
    protected $sdkConfig;
    /** @var bool Set Response is Object */
    protected $responseIsObject;
    /** @var bool Set Response is JSON */
    protected $responseIsJson;
    /** @var mixed Response Data */
    protected $response;
    /** @var mixed $inputData */
    protected $inputData;

    /**
     * BaseCore constructor.
     *
     * @param array $options
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct(array $options = array())
    {
        $this->helper = new Helper();
        $this->logger = new Logger();
        $this->benchmark = new Benchmark();
        $this->requests = new MyRequests();
        $this->cache = new Cache();
        if (isset($options['debugStatus']) && $options['debugStatus'] === true) {
            $this->logger->setDebugStatus(true);
            $this->cache->setDebugStatus(true);
            if (isset($options['debugLevel']) && !empty($options['debugLevel'])) {
                $this->logger->setGlobalLoggerLevel($options['debugLevel']);
                $this->cache->setDebugLevel($options['debugLevel']);
            }
            if (isset($options['loggerPath']) && !empty($options['loggerPath'])) {
                $this->logger->setLoggerPath($options['loggerPath']);
                $this->cache->setDebugLoggerPath($options['loggerPath']);
            }
            $this->logger->setLoggerSubPath(__CLASS__);
            $this->logger->setLoggerFilename('Log-' . date('Y-m-d') . '.log');
        }
        if (isset($options['cachePath'])) {
            $this->cache->setCachePath($options['cachePath']);
        }
        if (isset($options['cacheTtl'])) {
            $this->cache->setCacheTtl(300);
        }
        if (isset($options['cacheDriver'])) {
            $this->cache->setCacheDriver($options['cacheDriver']);
        }
        if (isset($options['cacheFileDefaultChmod'])) {
            $this->cache->setCacheDefaultChmod($options['cacheFileDefaultChmod']);
        }
        if (isset($options['cacheSecurityKey'])) {
            $this->cache->setCacheSecurityKey($options['cacheSecurityKey']);
        }
        $this->cache->__construct();
        $this->options = $options;
    }

    /**
     * Function getVersion
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 40:11
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Function setSdkConfig
     *
     * @param array $sdkConfig
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 37:01
     */
    public function setSdkConfig(array $sdkConfig)
    {
        $this->sdkConfig = $sdkConfig;
        if (isset($this->db)) {
            $this->db->setSdkConfig($this->sdkConfig);
            if (isset($this->sdkConfig[self::KEY_DATABASE])) {
                $this->db->setDatabase($this->sdkConfig[self::KEY_DATABASE]);
            }
            $this->db->__construct($this->sdkConfig[self::KEY_OPTIONS]);
        }

        return $this;
    }

    /**
     * Function setInputData
     *
     * @param $inputData
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 37:37
     */
    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
        $this->logger->debug('InputData', 'Received Input Data: ', $this->inputData);

        return $this;
    }

    /**
     * Function setResponseIsObject
     *
     * @param bool $responseIsObject
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 48:40
     */
    public function setResponseIsObject($responseIsObject)
    {
        $this->responseIsObject = $responseIsObject;

        return $this;
    }

    /**
     * Function setResponseIsJson
     *
     * @param bool $responseIsJson
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 49:31
     */
    public function setResponseIsJson($responseIsJson)
    {
        $this->responseIsJson = $responseIsJson;

        return $this;
    }

    /**
     * Function getResponse
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 37:56
     */
    public function getResponse()
    {
        if ($this->responseIsObject === true) {
            $this->response = $this->helper->arrayToObject($this->response);
        }
        if ($this->responseIsJson === true) {
            $this->response = json_encode($this->response);
        }

        return $this->response;
    }

    /**
     * Function responseToHtml
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 02/07/2022 09:02
     */
    public function responseToHtml()
    {
        return Template::nativeRender($this->response['templates'], $this->response);
    }

    /**
     * Function responseToJson
     *
     * @return false|mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 02/07/2022 09:00
     */
    public function responseToJson()
    {
        if (is_array($this->response) || is_object($this->response)) {
            return json_encode($this->response);
        }

        return $this->response;
    }
}
