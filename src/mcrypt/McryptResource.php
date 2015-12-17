<?php

/**
 * @file
 * Faked replacement for the mcrypt resource used/returned by some mcrypt functions.
 */

namespace cweagans\mcrypt;

class McryptResource
{
    /**
     * @var string Encryption algorithm to use. One of the MCRYPT_ciphername constants.
     */
    protected $cipher;

    /**
     * @var string Encryption mode to use. One of the MCRYPT_MODE_modename constants.
     */
    protected $mode;

    /**
     * @var string The encryption key.
     */
    protected $key;

    /**
     * @var string The IV.
     */
    protected $iv;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getIv()
    {
        return $this->iv;
    }

    /**
     * @param string $iv
     *
     * @return self
     */
    public function setIv($iv)
    {
        $this->iv = $iv;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     *
     * @return self
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCipher()
    {
        return $this->cipher;
    }

    /**
     * @param string $cipher
     *
     * @return self
     */
    public function setCipher($cipher)
    {
        $this->cipher = $cipher;

        return $this;
    }
}
