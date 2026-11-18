<?php

/**
 * HiPay fullservice Magento
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

namespace HiPay\FullserviceMagento\Test\Unit\Block\Hosted;

class FormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Verify the hosted payment form template.
     */
    public function testTemplateFileCanBeRetrieve(): void
    {
        $reflection = new \ReflectionClass(\HiPay\FullserviceMagento\Block\Hosted\Form::class);
        $form = $reflection->newInstanceWithoutConstructor();

        $this->assertSame('HiPay_FullserviceMagento::form/hosted.phtml', $form->getTemplate());
    }
}
