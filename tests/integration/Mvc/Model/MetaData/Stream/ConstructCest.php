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

namespace Phalcon\Test\Integration\Mvc\Model\MetaData\Stream;

use function cacheDir;
use function dataDir;
use IntegrationTester;
use Phalcon\Mvc\Model\MetaData\Stream;
use Phalcon\Mvc\Model\MetaDataInterface;
use Phalcon\Test\Fixtures\Traits\DiTrait;
use Phalcon\Test\Models\Robots;

/**
 * Class ConstructCest
 */
class ConstructCest
{
    use DiTrait;

    private $data;

    public function _before(IntegrationTester $I)
    {
        $this->setNewFactoryDefault();
        $this->setDiMysql();

        $this->container->setShared(
            'modelsMetadata',
            function () {
                return new Stream(
                    [
                        'metaDataDir' => cacheDir(),
                    ]
                );
            }
        );

        $this->data = require dataDir('fixtures/metadata/robots.php');
    }

    public function _after(IntegrationTester $I)
    {
        $this->container['db']->close();
    }

    /**
     * Tests Phalcon\Mvc\Model\MetaData\Stream :: __construct()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function mvcModelMetadataStreamConstruct(IntegrationTester $I)
    {
        $I->wantToTest('Mvc\Model\MetaData\Stream - __construct()');


        /** @var MetaDataInterface $md */
        $md = $this->container->getShared('modelsMetadata');

        $md->reset();
        $I->assertTrue($md->isEmpty());

        Robots::findFirst();

        $I->amInPath(cacheDir());

        $I->seeFileFound('meta-phalcon_test_models_robots-robots.php');

        $I->assertEquals(
            $this->data['meta-robots-robots'],
            require cacheDir('meta-phalcon_test_models_robots-robots.php')
        );

        $I->seeFileFound('map-phalcon_test_models_robots.php');

        $I->assertEquals(
            $this->data['map-robots'],
            require cacheDir('map-phalcon_test_models_robots.php')
        );

        $I->assertFalse($md->isEmpty());

        $md->reset();
        $I->assertTrue($md->isEmpty());

        $I->safeDeleteFile('meta-phalcon_test_models_robots-robots.php');
        $I->safeDeleteFile('map-phalcon_test_models_robots.php');
    }
}
