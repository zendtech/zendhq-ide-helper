<?php

declare(strict_types=1);

if (! function_exists('monitor_custom_event')) {
    function monitor_custom_event(
        string $type,
        string $text,
        mixed $userData = null,
        int $userSeverity = -2
    ) : ?bool {}
}

if (! function_exists('monitor_custom_event_ex')) {
    function monitor_custom_event_ex(
        string $type,
        string $text,
        string $ruleName,
        mixed $userData = null
    ) : ?bool {}
}

if (! function_exists('zend_monitor_custom_event')) {
    /**
     * @deprecated Use monitor_custom_event() instead
     */
    function zend_monitor_custom_event(
        string $type,
        string $text,
        mixed $userData = null,
        int $userSeverity = -2
    ) : ?bool {}
}

if (! function_exists('zend_monitor_custom_event_ex')) {
    /**
     * @deprecated Use monitor_custom_event_ex() instead
     */
    function zend_monitor_custom_event_ex(
        string $type,
        string $text,
        string $ruleName,
        mixed $userData = null
    ) : ?bool {}
}
