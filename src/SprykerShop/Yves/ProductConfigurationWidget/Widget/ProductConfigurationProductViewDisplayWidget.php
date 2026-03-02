<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductConfigurationWidget\Widget;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\ProductConfigurationWidget\ProductConfigurationWidgetFactory getFactory()
 * @method \SprykerShop\Yves\ProductConfigurationWidget\ProductConfigurationWidgetConfig getConfig()
 */
class ProductConfigurationProductViewDisplayWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected const PARAMETER_IS_VISIBLE = 'isVisible';

    /**
     * @var string
     */
    protected const PARAMETER_PRODUCT_CONFIGURATION_INSTANCE = 'productConfigurationInstance';

    /**
     * @var string
     */
    protected const PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE = 'productConfigurationTemplate';

    public function __construct(ProductViewTransfer $productViewTransfer)
    {
        $this->addIsVisibleParameter($productViewTransfer);

        if (!$productViewTransfer->getProductConfigurationInstance()) {
            return;
        }

        $this->addProductConfigurationInstanceParameter($productViewTransfer);
        $this->addProductConfigurationTemplateParameter($productViewTransfer);
    }

    public static function getName(): string
    {
        return 'ProductConfigurationProductViewDisplayWidget';
    }

    public static function getTemplate(): string
    {
        return '@ProductConfigurationWidget/views/product-detail-configuration/product-detail-configuration.twig';
    }

    protected function addIsVisibleParameter(ProductViewTransfer $productViewTransfer): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $productViewTransfer->getProductConfigurationInstance() !== null);
    }

    protected function addProductConfigurationInstanceParameter(ProductViewTransfer $productViewTransfer): void
    {
        $this->addParameter(static::PARAMETER_PRODUCT_CONFIGURATION_INSTANCE, $productViewTransfer->getProductConfigurationInstanceOrFail());
    }

    protected function addProductConfigurationTemplateParameter(ProductViewTransfer $productViewTransfer): void
    {
        $productConfigurationTemplateTransfer = $this->getFactory()
            ->createProductConfigurationTemplateResolver()
            ->resolveProductConfigurationTemplate($productViewTransfer->getProductConfigurationInstanceOrFail());

        $this->addParameter(static::PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE, $productConfigurationTemplateTransfer);
    }
}
