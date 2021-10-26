<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductConfigurationWidget;

use Spryker\Yves\Kernel\AbstractBundleConfig;

class ProductConfigurationWidgetConfig extends AbstractBundleConfig
{
    /**
     * @uses \SprykerShop\Yves\ProductConfiguratorGatewayPage\Plugin\Router\ProductConfiguratorGatewayPageRouteProviderPlugin::ROUTE_NAME_PRODUCT_CONFIGURATOR_GATEWAY_REQUEST
     *
     * @var string
     */
    protected const ROUTE_NAME_PRODUCT_CONFIGURATOR_GATEWAY_REQUEST = 'product-configurator-gateway/request';

    /**
     * @uses \SprykerShop\Yves\ProductConfiguratorGatewayPage\ProductConfiguratorGatewayPageConfig::PRODUCT_CONFIGURATOR_GATEWAY_REQUEST_FORM_NAME
     *
     * @var string
     */
    protected const PRODUCT_CONFIGURATOR_GATEWAY_REQUEST_FORM_NAME = 'product_configurator_request_data_form';

    /**
     * @var string
     */
    protected const SOURCE_TYPE_PDP = 'SOURCE_TYPE_PDP';

    /**
     * @api
     *
     * @return string
     */
    public function getPdpSourceType(): string
    {
        return static::SOURCE_TYPE_PDP;
    }

    /**
     * @api
     *
     * @return string
     */
    public function getProductConfiguratorGatewayRequestFormName(): string
    {
        return static::PRODUCT_CONFIGURATOR_GATEWAY_REQUEST_FORM_NAME;
    }

    /**
     * @api
     *
     * @return string
     */
    public function getProductConfiguratorGatewayRequestRoute(): string
    {
        return static::ROUTE_NAME_PRODUCT_CONFIGURATOR_GATEWAY_REQUEST;
    }
}
