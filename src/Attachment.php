<?php
namespace strong2much\imap;

/**
 * Attachment class file
 *
 * Helper class to be filled with the properties of a mail attachments.
 */
class Attachment
{
    /**
     * @var string structure.id
     */
    public $id;

    /**
     * @var string where it was saved
     */
    public $filePath;

    /**
     * @var string given filename
     */
    public $fileName;

    /**
     * @var string subtype i.e. jpeg, gif, zip
     */
    public $subType;
	
    /**
     * @var string mime type i.e. text/plain
     */
    public $mimeType;
}