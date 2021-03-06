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

namespace Phalcon\Test\Integration\Validation\Validator\PresenceOf;

use IntegrationTester;
use Phalcon\Test\Fixtures\Traits\ValidationTrait;
use Phalcon\Validation\Validator\PresenceOf;

class HasOptionCest
{
    use ValidationTrait;

    /**
     * Tests Phalcon\Validation\Validator\PresenceOf :: hasOption()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function validationValidatorPresenceOfHasOption(IntegrationTester $I)
    {
        $I->wantToTest('Validation\Validator\PresenceOf - hasOption()');

        $validator = new PresenceOf(
            [
                'message' => 'This is a message',
            ]
        );

        $this->checkHasOption($I, $validator);
    }
}
