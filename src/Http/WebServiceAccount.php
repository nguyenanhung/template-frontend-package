<?php

namespace nguyenanhung\Frontend\Your_Project\Http;

/**
 * Class WebServiceAccount
 *
 * @package   nguyenanhung\Frontend\Your_Project\Http
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class WebServiceAccount extends BaseHttp
{
    /**
     * WebServiceAccount constructor.
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

    public function register()
    {
        $data = array(
            'code'        => self::EXIT_CODE['success'],
            'description' => 'Success'
        );
        $this->response = $data;

        return $this;
    }

    public function login()
    {
        $data = array(
            'code'        => self::EXIT_CODE['success'],
            'description' => 'Success'
        );
        $this->response = $data;

        return $this;
    }

    public function logout()
    {
        $data = array(
            'code'        => self::EXIT_CODE['success'],
            'description' => 'Success'
        );
        $this->response = $data;

        return $this;
    }

    public function updatePassword()
    {
        $data = array(
            'code'        => self::EXIT_CODE['success'],
            'description' => 'Success'
        );
        $this->response = $data;

        return $this;
    }

    public function forgotPassword()
    {
        $data = array(
            'code'        => self::EXIT_CODE['success'],
            'description' => 'Success'
        );
        $this->response = $data;

        return $this;
    }
}
