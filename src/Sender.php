<?php
namespace strong2much\imap;

/**
 * Sender class file
 *
 * Helper class to be filled with the properties of a sender.
 */
class Sender
{
    /**
     * @var string the sender email
     */
    public $fromEmail;

    /**
     * @var string the sender name
     */
    public $fromName;

    /**
     * @var string the reply to email
     */
    public $replyToEmail;

    /**
     * @var string the reply to name
     */
    public $replyToName;
}