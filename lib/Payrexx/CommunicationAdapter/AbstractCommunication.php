<?php

/**
 * This class is a template for all communication handler classes.
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
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
     */
    abstract public function requestApi(
        string $apiUrl,
        array $params = [],
        string $method = 'POST',
        array $httpHeader = []
    ): array;
}
