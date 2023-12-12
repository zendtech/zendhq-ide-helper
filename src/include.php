<?php

declare(strict_types=1);

if (! class_exists(ZendHQ\JobQueue\Queue::class, false)) {
    require_once __DIR__ . '/stubs.php';
}

require_once __DIR__ . '/monitoring_stubs.php';
