<?php

/**
 * @file
 * Faked replacement for the mcrypt resource used/returned by some mcrypt functions.
 */

namespace cweagans\mcrypt;

class McryptResource
{
    /**
     * @var string
     *   Encryption algorithm to use. One of the MCRYPT_ciphername constants.
     */
    protected $cipher;

    /**
     * @var string
     *   Encryption mode to use. One of the MCRYPT_MODE_modename constants.
     */
    protected $mode;

    /**
     * @var string
     *   The encryption key.
     */
    protected $key;

    /**
     * @var string
     *   The IV.
     */
    protected $iv;

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return McryptResource
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIv()
    {
        return $this->iv;
    }

    /**
     * @param mixed $iv
     * @return McryptResource
     */
    public function setIv($iv)
    {
        $this->iv = $iv;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     * @return McryptResource
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCipher()
    {
        return $this->cipher;
    }

    /**
     * @param mixed $cipher
     * @return McryptResource
     */
    public function setCipher($cipher)
    {
        $this->cipher = $cipher;
        return $this;
    }
}
