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
