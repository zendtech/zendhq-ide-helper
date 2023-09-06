<?php
/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * CLI job definition
     */
    final class CLIJob implements JobDefinition {

        /**
         * Constructs the CLI job definition.
         *
         * @param string $command The full command line, including arguments and options
         *
         * @throws InvalidArgument if:
         *  a) the $command is not valid (quotes not closed etc.)
         *
         * The value of the $command argument is processed using the following rules:
         * - Backslash `\` characters followed by one of the following characters `\`,
         *   ` `, `"`, and `'` are removed and the following character peserves the
         *   literal value of the character; backslashes preceeding characters without
         *   special meaning are left unmodified;
         * - Enclosing characters in single `'` quotes preserve the literal value of
         *   each character within the quotes; a single `'` quote may not occur between
         *   single quotes;
         * - Enclosing characters in double `"` quotes preserve the literal value of
         *   each character within the quotes, with the exception of `\`; a double `"`
         *   quote may be quoted within double quotes by preceeding it with a backslash;
         */
        public function __construct(string $command) {}

        /**
         * Returns the optional name of the job
         * @return string The optional name of the job if set, otherwise null
         */
        public function getName(): ?string {}

        /**
         * Sets or unsets the name of the job
         * @param string $name Name of the job or null
         *
         * @return CLIJob self
         *
         * Unsets the name of the job if $name is null or an empty string
         */
        public function setName(?string $name = null): CLIJob {}

        /**
         * Adds environment variables to the CLI job.
         *
         * @param string $name Name of the environment variable
         * @param string $value Value of the environment variable
         *
         * @return CLIJob self
         *
         * Note that the default environment for CLI jobs is empty and `PATH` must
         * be specified manually if needed.
         */
        public function setEnv(string $name, string $value): CLIJob {}

        /**
         * Returns the full command line
         *
         * @return string The command
         */
        public function getCommand(): string {}

        /**
         * Returns the environment.
         *
         * @return array<string, string> Array of name/value pairs
         */
        public function getEnv(): array {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue\Exception {

    /**
     * Other unclassified errors
     */
    class Other extends \RuntimeException {}

    /**
     * Invalid argument value error
     */
    class InvalidArgument extends \InvalidArgumentException {}

    /**
     * Unexpected method call error
     */
    class InvalidMethod extends \RuntimeException {}

    /**
     * Job Queue is not initialized
     */
    class NotInitialized extends \RuntimeException {}

    /**
     * Network error when communicating with the ZendHQ daemon
     */
    class NetworkError extends \RuntimeException {}

    /**
     * Operation timed out
     */
    class Timeout extends \RuntimeException {}

    /**
     * Unclassified server error
     */
    class ServerError extends \RuntimeException {}

    /**
     * No valid ZendHQ license or the license is expired
     */
    class LicenseError extends \RuntimeException {}

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * HTTP job definition.
     */
    final class HTTPJob implements JobDefinition {

        /**
         * HTTP `GET` request
         *
         * @var string
         */
        public const HTTP_METHOD_GET = 'GET';

        /**
         * HTTP `POST` request
         *
         * @var string
         */
        public const HTTP_METHOD_POST = 'POST';

        /**
         * HTTP `PUT` request
         *
         * @var string
         */
        public const HTTP_METHOD_PUT = 'PUT';

        /**
         * HTTP content type `application/json`
         *
         * @var int
         * @cvalue int(::JQ::Job::HttpContentType::JSON)
         */
        public const CONTENT_TYPE_JSON = UNKNOWN;

        /**
         * HTTP content type `application/x-www-form-urlencoded`
         *
         * @var int
         * @cvalue int(::JQ::Job::HttpContentType::URL_ENCODED)
         */
        public const CONTENT_TYPE_URL_ENCODED = UNKNOWN;

        /**
         * HTTP content type compatible with Zend Server
         *
         * @var int
         * @cvalue int(::JQ::Job::HttpContentType::ZEND_SERVER)
         */
        public const CONTENT_TYPE_ZEND_SERVER = UNKNOWN;

        /**
         * Constructs the HTTP job definition.
         *
         * @param string $url The URL of the HTTP request
         * @param string $method The HTTP request method
         * @param int $contentType The HTTP body content type
         *
         * @throws InvalidArgument if:
         *   a) $url is not a valid URL
         *   b) $method is not one of 'GET', 'POST', or 'PUT'
         *   c) $contentType is not a valid value
         */
        public function __construct(
            string $url,
            string $method = HTTPJob::HTTP_METHOD_POST,
            int $contentType = HTTPJob::CONTENT_TYPE_JSON,
        ) {}

        /**
         * @return string The optional name of the job if set, otherwise null
         */
        public function getName(): ?string {}

        /**
         * Sets or unsets the name of the job
         * @param string $name Name of the job or null
         *
         * @return HTTPJob self
         *
         * Unsets the name of the job if $name is null or an empty string
         */
        public function setName(?string $name = null): HTTPJob {}

        /**
         * Sets the URL of the HTTP request
         *
         * @param string $url The URL of the HTTP request
         *
         * @return HTTPJob self
         *
         * @throws Invalid Argument if:
         *   a) $url is not a valid URL
         */
        public function setUrl(string $url): HTTPJob {}

        /**
         * Sets the HTTP request method
         *
         * @param string $url The URL of the HTTP request
         *
         * @return HTTPJob self
         *
         * @throws Invalid Argument if:
         *   a) $method is not one of 'GET', 'POST', or 'PUT'
         */
        public function setMethod(string $method): HTTPJob {}

        /**
         * Sets the HTTP body content type
         *
         * @param int $contentType The HTTP body content type
         *
         * @return HTTPJob self
         *
         * @throws Invalid Argument if:
         *   c) $contentType is not a valid value
         */
        public function setContentType(int $contentType): HTTPJob {}

        /**
         * Adds request headers to the HTTP job definition.
         *
         * @param string $headerName Name of the header
         * @param string $value Request header value
         *
         * @return HTTPJob self
         */
        public function addHeader(string $headerName, string $value): HTTPJob {}

        /**
         * Adds query string arguments to the HTTP job definition.
         *
         * @param string $key The key
         * @param string $value The value
         *
         * @return HTTPJob self
         */
        public function addQueryStringArgument(string $key, string $value): HTTPJob {}

        /**
         * Adds body parameters to the HTTP job definition.
         *
         * @param string $key The key
         * @param mixed $value The value
         *
         * @return HTTPJob self
         *
         * @throws InvalidMethod if:
         *   a) method is 'GET'
         *   b) addRawBody() is already called
         */
        public function addBodyParam(string $key, mixed $value): HTTPJob {}

        /**
         * Sets the raw body for the HTP job definition.
         *
         * @param string $content The raw body content
         *
         * @return HTTPJob self
         *
         * @throws InvalidMethod if:
         *   a) method is 'GET'
         *   b) addBodyParam() is already called
         */
        public function setRawBody(string $content): HTTPJob {}

        /**
         * Returns the URL of the HTTP request.
         *
         * @return string The URL
         */
        public function getUrl(): string {}

        /**
         * Returns the HTTP request method.
         *
         * @return string The HTTP request method
         */
        public function getMethod(): string {}

        /**
         * Returns the HTTP body content type
         *
         * @return int The HTTP body content type
         */
        public function getContentType(): int {}

        /**
         * Returns all the HTTP request headers.
         *
         * @return array<string, string> An array of name/value pairs
         */
        public function getHeaders(): array {}

        /**
         * Returns the encoded HTTP request body.
         *
         * @return string|null The encoded HTTP request body
         *
         * @throws InvalidMethod if:
         *   a) job is not queued yet and body has been provided
         *
         * Returns null if the HTTP request is not a 'POST' or 'PUT'.
         */
        public function getBody(): ?string {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue job definition interface.
     */
    interface JobDefinition {

        /**
         * Returns the optional name of the job
         * @return string The optional name of the job if set, otherwise null
         */
        public function getName(): ?string;

        /**
         * Sets or unsets the name of the job
         * @param string $name Name of the job or null
         *
         * @return JobDefinition self
         *
         * Unsets the name of the job if $name is null or an empty string
         */
        public function setName(?string $name = null): JobDefinition;
    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Options for Job Queue jobs.
     *
     * Defines job options for a scheduled job or default job options for a queue.
     */
    final class JobOptions {

        /**
         * @var int
         * @cvalue int(::JQ::Job::Priority::LOW)
         */
        public const PRIORITY_LOW = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Job::Priority::NORMAL)
         */
        public const PRIORITY_NORMAL = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Job::Priority::HIGH)
         */
        public const PRIORITY_HIGH = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Job::Priority::URGENT)
         */
        public const PRIORITY_URGENT = UNKNOWN;

        /**
         * Do not persist job output.
         *
         * @var int
         * @cvalue int(::JQ::Job::PersistOutput::NO)
         */
        public const PERSIST_OUTPUT_NO = UNKNOWN;

        /**
         * Always persist job output.
         *
         * @var int
         * @cvalue int(::JQ::Job::PersistOutput::YES)
         */
        public const PERSIST_OUTPUT_YES = UNKNOWN;

        /**
         * Persist job output when failed.
         *
         * @var int
         * @cvalue int(::JQ::Job::PersistOutput::ERROR)
         */
        public const PERSIST_OUTPUT_ERROR = UNKNOWN;

        /**
         * Constructs job options.
         *
         * @param int|null $priority Priority of the job
         * @param int|null $timeout Job timeout in seconds
         * @param int|null $allowedRetries Number of allowed retries
         * @param int|null $retryWaitTime Wait time in seconds between retries
         * @param int|null $persistOutput Persist job output option
         * @param bool|null $validateSsl Validate SSL option for HTTP jobs
         *
         * @throws InvalidArgument if:
         *   a) $priority value is not valid
         *   b) $timeout is <= 0 or $timeout > 2147483
         *   c) $allowedRetries < 0
         *   d) $retryWaitTime < 0 or $retryWaitTime > 2147483
         *   e) $persistOutput value is not valid
         *
         * Default job options from the queue are used for any job option values
         * that are null.
         */
        public function __construct(
            ?int $priority = null,
            ?int $timeout = null,
            ?int $allowedRetries = null,
            ?int $retryWaitTime = null,
            ?int $persistOutput = null,
            ?bool $validateSsl = null
        ) {}

        /**
         * Returns the priority of the job.
         *
         * @return int|null Priority of the job
         */
        public function getPriority(): ?int {}

        /**
         * Returns the timeout value in seconds.
         *
         * @return int|null Timeout value in seconds
         */
        public function getTimeout(): ?int {}

        /**
         * Returns the number of allowed retries.
         *
         * @return int|null Number of allowed retries
         */
        public function getAllowedRetries(): ?int {}

        /**
         * Returns the wait time in seconds between retries.
         *
         * @return int|null Wait time in seconds
         */
        public function getRetryWaitTime(): ?int {}

        /**
         * Returns the persist job output option value.
         *
         * @return int|null Persist job output value
         */
        public function getPersistOutput(): ?int {}

        /**
         * Returns true if SSL validation for the HTTP job is enabled.
         *
         * @return bool|null True if SSL validation is enabled
         */
        public function willValidateSsl(): ?bool {}

        /**
         * Sets the job priority.
         *
         * @param int $priority The priority value
         *
         * @return JobOptions self
         *
         * @throws InvalidArgument if:
         *   a) the $priority value is invalid
         */
        public function setPriority(int $priority): JobOptions {}

        /**
         * Sets the timeout value in seconds.
         *
         * @param int $seconds Timeout value
         *
         * @return JobOptions self
         *
         * @throws InvalidArgument if:
         *   a) $seconds <= 0 or $seconds > 2147483
         */
        public function setTimeout(int $seconds): JobOptions {}

        /**
         * Sets the number of allowed retries.
         *
         * @param int $retries Number of retries
         *
         * @return JobOptions self
         *
         * @throws InvalidArgument if:
         *   a) $retries < 0
         */
        public function setAllowedRetries(int $retries): JobOptions {}

        /**
         * Sets the the wait time in seconds between retries.
         *
         * @param int $seconds Wait time
         *
         * @return JobOptions self
         *
         * @throws InvalidArgument if:
         *   a) $seconds < 0 or $seconds > 2147483
         */
        public function setRetryWaitTime(int $seconds): JobOptions {}

        /**
         * Sets the persist job output option.
         *
         * @param int $persist The persist job output value
         *
         * @return JobOptions self
         *
         * @throws InvalidArgument if:
         *   a) the $persist value is invalid
         */
        public function setPersistOutput(int $persist): JobOptions {}

        /**
         * Enables or disables SSL validation for HTTP jobs.
         *
         * @param bool $validate Validate SSL option.
         *
         * @return JobOptions self
         */
        public function validateSsl(bool $validate): JobOptions {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue daemon connection class.
     */
    final class JobQueue {

        /**
         * @param string $endpoint Optional 0mq endpoint
         *
         * @throws InvalidArgument if
         *   a) the optional 0mq $endpoint is invalid
         * @throws NetworkError if
         *   a) failed to connect to the ZendHQ daemon
         *   b) protocol mismatch (daemon and extension versions are different)
         *   c) message parsing errors
         * @throws LicenseError if
         *   a) ZendHQ license is missing, invalid, or expired
         *
         * Constructs the JobQueue object and connects to the ZendHQ daemon.
         * If the $endpoint parameter is omitted, then connects to the default
         * ZendHQ daemon specified in the INI file.
         */
        public function __construct(?string $endpoint = null) {}

        /**
         * Returns an array with all the Job Queue queues.
         *
         * @return array<int, string> Array of queue ID value and name pairs.
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         */
        public function getQueues(): array {}

        /**
         * Returns the default Job Queue queue.
         *
         * @return Queue The default queue
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws ServerError if
         *   a) ZendHQ daemon didn't respond with a valid queue
         */
        public function getDefaultQueue(): Queue {}

        /**
         * Returns the queue identified by $queueName.
         *
         * @param string $queueName The name of the queue
         *
         * @return Queue The queue
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws InvalidArgument if
         *   a) no queue with the given $queueName
         * @throws ServerError if
         *   a) ZendHQ daemon didn't respond with a valid queue
         */
        public function getQueue(string $queueName): Queue {}

        /**
         * Returns true if a queue with the given name exists.
         *
         * @param string $queueName The name of the queue
         *
         * @return True if a queue with the given name exists, otherwise false
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws ServerError if
         *   a) ZendHQ daemon didn't respond with a valid queue
         */
        public function hasQueue(string $queueName): bool {}

        /**
         * Adds a queue with the given name and definition.
         *
         * @param string $queueName Name of the queue
         * @param QueueDefinition $queueDefinition Optional queue definition
         *
         * @return Queue The added queue instance
         *
         * @throws InvalidArgument if
         *   a) queue name is empty or longer than 256 characters
         *   b) a queue with the given name already exists
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         *
         * If the optional $queueDefinition argument is omitted, then uses default
         * queue definition values configured in the ZendHQ daemon.
         */
        public function addQueue(string $queueName, ?QueueDefinition $queueDefinition = null): Queue {}

        /**
         * Modifies the queue identified by the name.
         *
         * @param string $queue The queue (queue name or Queue instance)
         * @param QueueDefinition $queueDefinition Queue definition with changed attributes
         *
         * @return Queue The modified queue instance
         *
         * @throws InvalidArgument if
         *   a) the queue does not exist
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         *
         */
        public function modifyQueue(string|Queue $queue, QueueDefinition $queueDefinition): Queue {}

        /**
         * Deletes the queue and all the jobs in the queue.
         *
         * @param Queue $queue The queue to be deleted (queue name or Queue instance)
         *
         * @throws InvalidArgument if
         *   a) the queue does not exist
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws ServerError if
         *   a) the queue is not suspended
         *
         * The queue MUST be suspended before it can be deleted.
         */
        public function deleteQueue(string|Queue $queue): void {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue job instance.
     */
    final class Job {

        /**
         * The job is created, but not scheduled yet.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::CREATED)
         */
        public const STATUS_CREATED             = UNKNOWN;

        /**
         * The job is scheduled.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::SCHEDULED)
         */
        public const STATUS_SCHEDULED           = UNKNOWN;

        /**
         * The job is waiting for the parent to be completed.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::WAITING_ON_PARENT)
         */
        public const STATUS_WAITING_ON_PARENT   = UNKNOWN;

        /**
         * The job is running.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::RUNNING)
         */
        public const STATUS_RUNNING             = UNKNOWN;

        /**
         * The job is suspended.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::SUSPENDED)
         */
        public const STATUS_SUSPENDED           = UNKNOWN;

        /**
         * The job has timed out.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::TIMEOUT)
         */
        public const STATUS_TIMEOUT             = UNKNOWN;

        /**
         * The job failed because there is no worker.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::FAILED_NO_WORKER)
         */
        public const STATUS_FAILED_NO_WORKER    = UNKNOWN;

        /**
         * The job failed because of a worker error.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::FAILED_WORKER_ERROR)
         */
        public const STATUS_FAILED_WORKER_ERROR = UNKNOWN;

        /**
         * The job is cancelled and deleted.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::DELETED)
         */
        public const STATUS_REMOVED             = UNKNOWN;

        /**
         * The job is completed sucessfully.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::COMPLETED)
         */
        public const STATUS_COMPLETED           = UNKNOWN;

        /**
         * The job status is unknown due to an interruption.
         *
         * @var int
         * @cvalue int(::JQ::Job::Status::UNKNOWN)
         */
        public const STATUS_UNKNOWN             = UNKNOWN;

        /**
         * Returns the name of the queue.
         *
         * @return string Name of the queue
         */
        public function getQueueName(): string {}

        /**
         * Returns the ID value uniquely identifying the job.
         *
         * @return int The ID value
         */
        public function getId(): int {}

        /**
         * Returns the job definition.
         *
         * @return JobDefinition The job definition
         */
        public function getJobDefinition(): JobDefinition {}

        /**
         * Returns the schedule of the job.
         *
         * @return Schedule The schedule
         */
        public function getSchedule(): Schedule {}

        /**
         * Returns job options.
         *
         * @return JobOptions Job options
         */
        public function getJobOptions(): JobOptions {}

        /**
         * Returns the status of the job.
         *
         * @return int Job status value
         */
        public function getStatus(): int {}

        /**
         * Returns the retry count.
         *
         * @return int Retry count
         */
        public function getRetryCount(): int {}

        /**
         * Returns the last output of the job if the job has been finished and output persisted.
         *
         * @return string Job output
         */
        public function getOutput(): ?string {}

        /**
         * Returns the time when the job was created.
         *
         * @return \DateTimeInterface Creation time
         */
        public function getCreationTime(): \DateTimeInterface {}

        /**
         * Returns the next scheduled execution time.
         *
         * @return \DateTimeInterface Scheduled execution time
         */
        public function getScheduledTime(): \DateTimeInterface {}

        /**
         * Returns the last completion time if the job has been completed.
         *
         * @return \DateTimeInterface Completion time
         */
        public function getCompletionTime(): ?\DateTimeInterface {}

        /**
         * Refreshes the job by requesting updated information from the daemon.
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws InvalidArgument if
         *   b) no such job
         */
        public function refresh(): void {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue queue definition.
     */
    final class QueueDefinition {

        /**
         * @var int
         * @cvalue int(::JQ::Queue::Priority::LOW)
         */
        public const PRIORITY_LOW     = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Queue::Priority::NORMAL)
         */
        public const PRIORITY_NORMAL  = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Queue::Priority::HIGH)
         */
        public const PRIORITY_HIGH    = UNKNOWN;

        /**
         * @var int
         * @cvalue int(::JQ::Queue::Priority::URGENT)
         */
        public const PRIORITY_URGENT  = UNKNOWN;

        /**
         * Constructs the queue definition instance.
         *
         * @param int|null $priority Queue priority value
         * @param JobOptions|null $defaultJobOptions Default options for jobs scheduled in this queue
         *
         * @throws InvalidArgument if
         *   a) The $priority value is invalid
         *
         * Job Queue default values are used for any values that are null including
         * null values in the $defaultJobOptions instance.
         */
        public function __construct(
            ?int $priority = null,
            ?JobOptions $defaultJobOptions = null
        ) {}

        /**
         * Returns the priority of the queue.
         *
         * @return int|null Queue priority value
         */
        public function getPriority(): ?int {}

        /**
         * Returns default job options for jobs scheduled in this queue.
         *
         * @return JobOptions|null Default job options
         */
        public function getDefaultJobOptions(): ?JobOptions {}

        /**
         * Sets the priority of the queue.
         *
         * @param int $priority The queue priority value
         *
         * @return QueueDefinition self
         *
         * @throws InvalidArgument if
         *   a) The $priority value is invalid
         */
        public function setPriority(int $priority): QueueDefinition {}

        /**
         * Sets default job options for jobs scheduled in this queue.
         *
         * @param int $defaultJobOptions Default job options
         *
         * @return QueueDefinition self
         */
        public function setDefaultJobOptions(JobOptions $defaultJobOptions): QueueDefinition {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue queue class.
     */
    final class Queue {

        /**
         * Queue is running
         *
         * @var int
         * @cvalue int(::JQ::Queue::Status::RUNNING)
         */
        public const STATUS_RUNNING   = UNKNOWN;

        /**
         * Queue is suspended
         *
         * @var int
         * @cvalue int(::JQ::Queue::Status::SUSPENDED)
         */
        public const STATUS_SUSPENDED = UNKNOWN;

        /**
         * Queue is deleted
         *
         * @var int
         * @cvalue int(::JQ::Queue::Status::DELETED)
         */
        public const STATUS_DELETED   = UNKNOWN;

        /**
         * Returns the name uniquely identifying the queue.
         *
         * @return string The name of the queue
         */
        public function getName(): string {}

        /**
         * Returns the numeric ID value uniquely identifying the queue.
         *
         * @return int The ID value
         */
        public function getId(): int {}

        /**
         * Returns the queue definition.
         *
         * @return QueueDefinition The queue definition
         */
        public function getDefinition(): QueueDefinition {}

        /**
         * Returns the current status of the queue.
         *
         * @return int The queue status value
         */
        public function getStatus(): int {}

        /**
         * Refreshes the queue by requesting updated information from the daemon
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         */
        public function refresh(): void {}

        /**
         * Suspends the queue and optionally waits until the queue is suspended.
         *
         * @param int $timeout Optional time in seconds to wait
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws Timeout if
         *   a) the queue didn't suspend within the specified time
         *
         * If the $timeout argument is zero, then returns immediately after sending
         * the request to the ZendHQ daemon without waiting.
         */
        public function suspend(int $timeout = 0): void {}

        /**
         * Resumes the queue and optionally waits until the queue is resumed.
         *
         * @param int $timeout Optional time in seconds to wait
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws Timeout if
         *   a) the queue didn't resume within the specified time
         *
         * If the $timeout argument is zero, then returns immediately after sending
         * the request to the ZendHQ daemon without waiting.
         */
        public function resume(int $timeout = 0): void {}

        /**
         * Returns an array with all the scheduled and running jobs in this queue.
         *
         * @return array<int, Job> Array of job instances
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         *
         * The returned array contains job instances in the "native" execution order.
         */
        public function getJobs(): array {}

        /**
         * Returns an array with all the scheduled and running jobs in this queue
         * that have the specified name.
         *
         * @param string $name Job name
         *
         * @return array<int, Job> Array of job instances
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         *
         * The returned array contains job instances in the "native" execution order.
         */
        public function getJobsByName(string $name): array {}

        /**
         * Returns a job identified by the $id value in this queue.
         *
         * @param int $id The ID value of the job
         *
         * @return Job The job instance
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws InvalidArgument if
         *   a) no job with the given $id
         * @throws ServerError if
         *   a) ZendHQ daemon didn't respond with a valid job
         */
        public function getJob(int $id): Job {}

        /**
         * Schedules a job for execution in this queue.
         *
         * @param JobDefinition $job The definition of the job
         * @param Schedule $schedule Optional execution schedule of the job
         * @param JobOptions $jobOptions Optional options for the job
         * 
         * @return Job The scheduled job
         *
         * @throws NotInitialized if
         *   a) the Queue object is not associated with any JobQueue ojects
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws ServerError if
         *   a) ZendHQ daemon didn't respond with a valid job
         *
         * Schedules a job for execution in this queue and returns the Job instance
         * updated by the ZendHQ daemon.
         *
         * If the $schedule argument is null, then schedules the job for an immediate
         * execution.
         *
         * If the $jobOptions argument is null, then uses default job options from
         * the queue.
         */
        public function scheduleJob(JobDefinition $job,
                                    ?Schedule $schedule = null,
                                    ?JobOptions $jobOptions = null): Job {}

        /**
         * Cancels the job.
         *
         * @param int|Job $job The job to be cancelled (ID value or Job instance)
         *
         * @throws NetworkError if
         *   a) not connected to the ZendHQ daemon
         *   b) failed to communicate with the ZendHQ daemon
         *   c) message parsing errors
         * @throws InvalidArgument if
         *   a) the $job object is not valid
         *   b) no such job
         *
         * Cancels the previously scheduled job and marks it as deleted
         * (Job::STATUS_REMOVED).
         *
         * If the job was running and the result of the job is not known, then
         * marks it as unknown (Job::STATUS_UNKNOWN).
         */
        public function cancelJob(int|Job $job): void {}
    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    final class RecurringSchedule implements Schedule {

        /**
         * @throws InvalidArgument if
         *   a) the $crontab string is invalid
         */
        public function __construct(string $crontab) {}

        public function getSchedule(): string {}

    }

}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    final class ScheduledTime implements Schedule {

        /**
         * @throws InvalidArgument if
         *   a) $dateTime object is not initialized
         */
        public function __construct(\DateTimeInterface $dateTime) {}

        public function getSchedule(): \DateTimeImmutable {}

    }
}

/** @generate-class-entries */

namespace ZendHQ\JobQueue {

    /**
     * Job Queue job schedule interface.
     */
    interface Schedule {

        public function getSchedule(): mixed;

    }

}
