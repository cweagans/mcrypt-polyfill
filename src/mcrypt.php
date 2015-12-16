<?php

/**
 * @file
 * Defines symbols normally provided by ext_mcrypt.
 */

use cweagans\mcrypt\McryptResource;

// Including this file really shouldn't happen unless mcrypt isn't loaded,
// but it's better to make sure we're not breaking things.
if (!extension_loaded('mcrypt')):

// mcrypt Constants
define('MCRYPT_ENCRYPT', 0);
define('MCRYPT_DECRYPT', 1);
define('MCRYPT_DEV_RANDOM', 0);
define('MCRYPT_DEV_URANDOM', 1);
define('MCRYPT_RAND', 2);
define('MCRYPT_3DES', 'tripledes');
define('MCRYPT_ARCFOUR_IV', 'arcfour-iv');
define('MCRYPT_ARCFOUR', 'arcfour');
define('MCRYPT_BLOWFISH', 'blowfish');
define('MCRYPT_BLOWFISH_COMPAT', 'blowfish-compat');
define('MCRYPT_CAST_128', 'cast-128');
define('MCRYPT_CAST_256', 'cast-256');
define('MCRYPT_CRYPT', 'crypt');
define('MCRYPT_DES', 'des');
define('MCRYPT_ENIGNA', 'crypt');
define('MCRYPT_GOST', 'gost');
define('MCRYPT_LOKI97', 'loki97');
define('MCRYPT_PANAMA', 'panama');
define('MCRYPT_RC2', 'rc2');
define('MCRYPT_RIJNDAEL_128', 'rijndael-128');
define('MCRYPT_RIJNDAEL_192', 'rijndael-192');
define('MCRYPT_RIJNDAEL_256', 'rijndael-256');
define('MCRYPT_SAFER64', 'safer-sk64');
define('MCRYPT_SAFER128', 'safer-sk128');
define('MCRYPT_SAFERPLUS', 'saferplus');
define('MCRYPT_SERPENT', 'serpent');
define('MCRYPT_THREEWAY', 'threeway');
define('MCRYPT_TRIPLEDES', 'tripledes');
define('MCRYPT_TWOFISH', 'twofish');
define('MCRYPT_WAKE', 'wake');
define('MCRYPT_XTEA', 'xtea');
define('MCRYPT_IDEA', 'idea');
define('MCRYPT_MARS', 'mars');
define('MCRYPT_RC6', 'rc6');
define('MCRYPT_SKIPJACK', 'skipjack');
define('MCRYPT_MODE_CBC', 'cbc');
define('MCRYPT_MODE_CFB', 'cfb');
define('MCRYPT_MODE_ECB', 'ecb');
define('MCRYPT_MODE_NOFB', 'nofb');
define('MCRYPT_MODE_OFB', 'ofb');
define('MCRYPT_MODE_STREAM', 'stream');

/**
 * Encrypt/decrypt data in ECB mode.
 *
 * @param int $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @return string
 * @deprecated
 */
function mcrypt_ecb($cipher, $key, $data, $mode)
{
    throw new \cweagans\mcrypt\NotImplementedException();
}

/**
 * Encrypt/decrypt data in CBC mode.
 *
 * @param int $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 * @deprecated
 */
function mcrypt_cbc($cipher, $key, $data, $mode, $iv = null)
{
    throw new \cweagans\mcrypt\NotImplementedException();
}

/**
 * Encrypt/decrypt data in CFB mode.
 *
 * @param int $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 * @deprecated
 */
function mcrypt_cfb($cipher, $key, $data, $mode, $iv)
{
    throw new \cweagans\mcrypt\NotImplementedException();
}

/**
 * Encrypt/decrypt data in OFB mode.
 *
 * @param int $cipher
 * @param string $key
 * @param string $data
 * @param int $mode
 * @param string $iv
 * @return string
 * @deprecated
 */
function mcrypt_ofb($cipher, $key, $data, $mode, $iv)
{
    throw new \cweagans\mcrypt\NotImplementedException();
}

/**
 * Get the key size of the specified cipher.
 *
 * @param string $cipher
 * @param string $mode
 * @return int
 * @deprecated
 */
function mcrypt_get_key_size($cipher, $mode)
{
    $ciphers = mcrypt_list_algorithms();
    $modes = mcrypt_list_modes();
    if (!in_array($cipher, $ciphers) || !in_array($mode, $modes)) {
        return false;
    }

    $key_sizes = array(
        'cast-128' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'gost' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'rijndael-128' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'twofish' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'arcfour' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 256,
            ),
        'cast-256' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'loki97' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'rijndael-192' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'saferplus' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'wake' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 32,
            ),
        'blowfish-compat' =>
            array(
                'cbc' => 56,
                'cfb' => 56,
                'ctr' => 56,
                'ecb' => 56,
                'ncfb' => 56,
                'nofb' => 56,
                'ofb' => 56,
                'stream' => false,
            ),
        'des' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'rijndael-256' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'serpent' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'xtea' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'blowfish' =>
            array(
                'cbc' => 56,
                'cfb' => 56,
                'ctr' => 56,
                'ecb' => 56,
                'ncfb' => 56,
                'nofb' => 56,
                'ofb' => 56,
                'stream' => false,
            ),
        'enigma' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 13,
            ),
        'rc2' =>
            array(
                'cbc' => 128,
                'cfb' => 128,
                'ctr' => 128,
                'ecb' => 128,
                'ncfb' => 128,
                'nofb' => 128,
                'ofb' => 128,
                'stream' => false,
            ),
        'tripledes' =>
            array(
                'cbc' => 24,
                'cfb' => 24,
                'ctr' => 24,
                'ecb' => 24,
                'ncfb' => 24,
                'nofb' => 24,
                'ofb' => 24,
                'stream' => false,
            ),
    );
}

/**
 * Get the block size of the specified cipher.
 *
 * @param string $cipher
 * @param string $mode
 * @return int
 * @deprecated
 */
function mcrypt_get_block_size($cipher, $mode)
{
    $ciphers = mcrypt_list_algorithms();
    $modes = mcrypt_list_modes();
    if (!in_array($cipher, $ciphers) || !in_array($mode, $modes)) {
        return false;
    }

    $block_sizes = array(
        'cast-128' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'gost' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'rijndael-128' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'twofish' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'arcfour' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 1,
            ),
        'cast-256' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'loki97' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'rijndael-192' =>
            array(
                'cbc' => 24,
                'cfb' => 24,
                'ctr' => 24,
                'ecb' => 24,
                'ncfb' => 24,
                'nofb' => 24,
                'ofb' => 24,
                'stream' => false,
            ),
        'saferplus' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'wake' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 1,
            ),
        'blowfish-compat' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'des' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'rijndael-256' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'serpent' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'xtea' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'blowfish' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'enigma' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 1,
            ),
        'rc2' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'tripledes' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
    );

    return $block_sizes[$cipher][$mode];
}

/**
 * Get the name of the specified cipher.
 *
 * @param int $cipher
 * @return string
 * @deprecated
 */
function mcrypt_get_cipher_name($cipher)
{
    $names = array(
        'tripledes' => '3DES',
        'arcfour-iv' => false,
        'arcfour' => 'RC4',
        'blowfish' => 'Blowfish',
        'blowfish-compat' => 'Blowfish',
        'cast-128' => 'CAST-128',
        'cast-256' => 'CAST-256',
        'crypt' => false,
        'des' => 'DES',
        'gost' => 'GOST',
        'loki97' => 'LOKI97',
        'panama' => false,
        'rc2' => 'RC2',
        'rijndael-128' => 'Rijndael-128',
        'rijndael-192' => 'Rijndael-192',
        'rijndael-256' => 'Rijndael-256',
        'safer-sk64' => false,
        'safer-sk128' => false,
        'saferplus' => 'Safer+',
        'serpent' => 'Serpent',
        'threeway' => false,
        'twofish' => 'Twofish',
        'wake' => 'WAKE',
        'xtea' => 'xTEA',
        'idea' => false,
        'mars' => false,
        'rc6' => false,
        'skipjack' => false,
    );

    if (!in_array($cipher, array_values($names))) {
        return false;
    }

    return $names[$cipher];
}

/**
 * Create an initialization vector (IV) from a random source.
 *
 * Note that paragonie\random_compat adds a userspace implementation of
 * random_bytes() in the event that we're running on a version of PHP
 * less than 7.
 *
 * @param int $size
 * @param int $source
 *   This argument is ignored for the purposes of this polyfill. We just
 *   use the best randomness source available.
 * @return string
 * @deprecated
 */
function mcrypt_create_iv($size, $source = MCRYPT_DEV_URANDOM)
{
    return random_bytes($size);
}

/**
 * Get an array of all supported ciphers.
 *
 * @param string $lib_dir
 * @return array
 * @deprecated
 */
function mcrypt_list_algorithms($lib_dir = null)
{
    return array(
        0 => 'cast-128',
        1 => 'gost',
        2 => 'rijndael-128',
        3 => 'twofish',
        4 => 'arcfour',
        5 => 'cast-256',
        6 => 'loki97',
        7 => 'rijndael-192',
        8 => 'saferplus',
        9 => 'wake',
        10 => 'blowfish-compat',
        11 => 'des',
        12 => 'rijndael-256',
        13 => 'serpent',
        14 => 'xtea',
        15 => 'blowfish',
        16 => 'enigma',
        17 => 'rc2',
        18 => 'tripledes',
    );
}

/**
 * Get an array of all supported modes.
 *
 * @param string $lib_dir
 * @return array
 * @deprecated
 */
function mcrypt_list_modes($lib_dir = null)
{
    return array(
        0 => 'cbc',
        1 => 'cfb',
        2 => 'ctr',
        3 => 'ecb',
        4 => 'ncfb',
        5 => 'nofb',
        6 => 'ofb',
        7 => 'stream',
    );
}

/**
 * Returns the size of the IV belonging to a specific cipher/mode combination.
 *
 * @param string $cipher
 * @param string $mode
 * @return int
 * @deprecated
 */
function mcrypt_get_iv_size($cipher, $mode)
{
    $iv_sizes = array(
        'cast-128' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'gost' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'rijndael-128' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'twofish' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'arcfour' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 0,
            ),
        'cast-256' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'loki97' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'rijndael-192' =>
            array(
                'cbc' => 24,
                'cfb' => 24,
                'ctr' => 24,
                'ecb' => 24,
                'ncfb' => 24,
                'nofb' => 24,
                'ofb' => 24,
                'stream' => false,
            ),
        'saferplus' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'wake' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 0,
            ),
        'blowfish-compat' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'des' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'rijndael-256' =>
            array(
                'cbc' => 32,
                'cfb' => 32,
                'ctr' => 32,
                'ecb' => 32,
                'ncfb' => 32,
                'nofb' => 32,
                'ofb' => 32,
                'stream' => false,
            ),
        'serpent' =>
            array(
                'cbc' => 16,
                'cfb' => 16,
                'ctr' => 16,
                'ecb' => 16,
                'ncfb' => 16,
                'nofb' => 16,
                'ofb' => 16,
                'stream' => false,
            ),
        'xtea' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'blowfish' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'enigma' =>
            array(
                'cbc' => false,
                'cfb' => false,
                'ctr' => false,
                'ecb' => false,
                'ncfb' => false,
                'nofb' => false,
                'ofb' => false,
                'stream' => 0,
            ),
        'rc2' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
        'tripledes' =>
            array(
                'cbc' => 8,
                'cfb' => 8,
                'ctr' => 8,
                'ecb' => 8,
                'ncfb' => 8,
                'nofb' => 8,
                'ofb' => 8,
                'stream' => false,
            ),
    );

    if (isset($iv_sizes[$cipher][$mode]) && $iv_sizes[$cipher][$mode] !== false) {
        return $iv_sizes[$cipher][$mode];
    }

    trigger_error('mcrypt_get_iv_size(): Module initialization failed', E_USER_WARNING);

    return false;
}

/**
 * Encrypts plaintext with given parameters.
 *
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param string $mode
 * @param string $iv
 * @return string
 * @deprecated
 */
function mcrypt_encrypt($cipher, $key, $data, $mode, $iv = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Decrypts crypttext with given parameters.
 *
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param string $mode
 * @param string $iv
 * @return string
 * @deprecated
 */
function mcrypt_decrypt($cipher, $key, $data, $mode, $iv = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Opens the module of the algorithm and the mode to be used.
 *
 * @param string $algorithm
 * @param string $algorithm_directory
 * @param string $mode
 * @param string $mode_directory
 * @return resource
 * @deprecated
 */
function mcrypt_module_open($algorithm, $algorithm_directory, $mode, $mode_directory)
{
    // If the algorithm or mode isn't in the list of supported ones,
    // bail out early.
    if (!in_array($algorithm, mcrypt_list_algorithms())) {
        return false;
    }
    if (!in_array($mode, mcrypt_list_modes())) {
        return false;
    }

    // Since we can't actually return a resource, we have to fake it a bit.
    // Most code that doesn't call is_resource() will behave appropriately
    // in this case, but some amount of breakage is unavoidable.
    $resource = new McryptResource();
    $resource->setCipher($algorithm)->setMode($mode);
    return $resource;
}

/**
 * This function initializes all buffers needed for encryption.
 *
 * @param resource $td
 * @param string $key
 * @param string $iv
 * @return int
 * @deprecated
 */
function mcrypt_generic_init(&$td, $key, $iv)
{
    // This could be type hinted, but the function docs say that
    // incorrect params = return false.
    if (!$td instanceof McryptResource) {
        return false;
    }

    $req_iv_length = mcrypt_enc_get_iv_size($td);
    $iv_length = strlen($iv);
    if ($req_iv_lengthh !== $iv_length) {
        // @TODO: Figure out the right warning(s) to emit here.
    }

    // @TODO: Validate $key length

    $td->setKey($key)->setIv($iv);
}

/**
 * This function encrypts data.
 *
 * @param resource $td
 * @param string $data
 * @return string
 * @deprecated
 */
function mcrypt_generic($td, $data)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Decrypt data.
 *
 * @param resource $td
 * @param string $data
 * @return string
 * @deprecated
 */
function mdecrypt_generic($td, $data)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * This function terminates encryption.
 *
 * @param resource $td
 * @return bool
 * @deprecated
 */
function mcrypt_generic_end($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * This function deinitializes an encryption module.
 *
 * @param resource $td
 * @return bool
 * @deprecated
 */
function mcrypt_generic_deinit($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Runs a self test on the opened module.
 *
 * @param resource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_self_test($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Checks whether the encryption of the opened mode works on blocks.
 *
 * @param resource $td
 * @return bool
 * @deprecated
 */
function mcrypt_enc_is_block_algorithm_mode($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Checks whether the algorithm of the opened mode is a block algorithm.
 *
 * @param resource $td
 * @return bool
 * @deprecated
 */
function mcrypt_enc_is_block_algorithm($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Checks whether the opened mode outputs blocks.
 *
 * @param resource $td
 * @return bool
 * @deprecated
 */
function mcrypt_enc_is_block_mode($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns the blocksize of the opened algorithm.
 *
 * @param resource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_get_block_size($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns the maximum supported keysize of the opened mode.
 *
 * @param McryptResource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_get_key_size($td)
{
    if (!$td instanceof McryptResource) {
        return false;
    }

    $cipher = $td->getCipher();
    $mode = $td->getMode();

    return mcrypt_get_key_size($cipher, $mode);
}

/**
 * Returns an array with the supported keysizes of the opened algorithm.
 *
 * @param resource $td
 * @return array
 * @deprecated
 */
function mcrypt_enc_get_supported_key_sizes($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns the size of the IV of the opened algorithm.
 *
 * @param McryptResource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_get_iv_size(McryptResource $td)
{
    $cipher = $td->getCipher();
    $mode = $td->getMode();
    return mcrypt_get_iv_size($cipher, $mode);
}

/**
 * Returns the name of the opened algorithm.
 *
 * @param McryptResource $td
 * @return string
 * @deprecated
 */
function mcrypt_enc_get_algorithms_name($td)
{
    if (!td instanceof McryptResource) {
        return false;
    }

    return mcrypt_get_cipher_name($td->getMode());
}

/**
 * Returns the name of the opened mode.
 *
 * @param resource $td
 * @return string
 * @deprecated
 */
function mcrypt_enc_get_modes_name($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * This function runs a self test on the specified module.
 *
 * @param string $algorithm
 * @param string $lib_dir
 * @return bool
 * @deprecated
 */
function mcrypt_module_self_test($algorithm, $lib_dir = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns if the specified module is a block algorithm or not.
 *
 * @param string $mode
 * @param string $lib_dir
 * @return bool
 * @deprecated
 */
function mcrypt_module_is_block_algorithm_mode($mode, $lib_dir = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * This function checks whether the specified algorithm is a block algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 * @return bool
 * @deprecated
 */
function mcrypt_module_is_block_algorithm($algorithm, $lib_dir = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns if the specified mode outputs blocks or not.
 *
 * @param string $mode
 * @param string $lib_dir
 * @return bool
 * @deprecated
 */
function mcrypt_module_is_block_mode($mode, $lib_dir = null)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns the blocksize of the specified algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 * @return int
 * @deprecated
 */
function mcrypt_module_get_algo_block_size($algorithm, $lib_dir = null)
{
    $block_sizes = array(
        'cast-128' => 8,
        'gost' => 8,
        'rijndael-128' => 16,
        'twofish' => 16,
        'arcfour' => 1,
        'cast-256' => 16,
        'loki97' => 16,
        'rijndael-192' => 24,
        'saferplus' => 16,
        'wake' => 1,
        'blowfish-compat' => 8,
        'des' => 8,
        'rijndael-256' => 32,
        'serpent' => 16,
        'xtea' => 8,
        'blowfish' => 8,
        'enigma' => 1,
        'rc2' => 8,
        'tripledes' => 8,
    );

    return $block_sizes[$algorithm];
}

/**
 * Returns the maximum supported keysize of the opened mode.
 *
 * @param string $algorithm
 * @param string $lib_dir
 * @return int
 * @deprecated
 */
function mcrypt_module_get_algo_key_size($algorithm, $lib_dir = null)
{
    $max_key_sizes = array(
        'cast-128' => 16,
        'gost' => 32,
        'rijndael-128' => 32,
        'twofish' => 32,
        'arcfour' => 256,
        'cast-256' => 32,
        'loki97' => 32,
        'rijndael-192' => 32,
        'saferplus' => 32,
        'wake' => 32,
        'blowfish-compat' => 56,
        'des' => 8,
        'rijndael-256' => 32,
        'serpent' => 32,
        'xtea' => 16,
        'blowfish' => 56,
        'enigma' => 13,
        'rc2' => 128,
        'tripledes' => 24,
    );

    return $max_key_sizes[$algorithm];
}

/**
 * Returns an array with the supported keysizes of the opened algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 * @return array
 * @deprecated
 */
function mcrypt_module_get_supported_key_sizes($algorithm, $lib_dir = null)
{
    $key_sizes = array(
        'cast-128' =>
            array(
                0 => 16,
            ),
        'gost' =>
            array(
                0 => 32,
            ),
        'rijndael-128' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'twofish' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'arcfour' =>
            array(
            ),
        'cast-256' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'loki97' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'rijndael-192' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'saferplus' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'wake' =>
            array(
                0 => 32,
            ),
        'blowfish-compat' =>
            array(
            ),
        'des' =>
            array(
                0 => 8,
            ),
        'rijndael-256' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'serpent' =>
            array(
                0 => 16,
                1 => 24,
                2 => 32,
            ),
        'xtea' =>
            array(
                0 => 16,
            ),
        'blowfish' =>
            array(
            ),
        'enigma' =>
            array(
            ),
        'rc2' =>
            array(
            ),
        'tripledes' =>
            array(
                0 => 24,
            ),
    );

    return $key_sizes[$algorithm];
}

/**
 * Close the mcrypt module.
 *
 * @param McryptResource $td
 * @return bool
 * @deprecated
 */
function mcrypt_module_close($td)
{
    return true;
}

endif;
