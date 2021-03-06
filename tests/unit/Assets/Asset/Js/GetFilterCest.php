<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Assets\Asset\Js;

use Phalcon\Assets\Asset\Js;
use UnitTester;

class GetFilterCest
{
    /**
     * Tests Phalcon\Assets\Asset\Js :: getFilter()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function assetsAssetJsGetFilterJs(UnitTester $I)
    {
        $I->wantToTest('Assets\Asset\Js - getFilter()');

        $asset = new Js('js/jquery.js');

        $I->assertTrue(
            $asset->getFilter()
        );
    }
}
