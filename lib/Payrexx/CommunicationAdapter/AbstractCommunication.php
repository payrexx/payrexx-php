<?php
/**
 * This class is a template for all communication handler classes.
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\CommunicationAdapter;

/**
 * Class AbstractCommunication
 * @package Payrexx\CommunicationAdapter
 */
abstract class AbstractCommunication
{
    /**
     * Perform an API request
     *
     * @param string $apiUrl
     * @param array $params
     * @param string $secret
     * @param string $instance
     * @param string $method
     *
     * @return mixed
     */
    abstract public function requestApi($apiUrl, $params = array(), $secret = '', $instance = '', $method = 'POST');
}
