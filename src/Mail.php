<?php
namespace strong2much\imap;

/**
 * Mail class file
 *
 * Helper class to be filled with the properties of a message.
 */
class Mail
{
    /**
     * @var integer the UID of the message
     */
    public $UID;

    /**
     * @var string the date of the message
     */
    public $date;

    /**
     * @var string the subject
     */
    public $subject;

    /**
     * @var string the sender name
     */
    public $fromName;

    /**
     * @var string the sender email address
     */
    public $fromAddress;

    /**
     * @var array recipients
     */
    public $to = array();

    /**
     * @var string recipients
     */
    public $toString;

    /**
     * @var array CC
     */
    public $cc = array();

    /**
     * @var array reply_to addresses and names
     */
    public $replyTo = array();

    /**
     * @var string the body text
     */
    public $textPlain;

    /**
     * @var string the body html
     */
    public $textHtml;

    /**
     * @var string holds a copy of the original body html
     */
    public $textHtmlOriginal;

    /**
     * @var Attachment[] the attachments of the message
     */
    public $attachments;

    /**
     * Fetches internal message links so they have local references (where attachments were saved to)
     * @param $baseUrl
     */
    public function fetchMessageInternalLinks($baseUrl)
    {
        if ($this->textHtml) {
            foreach ($this->attachments as $attachment) {
                if (isset($attachment->id)) {
                    $filename = basename($attachment->filePath);
                    $this->textHtml = preg_replace('/(<img[^>]*?)src=["\']?ci?d:' . preg_quote($attachment->id) . '["\']?/is', '\\1 src="' . $baseUrl . $filename . '"', $this->textHtml);
                }
            }
        }
    }

    /**
     * Cleans textHtml from unwanted html tags
     * @param array $stripTags the tags to remove (you can add those you do not wish)
     */
    public function fetchMessageHtmlTags($stripTags = array('html', 'body', 'head', 'meta'))
    {
        if ($this->textHtml) {
            foreach ($stripTags as $tag) {
                $this->textHtml = preg_replace('/<\/?' . $tag . '.*?>/is', '', $this->textHtml);
            }
            $this->textHtml = trim($this->textHtml, " \r\n");
        }
    }

}