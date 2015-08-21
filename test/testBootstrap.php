<?php

// Nuke the mcrypt functions and constants if we're using runkit. Ugh.
if (extension_loaded('mcrypt') && getenv('USE_RUNKIT')) {
    runkit_function_rename('mcrypt_cbc', 'ext_mcrypt_mcrypt_cbc');
    runkit_function_rename('mcrypt_cfb', 'ext_mcrypt_mcrypt_cfb');
    runkit_function_rename('mcrypt_create_iv', 'ext_mcrypt_mcrypt_create_iv');
    runkit_function_rename('mcrypt_decrypt', 'ext_mcrypt_mcrypt_decrypt');
    runkit_function_rename('mcrypt_ecb', 'ext_mcrypt_mcrypt_ecb');
    runkit_function_rename('mcrypt_enc_get_algorithms_name', 'ext_mcrypt_mcrypt_enc_get_algorithms_name');
    runkit_function_rename('mcrypt_enc_get_block_size', 'ext_mcrypt_mcrypt_enc_get_block_size');
    runkit_function_rename('mcrypt_enc_get_iv_size', 'ext_mcrypt_mcrypt_enc_get_iv_size');
    runkit_function_rename('mcrypt_enc_get_key_size', 'ext_mcrypt_mcrypt_enc_get_key_size');
    runkit_function_rename('mcrypt_enc_get_modes_name', 'ext_mcrypt_mcrypt_enc_get_modes_name');
    runkit_function_rename('mcrypt_enc_get_supported_key_sizes', 'ext_mcrypt_mcrypt_enc_get_supported_key_sizes');
    runkit_function_rename('mcrypt_enc_is_block_algorithm_mode', 'ext_mcrypt_mcrypt_enc_is_block_algorithm_mode');
    runkit_function_rename('mcrypt_enc_is_block_algorithm', 'ext_mcrypt_mcrypt_enc_is_block_algorithm');
    runkit_function_rename('mcrypt_enc_is_block_mode', 'ext_mcrypt_mcrypt_enc_is_block_mode');
    runkit_function_rename('mcrypt_enc_self_test', 'ext_mcrypt_mcrypt_enc_self_test');
    runkit_function_rename('mcrypt_encrypt', 'ext_mcrypt_mcrypt_encrypt');
    runkit_function_rename('mcrypt_generic_deinit', 'ext_mcrypt_mcrypt_generic_deinit');
    runkit_function_rename('mcrypt_generic_end', 'ext_mcrypt_mcrypt_generic_end');
    runkit_function_rename('mcrypt_generic_init', 'ext_mcrypt_mcrypt_generic_init');
    runkit_function_rename('mcrypt_generic', 'ext_mcrypt_mcrypt_generic');
    runkit_function_rename('mcrypt_get_block_size', 'ext_mcrypt_mcrypt_get_block_size');
    runkit_function_rename('mcrypt_get_cipher_name', 'ext_mcrypt_mcrypt_get_cipher_name');
    runkit_function_rename('mcrypt_get_iv_size', 'ext_mcrypt_mcrypt_get_iv_size');
    runkit_function_rename('mcrypt_get_key_size', 'ext_mcrypt_mcrypt_get_key_size');
    runkit_function_rename('mcrypt_list_algorithms', 'ext_mcrypt_mcrypt_list_algorithms');
    runkit_function_rename('mcrypt_list_modes', 'ext_mcrypt_mcrypt_list_modes');
    runkit_function_rename('mcrypt_module_close', 'ext_mcrypt_mcrypt_module_close');
    runkit_function_rename('mcrypt_module_get_algo_block_size', 'ext_mcrypt_mcrypt_module_get_algo_block_size');
    runkit_function_rename('mcrypt_module_get_algo_key_size', 'ext_mcrypt_mcrypt_module_get_algo_key_size');
    runkit_function_rename('mcrypt_module_get_supported_key_sizes', 'ext_mcrypt_mcrypt_module_get_supported_key_sizes');
    runkit_function_rename('mcrypt_module_is_block_algorithm_mode', 'ext_mcrypt_mcrypt_module_is_block_algorithm_mode');
    runkit_function_rename('mcrypt_module_is_block_algorithm', 'ext_mcrypt_mcrypt_module_is_block_algorithm');
    runkit_function_rename('mcrypt_module_is_block_mode', 'ext_mcrypt_mcrypt_module_is_block_mode');
    runkit_function_rename('mcrypt_module_open', 'ext_mcrypt_mcrypt_module_open');
    runkit_function_rename('mcrypt_module_self_test', 'ext_mcrypt_mcrypt_module_self_test');
    runkit_function_rename('mcrypt_ofb', 'ext_mcrypt_mcrypt_ofb');
}

require_once __DIR__ . "/../vendor/autoload.php";