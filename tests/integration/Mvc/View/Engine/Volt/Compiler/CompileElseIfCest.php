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

namespace Phalcon\Test\Integration\Mvc\View\Engine\Volt\Compiler;

use IntegrationTester;
use Phalcon\Mvc\View\Engine\Volt\Compiler;

class CompileElseIfCest
{
    /**
     * Tests Phalcon\Mvc\View\Engine\Volt\Compiler :: compileElseIf()
     *
     * @author Sid Roberts <https://github.com/SidRoberts>
     * @since  2019-05-22
     */
    public function mvcViewEngineVoltCompilerCompileElseIf(IntegrationTester $I)
    {
        $I->wantToTest('Mvc\View\Engine\Volt\Compiler - compileElseIf()');

        $volt = new Compiler();

        $compiled = $volt->compileString(
            '{% if i == 0 %}zero{% elseif i == 1 %}one{% else %}more than one{% endif %}'
        );

        $I->assertEquals(
            '<?php if ($i == 0) { ?>zero<?php } elseif ($i == 1) { ?>one<?php } else { ?>more than one<?php } ?>',
            $compiled
        );
    }
}
