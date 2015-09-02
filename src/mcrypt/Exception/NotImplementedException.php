<?php

namespace cweagans\mcrypt\Exception;

class NotImplementedException extends \Exception
{
    /**
     * Sets the Exception message appropriately based on the caller.
     *
     * @param string $message
     * @param int $code
     * @param \cweagans\mcrypt\Exception\Exception|null $previous
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        $trace = debug_backtrace();
        $caller = $trace[1];
        $this->message = $caller['function'] . '() is not yet implemented.';
    }
}
