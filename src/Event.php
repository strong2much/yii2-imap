<?php
namespace strong2much\imap;

/**
 * Sender class file
 *
 * Helper class to be filled with the properties of a sender.
 */
class Event
{
    /**
     * Passed on beforeConnect and on afterConnect, on imapError is null
     * @var string
     */
    public $mailbox;

    /**
     * Passed on beforeConnect, on afterConnect and on imapError is null
     * @var string
     */
    public $stream;

    /**
     * Passed on imapError event, null on beforeConnect and on afterConnect
     * @var string
     */
    public $errorMessage = "";
}