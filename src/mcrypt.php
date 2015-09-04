<?php

/**
 * @file
 * Defines symbols normally provided by ext_mcrypt.
 */

// Including this file really shouldn't happen unless mcrypt isn't loaded,
// but it's better to make sure we're not breaking things.
if (!extension_loaded('mcrypt')):

// mcrypt Constants
defined('MCRYPT_ENCRYPT') || define('MCRYPT_ENCRYPT', '0');
defined('MCRYPT_DECRYPT') || define('MCRYPT_DECRYPT', '1');
defined('MCRYPT_DEV_RANDOM') || define('MCRYPT_DEV_RANDOM', '0');
defined('MCRYPT_DEV_URANDOM') || define('MCRYPT_DEV_URANDOM', '1');
defined('MCRYPT_RAND') || define('MCRYPT_RAND', '2');
defined('MCRYPT_3DES') || define('MCRYPT_3DES', 'tripledes');
defined('MCRYPT_ARCFOUR_IV') || define('MCRYPT_ARCFOUR_IV', 'arcfour-iv');
defined('MCRYPT_ARCFOUR') || define('MCRYPT_ARCFOUR', 'arcfour');
defined('MCRYPT_BLOWFISH') || define('MCRYPT_BLOWFISH', 'blowfish');
defined('MCRYPT_BLOWFISH_COMPAT') || define('MCRYPT_BLOWFISH_COMPAT', 'blowfish-compat');
defined('MCRYPT_CAST_128') || define('MCRYPT_CAST_128', 'cast-128');
defined('MCRYPT_CAST_256') || define('MCRYPT_CAST_256', 'cast-256');
defined('MCRYPT_CRYPT') || define('MCRYPT_CRYPT', 'crypt');
defined('MCRYPT_DES') || define('MCRYPT_DES', 'des');
defined('MCRYPT_ENIGNA') || define('MCRYPT_ENIGNA', 'crypt');
defined('MCRYPT_GOST') || define('MCRYPT_GOST', 'gost');
defined('MCRYPT_LOKI97') || define('MCRYPT_LOKI97', 'loki97');
defined('MCRYPT_PANAMA') || define('MCRYPT_PANAMA', 'panama');
defined('MCRYPT_RC2') || define('MCRYPT_RC2', 'rc2');
defined('MCRYPT_RIJNDAEL_128') || define('MCRYPT_RIJNDAEL_128', 'rijndael-128');
defined('MCRYPT_RIJNDAEL_192') || define('MCRYPT_RIJNDAEL_192', 'rijndael-192');
defined('MCRYPT_RIJNDAEL_256') || define('MCRYPT_RIJNDAEL_256', 'rijndael-256');
defined('MCRYPT_SAFER64') || define('MCRYPT_SAFER64', 'safer-sk64');
defined('MCRYPT_SAFER128') || define('MCRYPT_SAFER128', 'safer-sk128');
defined('MCRYPT_SAFERPLUS') || define('MCRYPT_SAFERPLUS', 'saferplus');
defined('MCRYPT_SERPENT') || define('MCRYPT_SERPENT', 'serpent');
defined('MCRYPT_THREEWAY') || define('MCRYPT_THREEWAY', 'threeway');
defined('MCRYPT_TRIPLEDES') || define('MCRYPT_TRIPLEDES', 'tripledes');
defined('MCRYPT_TWOFISH') || define('MCRYPT_TWOFISH', 'twofish');
defined('MCRYPT_WAKE') || define('MCRYPT_WAKE', 'wake');
defined('MCRYPT_XTEA') || define('MCRYPT_XTEA', 'xtea');
defined('MCRYPT_IDEA') || define('MCRYPT_IDEA', 'idea');
defined('MCRYPT_MARS') || define('MCRYPT_MARS', 'mars');
defined('MCRYPT_RC6') || define('MCRYPT_RC6', 'rc6');
defined('MCRYPT_SKIPJACK') || define('MCRYPT_SKIPJACK', 'skipjack');
defined('MCRYPT_MODE_CBC') || define('MCRYPT_MODE_CBC', 'cbc');
defined('MCRYPT_MODE_CFB') || define('MCRYPT_MODE_CFB', 'cfb');
defined('MCRYPT_MODE_ECB') || define('MCRYPT_MODE_ECB', 'ecb');
defined('MCRYPT_MODE_NOFB') || define('MCRYPT_MODE_NOFB', 'nofb');
defined('MCRYPT_MODE_OFB') || define('MCRYPT_MODE_OFB', 'ofb');
defined('MCRYPT_MODE_STREAM') || define('MCRYPT_MODE_STREAM', 'stream');


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
 * @param int $cipher
 * @return int
 * @deprecated
 */
function mcrypt_get_key_size($cipher)
{
    throw new \cweagans\mcrypt\NotImplementedException();
}

/**
 * Get the block size of the specified cipher.
 *
 * @param int $cipher
 * @return int
 * @deprecated
 */
function mcrypt_get_block_size($cipher)
{
    throw new \cweagans\mcrypt\NotImplementedException();
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
    $names = array (
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
 * @param int $size
 * @param int $source
 *   This argument is ignored for the purposes of this polyfill. We just
 *   use the best randomness source available.
 * @return string
 * @deprecated
 */
function mcrypt_create_iv($size, $source = MCRYPT_DEV_URANDOM)
{
    return \phpseclib\Crypt\Random::string($size);
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
    return array (
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
    return array (
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
    $ciphers = mcrypt_list_algorithms();
    $modes = mcrypt_list_modes();
    if (!in_array($cipher, $ciphers) || !in_array($mode, $modes)) {
        return false;
    }

    $iv_sizes = array (
      'cast-128' =>
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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
        array (
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

    return $iv_sizes[$cipher][$mode];
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
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
function mcrypt_generic_init($td, $key, $iv)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
 * @param resource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_get_key_size($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
 * @param resource $td
 * @return int
 * @deprecated
 */
function mcrypt_enc_get_iv_size($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Returns the name of the opened algorithm.
 *
 * @param resource $td
 * @return string
 * @deprecated
 */
function mcrypt_enc_get_algorithms_name($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
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
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

/**
 * Close the mcrypt module.
 *
 * @param resource $td <p>
 * @return bool
 * @deprecated
 */
function mcrypt_module_close($td)
{
    throw new \cweagans\mcrypt\Exception\NotImplementedException();
}

endif;
