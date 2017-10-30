<?php

namespace PostCon\Tests\Behat\BootstrapExtension;

use Behat\BootstrapExtension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class BehatBoostrapExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testNoParam()
    {
        $this->load(__DIR__.'/Fixtures/bootstrap_no_param.php');
        $this->assertTrue(defined('POSTCON_BEHAT_BOOSTRAP_EXTENSION_NO_PARAM'));
        $this->assertEquals(1, POSTCON_BEHAT_BOOSTRAP_EXTENSION_NO_PARAM);
    }

    public function testParam()
    {
        $this->load('%tests_paths%/Fixtures/bootstrap_param.php');
        $this->assertTrue(defined('POSTCON_BEHAT_BOOSTRAP_EXTENSION_PARAM'));
        $this->assertEquals(1, POSTCON_BEHAT_BOOSTRAP_EXTENSION_PARAM);
    }

    private function load($bootstrap_path)
    {
        $extension = new Extension();
        $extension->process($this->getContainer($bootstrap_path));
    }

    /**
     * @param string $bootstrap_path
     *
     * @return ContainerBuilder
     */
    private function getContainer($bootstrap_path)
    {
        return new ContainerBuilder(
            new ParameterBag(
                [
                    'tests_paths' => __DIR__,
                    'bootstrap_extension.bootstrap_file' => $bootstrap_path,
                ]
            )
        );
    }
}
