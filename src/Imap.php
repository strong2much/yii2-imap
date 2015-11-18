<?php

namespace strong2much\imap;

use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * Imap Component. Class can be used for connecting and extracting Email messages.
 *
 * To use Imap, you should configure it in the application configuration like the following,
 *
 * ~~~
 * 'components' => [
 *     ...
 *     'imap' => [
 *         'class' => 'vendor\strong2much\yii2-imap\Imap',
 *         'config' => [
 *             'path' => '{imap.gmail.com:993/imap/ssl}INBOX',
 *             'login' => 'username',
 *             'password' => 'password',
 *             'encoding'=>'encoding' // utf-8 default.
 *         ],
 *     ],
 *     ...
 * ],
 * ~~~
**/
class Imap extends Mailbox
{
    private $_config = [];    

    /**
     * @param array $connection configuration array
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function setConfig($connection)
    {
        if (!is_array($connection)) {
            throw new InvalidConfigException('Invalid configuration');
        }
        $this->_config = $connection;

        $this->path = $this->_config['path'];
        $this->login = $this->_config['login'];
        $this->password = $this->_config['password'];
        $this->encoding = $this->_config['encoding'];
        $this->attachmentsDir = $this->_config['attachmentsDir'];
        if($this->attachmentsDir) {
            if(!is_dir($this->attachmentsDir)) {
                throw new Exception('Directory "' . $this->attachmentsDir . '" not found');
            }
            $this->attachmentsDir = rtrim(realpath($this->attachmentsDir), '\\/');
        }
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }
}
