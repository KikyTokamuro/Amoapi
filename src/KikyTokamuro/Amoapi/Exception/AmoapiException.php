<?php

namespace Amoapi\Exception;

use Exception;
use Throwable;

/**
 * Class AmoapiException
 * 
 * @package Amoapi\Exception
 */
class AmoapiException extends Exception
{    
    /**
     * AmoapiException construct
     *
     * @param  string $message
     * @param  int $code
     * @param  Throwable $previous
     * @return void
     */
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
    /**
     * Convert to string
     *
     * @return void
     */
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}