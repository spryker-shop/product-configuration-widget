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
class ProductConfigurationProductDetailPageButtonWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected const PARAMETER_IS_VISIBLE = 'isVisible';

    /**
     * @var string
     */
    protected const PARAMETER_FORM = 'form';

    /**
     * @var string
     */
    protected const PARAMETER_PRODUCT_CONFIGURATOR_ROUTE_NAME = 'productConfiguratorRouteName';

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     */
    public function __construct(ProductViewTransfer $productViewTransfer)
    {
        $this->addIsVisibleParameter($productViewTransfer);

        if (!$productViewTransfer->getProductConfigurationInstance()) {
            return;
        }

        $this->addFormParameter($productViewTransfer);
        $this->addProductConfigurationRouteNameParameter();
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'ProductConfigurationProductDetailPageButtonWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@ProductConfigurationWidget/views/product-detail-configuration-button/product-detail-configuration-button.twig';
    }

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @return void
     */
    protected function addIsVisibleParameter(ProductViewTransfer $productViewTransfer): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $productViewTransfer->getProductConfigurationInstance() !== null);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @return void
     */
    protected function addFormParameter(ProductViewTransfer $productViewTransfer): void
    {
        $productConfiguratorButtonFormCartPageDataProvider = $this->getFactory()
            ->createProductConfiguratorButtonFormDataProvider();

        $productConfigurationButtonForm = $this->getFactory()
            ->getProductConfigurationButtonForm()
            ->setData($productConfiguratorButtonFormCartPageDataProvider->getData($productViewTransfer))
            ->createView();

        $this->addParameter(static::PARAMETER_FORM, $productConfigurationButtonForm);
    }

    /**
     * @return void
     */
    protected function addProductConfigurationRouteNameParameter(): void
    {
        $this->addParameter(
            static::PARAMETER_PRODUCT_CONFIGURATOR_ROUTE_NAME,
            $this->getConfig()->getProductConfiguratorGatewayRequestRoute(),
        );
    }
}
