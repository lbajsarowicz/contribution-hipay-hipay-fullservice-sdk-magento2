<?php

/**
 * HiPay Fullservice Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @author    Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 * @link      https://github.com/hipay/hipay-fullservice-sdk-magento2
 */

namespace HiPay\FullserviceMagento\Test\Unit\Model;

use HiPay\FullserviceMagento\Model\Config;
use HiPay\FullserviceMagento\Model\Method\Providers\CcConfigProvider;
use PHPUnit\Framework\TestCase;

class CcConfigProviderTest extends TestCase
{
    /**
     * Verify inactive payment methods do not contribute checkout configuration.
     */
    public function testGetConfig(): void
    {
        $config = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['isPaymentMethodActive', 'setMethodCode'])
            ->getMock();
        $config->expects($this->exactly(2))->method('isPaymentMethodActive')->willReturn(false);
        $config->expects($this->exactly(2))->method('setMethodCode');

        $provider = new class ($config) extends CcConfigProvider {
            /**
             * @param Config $config
             */
            public function __construct(Config $config)
            {
                $this->_hipayConfig = $config;
            }
        };

        $this->assertSame([], $provider->getConfig());
    }
}
