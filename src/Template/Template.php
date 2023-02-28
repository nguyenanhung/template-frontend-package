<?php
/**
 * Project template-frontend-package
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 02/07/2022
 * Time: 01:03
 */

namespace nguyenanhung\Frontend\Your_Project\Template;

use Twig\Loader\FilesystemLoader as Twig_Loader_FilesystemLoader;
use Twig\Environment as Twig_Environment;
use League\Plates\Engine as League_Plates_Engine;

class Template
{
    /**
     * Function getTemplatesPath
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 28/02/2023 48:23
     */
    public static function getTemplatesPath()
    {
        return dirname(__DIR__) . '/templates';
    }

    /**
     * Function getTemplatesExtension
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-15 03:18
     *
     * @return string
     */
    public static function getTemplatesExtension()
    {
        return '.html';
    }

    /**
     * Function render
     *
     * @param string $template
     * @param array  $data
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 32:21
     */
    public static function render($template = '', $data = array())
    {
        $templatesPath = dirname(dirname(__DIR__)) . '/templates';
        $loader = new Twig_Loader_FilesystemLoader($templatesPath);
        $twig = new Twig_Environment($loader);
        $templateFile = $template . '.html';

        return $twig->render($templateFile, $data);
    }

    /**
     * Function nativeRender
     *
     * @param string $template
     * @param array  $data
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 33:42
     */
    public static function nativeRender($template = '', $data = array())
    {
        $templatesPath = dirname(dirname(__DIR__)) . '/templates';
        $templates = new League_Plates_Engine($templatesPath);

        return $templates->render($template, $data);
    }
}
