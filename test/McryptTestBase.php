<?php

namespace cweagans\mcrypt\Tests;

class McryptTestBase extends \PHPUnit_Framework_TestCase {

    public function vectorProvider()
    {
        return array(
            array(
              'plain' => '0000000000000000',
              'key' => '0000000000000000',
              'crypt' => '4EF997456198DD78',
            ),
            array(
              'plain' => 'FFFFFFFFFFFFFFFF',
              'key' => 'FFFFFFFFFFFFFFFF',
              'crypt' => '51866FD5B85ECB8A',
            ),
            array(
              'plain' => '1000000000000001',
              'key' => '3000000000000000',
              'crypt' => '7D856F9A613063F2',
            ),
            array(
              'plain' => '1111111111111111',
              'key' => '1111111111111111',
              'crypt' => '2466DD878B963C9D',
            ),
            array(
              'plain' => '1111111111111111',
              'key' => '0123456789ABCDEF',
              'crypt' => '61F9C3802281B096',
            ),
            array(
              'plain' => '0123456789ABCDEF',
              'key' => '1111111111111111',
              'crypt' => '7D0CC630AFDA1EC7',
            ),
            array(
              'plain' => '0123456789ABCDEF',
              'key' => 'FEDCBA9876543210',
              'crypt' => '0ACEAB0FC6A0A28D',
            ),
            array(
              'plain' => '01A1D6D039776742',
              'key' => '7CA110454A1A6E57',
              'crypt' => '59C68245EB05282B',
            ),
            array(
              'plain' => '5CD54CA83DEF57DA',
              'key' => '0131D9619DC1376E',
              'crypt' => 'B1B8CC0B250F09A0',
            ),
            array(
              'plain' => '0248D43806F67172',
              'key' => '07A1133E4A0B2686',
              'crypt' => '1730E5778BEA1DA4',
            ),
            array(
              'plain' => '51454B582DDF440A',
              'key' => '3849674C2602319E',
              'crypt' => 'A25E7856CF2651EB',
            ),
            array(
              'plain' => '42FD443059577FA2',
              'key' => '04B915BA43FEB5B6',
              'crypt' => '353882B109CE8F1A',
            ),
            array(
              'plain' => '059B5E0851CF143A',
              'key' => '0113B970FD34F2CE',
              'crypt' => '48F4D0884C379918',
            ),
            array(
              'plain' => '0756D8E0774761D2',
              'key' => '0170F175468FB5E6',
              'crypt' => '432193B78951FC98',
            ),
            array(
              'plain' => '762514B829BF486A',
              'key' => '43297FAD38E373FE',
              'crypt' => '13F04154D69D1AE5',
            ),
            array(
              'plain' => '3BDD119049372802',
              'key' => '07A7137045DA2A16',
              'crypt' => '2EEDDA93FFD39C79',
            ),
            array(
              'plain' => '26955F6835AF609A',
              'key' => '04689104C2FD3B2F',
              'crypt' => 'D887E0393C2DA6E3',
            ),
            array(
              'plain' => '164D5E404F275232',
              'key' => '37D06BB516CB7546',
              'crypt' => '5F99D04F5B163969',
            ),
            array(
              'plain' => '6B056E18759F5CCA',
              'key' => '1F08260D1AC2465E',
              'crypt' => '4A057A3B24D3977B',
            ),
            array(
              'plain' => '004BD6EF09176062',
              'key' => '584023641ABA6176',
              'crypt' => '452031C1E4FADA8E',
            ),
            array(
              'plain' => '480D39006EE762F2',
              'key' => '025816164629B007',
              'crypt' => '7555AE39F59B87BD',
            ),
            array(
              'plain' => '437540C8698F3CFA',
              'key' => '49793EBC79B3258F',
              'crypt' => '53C55F9CB49FC019',
            ),
            array(
              'plain' => '072D43A077075292',
              'key' => '4FB05E1515AB73A7',
              'crypt' => '7A8E7BFA937E89A3',
            ),
            array(
              'plain' => '02FE55778117F12A',
              'key' => '49E95D6D4CA229BF',
              'crypt' => 'CF9C5D7A4986ADB5',
            ),
            array(
              'plain' => '1D9D5C5018F728C2',
              'key' => '018310DC409B26D6',
              'crypt' => 'D1ABB290658BC778',
            ),
            array(
              'plain' => '305532286D6F295A',
              'key' => '1C587F1C13924FEF',
              'crypt' => '55CB3774D13EF201',
            ),
            array(
              'plain' => '0123456789ABCDEF',
              'key' => '0101010101010101',
              'crypt' => 'FA34EC4847B268B2',
            ),
            array(
              'plain' => '0123456789ABCDEF',
              'key' => '1F1F1F1F0E0E0E0E',
              'crypt' => 'A790795108EA3CAE',
            ),
            array(
              'plain' => '0123456789ABCDEF',
              'key' => 'E0FEE0FEF1FEF1FE',
              'crypt' => 'C39E072D9FAC631D',
            ),
            array(
              'plain' => 'FFFFFFFFFFFFFFFF',
              'key' => '0000000000000000',
              'crypt' => '014933E0CDAFF6E4',
            ),
            array(
              'plain' => '0000000000000000',
              'key' => 'FFFFFFFFFFFFFFFF',
              'crypt' => 'F21E9A77B71C49BC',
            ),
            array(
              'plain' => '0000000000000000',
              'key' => '0123456789ABCDEF',
              'crypt' => '245946885754369A',
            ),
            array(
              'plain' => 'FFFFFFFFFFFFFFFF',
              'key' => 'FEDCBA9876543210',
              'crypt' => '6B5C5A9C5D9E0A5A',
            ),
        );
    }
}