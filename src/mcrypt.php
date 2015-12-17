<?php

/**
 * @file
 * Defines symbols normally provided by ext_mcrypt.
 */

use cweagans\mcrypt\McryptResource;
use phpseclib\Crypt\Base;
use phpseclib\Crypt\Blowfish;
use phpseclib\Crypt\Rijndael;
use phpseclib\Crypt\TripleDES;

// Including this file really shouldn't happen unless mcrypt isn't loaded, but
// it's better to make sure we're not breaking things.
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
 * @param int    $cipher
 * @param string $key
 * @param string $data
 * @param int    $mode
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_ecb($cipher, $key, $data, $mode, $iv = false)
{
    trigger_error('Function mcrypt_ecb() is deprecated', E_USER_DEPRECATED);

    switch ($mode) {
        case MCRYPT_ENCRYPT:
            return __mcrypt_do_encrypt($cipher, $key, $data, MCRYPT_MODE_ECB, $iv);

        case MCRYPT_DECRYPT:
            return __mcrypt_do_decrypt($cipher, $key, $data, MCRYPT_MODE_ECB, $iv);
    }
}

/**
 * Encrypt/decrypt data in CBC mode.
 *
 * @param int    $cipher
 * @param string $key
 * @param string $data
 * @param int    $mode
 * @param string $iv
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_cbc($cipher, $key, $data, $mode, $iv = false)
{
    trigger_error('Function mcrypt_cbc() is deprecated', E_USER_DEPRECATED);

    switch ($mode) {
        case MCRYPT_ENCRYPT:
            return __mcrypt_do_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);

        case MCRYPT_DECRYPT:
            return __mcrypt_do_decrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
    }
}

/**
 * Encrypt/decrypt data in CFB mode.
 *
 * @param int    $cipher
 * @param string $key
 * @param string $data
 * @param int    $mode
 * @param string $iv
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_cfb($cipher, $key, $data, $mode, $iv = false)
{
    trigger_error('Function mcrypt_cfb() is deprecated', E_USER_DEPRECATED);

    switch ($mode) {
        case MCRYPT_ENCRYPT:
            return __mcrypt_do_encrypt($cipher, $key, $data, MCRYPT_MODE_CFB, $iv);

        case MCRYPT_DECRYPT:
            return __mcrypt_do_decrypt($cipher, $key, $data, MCRYPT_MODE_CFB, $iv);
    }
}

/**
 * Encrypt/decrypt data in OFB mode.
 *
 * @param int    $cipher
 * @param string $key
 * @param string $data
 * @param int    $mode
 * @param string $iv
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_ofb($cipher, $key, $data, $mode, $iv = false)
{
    trigger_error('Function mcrypt_ofb() is deprecated', E_USER_DEPRECATED);

    switch ($mode) {
        case MCRYPT_ENCRYPT:
            return __mcrypt_do_encrypt($cipher, $key, $data, MCRYPT_MODE_OFB, $iv);

        case MCRYPT_DECRYPT:
            return __mcrypt_do_decrypt($cipher, $key, $data, MCRYPT_MODE_OFB, $iv);
    }
}

/**
 * Get the key size of the specified cipher.
 *
 * @param string $cipher
 * @param string $mode
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_get_key_size($cipher, $mode)
{
    $key_sizes = __mcrypt_get_key_sizes();

    if (isset($key_sizes[$cipher][$mode]) && $key_sizes[$cipher][$mode] !== false) {
        return $key_sizes[$cipher][$mode];
    }

    trigger_error('mcrypt_get_key_size(): Module initialization failed', E_USER_WARNING);

    return false;
}

/**
 * Get the block size of the specified cipher.
 *
 * @param string $cipher
 * @param string $mode
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_get_block_size($cipher, $mode)
{
    return __mcrypt_get_block_size($cipher, $mode);
}

function __mcrypt_get_block_size($cipher, $mode)
{
    $block_sizes = __mcrypt_get_block_sizes();

    if (isset($block_sizes[$cipher][$mode]) && $block_sizes[$cipher][$mode] !== false) {
        return $block_sizes[$cipher][$mode];
    }

    $caller = __mcrypt_get_caller();
    trigger_error("$caller(): Module initialization failed", E_USER_WARNING);

    return false;
}

/**
 * Get the name of the specified cipher.
 *
 * @param int $cipher
 *
 * @return string
 *
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

    if (isset($names[$cipher]) && $names[$cipher] !== false) {
        return $names[$cipher];
    }

    trigger_error('mcrypt_get_cipher_name(): Module initialization failed', E_USER_WARNING);

    return false;
}

/**
 * Create an initialization vector (IV) from a random source.
 *
 * Note that paragonie\random_compat adds a userspace implementation of
 * random_bytes() in the event that we're running on a version of PHP
 * less than 7.
 *
 * The $srouce argument is ignored for the purposes of this polyfill. We just
 * use the best randomness sourceavailable.
 *
 * @param int $size
 * @param int $source
 *
 * @return string
 *
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
 *
 * @return array
 *
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
 *
 * @return array
 *
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
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_get_iv_size($cipher, $mode)
{
    $iv_sizes = __mcrypt_get_iv_sizes();

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
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_encrypt($cipher, $key, $data, $mode, $iv = false)
{
    return __mcrypt_do_encrypt($cipher, $key, $data, $mode, $iv);
}

/**
 * Decrypts crypttext with given parameters.
 *
 * @param string $cipher
 * @param string $key
 * @param string $data
 * @param string $mode
 * @param string $iv
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_decrypt($cipher, $key, $data, $mode, $iv = false)
{
    return __mcrypt_do_decrypt($cipher, $key, $data, $mode, $iv);
}

/**
 * Opens the module of the algorithm and the mode to be used.
 *
 * @param string $algorithm
 * @param string $algorithm_directory
 * @param string $mode
 * @param string $mode_directory
 *
 * @return resource
 *
 * @deprecated
 */
function mcrypt_module_open($algorithm, $algorithm_directory, $mode, $mode_directory)
{
    // If the algorithm or mode isn't in the list of supported ones,
    // bail out early.
    if (!in_array($algorithm, mcrypt_list_algorithms(), true)) {
        trigger_error('mcrypt_module_open(): Could not open encryption module', E_USER_WARNING);

        return false;
    }
    if (!in_array($mode, mcrypt_list_modes(), true)) {
        trigger_error('mcrypt_module_open(): Could not open encryption module', E_USER_WARNING);

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
 * @param string   $key
 * @param string   $iv
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_generic_init($td, $key, $iv)
{
    // This could be type hinted, but the function docs say that
    // incorrect params = return false.
    if (!__mcrypt_check_resource_type($td)) {
        return false;
    }

    $key_length = __mcrypt_strlen($key);
    $iv_length = __mcrypt_strlen($iv);

    if ($key_length === 0) {
        trigger_error('mcrypt_generic_init(): Key size is 0');
        return false;
    }

    $cipher = $td->getCipher();
    $mode = $td->getMode();

    $max_key_size = __mcrypt_get_key_sizes()[$cipher][$mode];
    if ($key_length > $max_key_size) {
        trigger_error("mcrypt_generic_init(): Key size too large; supplied length: $key_length, max: $max_key_size");
        return false;
    }


    $iv_size = __mcrypt_get_iv_sizes()[$cipher][$mode];
    if ($iv_length !== $iv_size) {
        trigger_error("mcrypt_generic_init(): Iv size incorrect; supplied length: $iv_length, needed: $iv_size");
        return false;
    }

    $td->setKey($key)->setIv($iv);

    return 0;
}

/**
 * This function encrypts data.
 *
 * @param resource $td
 * @param string   $data
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_generic($td, $data)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_encrypt($td->getCipher(), $td->getKey(), $data, $td->getMode(), $td->getIv());
}

/**
 * Decrypt data.
 *
 * @param resource $td
 * @param string   $data
 *
 * @return string
 *
 * @deprecated
 */
function mdecrypt_generic($td, $data)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_decrypt($td->getCipher(), $td->getKey(), $data, $td->getMode(), $td->getIv());
}

/**
 * This function terminates encryption.
 *
 * @param resource $td
 *
 * @return bool
 *
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
 *
 * @return bool
 *
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
 *
 * @return int
 *
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
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_enc_is_block_algorithm_mode($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_module_is_block_algorithm_mode($td->getMode());
}

/**
 * Checks whether the algorithm of the opened mode is a block algorithm.
 *
 * @param resource $td
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_enc_is_block_algorithm($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_module_is_block_algorithm($td->getCipher());
}

/**
 * Checks whether the opened mode outputs blocks.
 *
 * @param resource $td
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_enc_is_block_mode($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_module_is_block_mode($td->getMode());
}

/**
 * Returns the blocksize of the opened algorithm.
 *
 * @param resource $td
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_enc_get_block_size($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return __mcrypt_get_block_size($td->getCipher(), $td->getMode());
}

/**
 * Returns the maximum supported keysize of the opened mode.
 *
 * @param McryptResource $td
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_enc_get_key_size($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    $cipher = $td->getCipher();
    $mode = $td->getMode();

    return mcrypt_get_key_size($cipher, $mode);
}

/**
 * Returns an array with the supported keysizes of the opened algorithm.
 *
 * @param resource $td
 *
 * @return array
 *
 * @deprecated
 */
function mcrypt_enc_get_supported_key_sizes($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_module_get_supported_key_sizes($td->getCipher());
}

/**
 * Returns the size of the IV of the opened algorithm.
 *
 * @param McryptResource $td
 *
 * @return int
 *
 * @deprecated
 */
function mcrypt_enc_get_iv_size($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_get_iv_size($td->getCipher(), $td->getMode());
}

/**
 * Returns the name of the opened algorithm.
 *
 * @param McryptResource $td
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_enc_get_algorithms_name($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return mcrypt_get_cipher_name($td->getCipher());
}

/**
 * Returns the name of the opened mode.
 *
 * @param resource $td
 *
 * @return string
 *
 * @deprecated
 */
function mcrypt_enc_get_modes_name($td)
{
    if (!__mcrypt_check_resource_type($td)) {
        return;
    }

    return strtoupper($td->getMode());
}

/**
 * This function runs a self test on the specified module.
 *
 * @param string $algorithm
 * @param string $lib_dir
 *
 * @return bool
 *
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
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_module_is_block_algorithm_mode($mode, $lib_dir = null)
{
    switch ($mode) {
        case MCRYPT_MODE_CBC:
        case MCRYPT_MODE_CFB:
        case MCRYPT_MODE_ECB:
        case MCRYPT_MODE_NOFB:
        case MCRYPT_MODE_OFB:
        case 'ctr':
        case 'ncfb':
            return true;

        // These are listed here for completeness.
        // mcrypt_module_is_block_algorithm_mode() should return false for
        // unkown values.
        case MCRYPT_MODE_STREAM:
        default:
            return false;
    }
}

/**
 * This function checks whether the specified algorithm is a block algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_module_is_block_algorithm($algorithm, $lib_dir = null)
{
    switch ($algorithm) {
        case MCRYPT_3DES:
        case MCRYPT_BLOWFISH:
        case MCRYPT_BLOWFISH_COMPAT:
        case MCRYPT_CAST_128:
        case MCRYPT_CAST_256:
        case MCRYPT_DES:
        case MCRYPT_GOST:
        case MCRYPT_LOKI97:
        case MCRYPT_RC2:
        case MCRYPT_RIJNDAEL_128:
        case MCRYPT_RIJNDAEL_192:
        case MCRYPT_RIJNDAEL_256:
        case MCRYPT_SAFERPLUS:
        case MCRYPT_SERPENT:
        case MCRYPT_TRIPLEDES:
        case MCRYPT_TWOFISH:
        case MCRYPT_XTEA:
            return true;

        // These are listed here for completeness.
        // mcrypt_module_is_block_algorithm() should return false for unkown
        // values.
        case MCRYPT_ARCFOUR:
        case MCRYPT_ARCFOUR_IV:
        case MCRYPT_CRYPT:
        case MCRYPT_ENIGNA:
        case MCRYPT_IDEA:
        case MCRYPT_MARS:
        case MCRYPT_PANAMA:
        case MCRYPT_RC6:
        case MCRYPT_SAFER64:
        case MCRYPT_SAFER128:
        case MCRYPT_SKIPJACK:
        case MCRYPT_THREEWAY:
        case MCRYPT_WAKE:
        default:
            return false;
    }
}

/**
 * Returns if the specified mode outputs blocks or not.
 *
 * @param string $mode
 * @param string $lib_dir
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_module_is_block_mode($mode, $lib_dir = null)
{
    switch ($mode) {
        case MCRYPT_MODE_CBC:
        case MCRYPT_MODE_ECB:
            return true;

        // These are listed here for completeness.
        // mcrypt_module_is_block_mode() should return false for unkown values.
        case MCRYPT_MODE_CFB:
        case MCRYPT_MODE_STREAM:
        case MCRYPT_MODE_NOFB:
        case MCRYPT_MODE_OFB:
        case 'ctr':
        case 'ncfb':
        default:
            return false;
    }
}

/**
 * Returns the blocksize of the specified algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 *
 * @return int
 *
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

    return isset($block_sizes[$algorithm]) ? $block_sizes[$algorithm] : -1;
}

/**
 * Returns the maximum supported keysize of the opened mode.
 *
 * @param string $algorithm
 * @param string $lib_dir
 *
 * @return int
 *
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

    return isset($max_key_sizes[$algorithm]) ? $max_key_sizes[$algorithm] : -1;
}

/**
 * Returns an array with the supported keysizes of the opened algorithm.
 *
 * @param string $algorithm
 * @param string $lib_dir
 *
 * @return array
 *
 * @deprecated
 */
function mcrypt_module_get_supported_key_sizes($algorithm, $lib_dir = null)
{
    $key_sizes = array(
        'cast-128' => array(16),
        'gost' => array(32),
        'rijndael-128' => array(16, 24, 32),
        'twofish' => array(16, 24, 32),
        'arcfour' => array(),
        'cast-256' => array(16, 24, 32),
        'loki97' => array(16, 24, 32),
        'rijndael-192' => array(16, 24, 32),
        'saferplus' => array(16, 24, 32),
        'wake' => array(32),
        'blowfish-compat' => array(),
        'des' => array(8),
        'rijndael-256' => array(16, 24, 32),
        'serpent' => array(16, 24, 32),
        'xtea' => array(16),
        'blowfish' => array(),
        'enigma' => array(),
        'rc2' => array(),
        'tripledes' => array(24),
    );

    return isset($key_sizes[$algorithm]) ? $key_sizes[$algorithm] : array();
}

/**
 * Close the mcrypt module.
 *
 * @param McryptResource $td
 *
 * @return bool
 *
 * @deprecated
 */
function mcrypt_module_close($td)
{
    return true;
}

function __mcrypt_do_encrypt($cipher, $key, $data, $mode, $iv)
{
    if (!__mcrypt_verify_key_size($cipher, $mode, $key)) {
        return false;
    }

    if (!__mcrypt_verify_iv_size($cipher, $mode, $iv)) {
        return false;
    }

    $data = __mcrypt_pad($cipher, $mode, $data);

    if ($data === false) {
        return false;
    }

    $crypt = __mcrypt_translate_get_cipher_object($cipher, $mode);
    $crypt->setKey($key);
    $crypt->disablePadding();

    if (isset($iv)) {
        $crypt->setIV($iv);
    }

    return $crypt->encrypt($data);
}

function __mcrypt_do_decrypt($cipher, $key, $data, $mode, $iv)
{
    if (!__mcrypt_verify_key_size($cipher, $mode, $key)) {
        return false;
    }

    if (!__mcrypt_verify_iv_size($cipher, $mode, $iv)) {
        return false;
    }

    $phpsec_mode = __mcrypt_translate_mode($mode);

    $crypt = __mcrypt_translate_get_cipher_object($cipher, $mode);
    $crypt->setKey($key);
    $crypt->disablePadding();

    if (isset($iv)) {
        $crypt->setIV($iv);
    }

    return $crypt->decrypt($data);
}

/**
 * @param mixed $td
 *
 * @return bool
 *
 * @internal
 */
function __mcrypt_check_resource_type($td)
{
    if ($td instanceof McryptResource) {
        return true;
    }

    $caller = __mcrypt_get_caller();

    trigger_error("$caller() expects parameter 1 to be resource, $type given", E_USER_WARNING);

    return false;
}

function __mcrypt_strlen($string)
{
    static $mb = null;

    if (!isset($mb)) {
        $mb = defined('MB_OVERLOAD_STRING') && ini_get('mbstring.func_overload') & MB_OVERLOAD_STRING;
    }

    return $mb ? mb_strlen($string, '8bit') : strlen($string);
}

function __mcrypt_verify_iv_size($cipher, $mode, $iv)
{
    // @todo Figure out what other modes don't require an IV.
    if ($mode === 'ecb') {
        return true;
    }

    $iv_sizes = __mcrypt_get_iv_sizes();
    $expected = isset($iv_sizes[$cipher][$mode]) ? $iv_sizes[$cipher][$mode] : false;

    if ($expected === false) {
        return true;
    }

    if ($iv === false) {
        $caller = __mcrypt_get_caller();
        trigger_error("$caller(): Encryption mode requires an initialization vector of size $expected", E_USER_WARNING);

        return false;
    }

    $actual = __mcrypt_strlen($iv);
    if ($actual !== $expected) {
        $caller = __mcrypt_get_caller();
        trigger_error("$caller(): Received initialization vector of size $actual, but size $expected is required for this encryption mode", E_USER_WARNING);

        return false;
    }

    return true;
}

function __mcrypt_verify_key_size($cipher, $mode, $key)
{
    $sizes = mcrypt_module_get_supported_key_sizes($cipher);
    $actual = __mcrypt_strlen($key);

    if ($sizes && !in_array($actual, $sizes, true)) {
        $caller = __mcrypt_get_caller();
        $expected = __mcrypt_format_sizes($sizes);

        if (count($sizes) === 1) {
            trigger_error("$caller(): Key of size $actual not supported by this algorithm. Only keys of size $expected supported", E_USER_WARNING);
        } else {
            trigger_error("$caller(): Key of size $actual not supported by this algorithm. Only keys of sizes $expected supported", E_USER_WARNING);
        }

        return false;
    }

    return true;
}

function __mcrypt_pad($cipher, $mode, $data)
{
    $block_size = __mcrypt_get_block_size($cipher, $mode);

    if ($block_size === false) {
        return false;
    }

    $data_size = __mcrypt_strlen($data);
    $remainder = $data_size % $block_size;

    if ($remainder === 0) {
        return $data;
    }

    return str_pad($data, $data_size + ($block_size - $remainder), "\0");
}

function __mcrypt_translate_mode($mode)
{
    $modes = array(
        'ctr' => Base::MODE_CTR,
        MCRYPT_MODE_ECB => Base::MODE_ECB,
        MCRYPT_MODE_CBC => Base::MODE_CBC,
        'ncfb' => Base::MODE_CFB,
        MCRYPT_MODE_NOFB => Base::MODE_OFB,
        MCRYPT_MODE_OFB => Base::MODE_OFB,
        MCRYPT_MODE_STREAM => Base::MODE_STREAM,
    );

    return isset($modes[$mode]) ? $modes[$mode] : false;
}

function __mcrypt_translate_get_cipher_object($cipher, $mode)
{
    $phpsec_mode = __mcrypt_translate_mode($mode);

    switch ($cipher) {
        case MCRYPT_TRIPLEDES:
            $crypt = new TripleDES($phpsec_mode);
            break;

        case MCRYPT_RIJNDAEL_128:
            $crypt = new Rijndael($phpsec_mode);
            break;

        case MCRYPT_BLOWFISH:
            $crypt = new Blowfish($phpsec_mode);
            break;

        default:
            throw new \cweagans\mcrypt\Exception\NotImplementedException();
    }

    return $crypt;
}

function __mcrypt_get_caller()
{
    foreach (debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10) as $frame) {
        if (strpos($frame['function'], 'mcrypt_') === 0) {

            return $frame['function'];
        }
    }

    return __FUNCTION__;
}

function __mcrypt_format_sizes(array $sizes) {
    if (count($sizes) <= 1) {
        return reset($sizes);
    }

    $last = array_pop($sizes);
    $output = implode(', ', $sizes);

    return $output . ' or ' . $last;
}

function __mcrypt_get_key_sizes()
{
    static $key_sizes = array(
        'cast-128' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'gost' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'rijndael-128' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'twofish' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'arcfour' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 256,
        ),
        'cast-256' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'loki97' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'rijndael-192' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'saferplus' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'wake' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 32,
        ),
        'blowfish-compat' => array(
            'cbc' => 56,
            'cfb' => 56,
            'ctr' => 56,
            'ecb' => 56,
            'ncfb' => 56,
            'nofb' => 56,
            'ofb' => 56,
            'stream' => false,
        ),
        'des' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'rijndael-256' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'serpent' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'xtea' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'blowfish' => array(
            'cbc' => 56,
            'cfb' => 56,
            'ctr' => 56,
            'ecb' => 56,
            'ncfb' => 56,
            'nofb' => 56,
            'ofb' => 56,
            'stream' => false,
        ),
        'enigma' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 13,
        ),
        'rc2' => array(
            'cbc' => 128,
            'cfb' => 128,
            'ctr' => 128,
            'ecb' => 128,
            'ncfb' => 128,
            'nofb' => 128,
            'ofb' => 128,
            'stream' => false,
        ),
        'tripledes' => array(
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

    return $key_sizes;
}

function __mcrypt_get_block_sizes()
{
    static $block_sizes = array(
        'cast-128' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'gost' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'rijndael-128' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'twofish' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'arcfour' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 1,
        ),
        'cast-256' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'loki97' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'rijndael-192' => array(
            'cbc' => 24,
            'cfb' => 24,
            'ctr' => 24,
            'ecb' => 24,
            'ncfb' => 24,
            'nofb' => 24,
            'ofb' => 24,
            'stream' => false,
        ),
        'saferplus' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'wake' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 1,
        ),
        'blowfish-compat' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'des' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'rijndael-256' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'serpent' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'xtea' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'blowfish' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'enigma' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 1,
        ),
        'rc2' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'tripledes' => array(
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

    return $block_sizes;
}

function __mcrypt_get_iv_sizes()
{
    static $iv_sizes = array(
        'cast-128' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'gost' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'rijndael-128' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'twofish' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'arcfour' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 0,
        ),
        'cast-256' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'loki97' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'rijndael-192' => array(
            'cbc' => 24,
            'cfb' => 24,
            'ctr' => 24,
            'ecb' => 24,
            'ncfb' => 24,
            'nofb' => 24,
            'ofb' => 24,
            'stream' => false,
        ),
        'saferplus' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'wake' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 0,
        ),
        'blowfish-compat' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'des' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'rijndael-256' => array(
            'cbc' => 32,
            'cfb' => 32,
            'ctr' => 32,
            'ecb' => 32,
            'ncfb' => 32,
            'nofb' => 32,
            'ofb' => 32,
            'stream' => false,
        ),
        'serpent' => array(
            'cbc' => 16,
            'cfb' => 16,
            'ctr' => 16,
            'ecb' => 16,
            'ncfb' => 16,
            'nofb' => 16,
            'ofb' => 16,
            'stream' => false,
        ),
        'xtea' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'blowfish' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'enigma' => array(
            'cbc' => false,
            'cfb' => false,
            'ctr' => false,
            'ecb' => false,
            'ncfb' => false,
            'nofb' => false,
            'ofb' => false,
            'stream' => 0,
        ),
        'rc2' => array(
            'cbc' => 8,
            'cfb' => 8,
            'ctr' => 8,
            'ecb' => 8,
            'ncfb' => 8,
            'nofb' => 8,
            'ofb' => 8,
            'stream' => false,
        ),
        'tripledes' => array(
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

    return $iv_sizes;
}

endif;
