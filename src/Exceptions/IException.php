<?php

namespace notesow\translatorAPI\Exceptions;

// TODO: remove this check once we drop support for PHP 5
if (\interface_exists(\Throwable::class, false)) {
    /**
     * The base interface for all PaySDK exceptions.
     */
    interface IException extends \Throwable
    {
    }
} else {
    /**
     * The base interface for all PaySDK exceptions.
     */
    interface IException
    {
    }
}