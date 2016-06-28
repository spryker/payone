<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Payone;

use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Payone\Dependency\Facade\PayoneToOmsBridge;
use \Spryker\Zed\Payone\Dependency\Facade\PayoneToSalesAggregatorBridge;

class PayoneDependencyProvider extends AbstractBundleDependencyProvider
{

    const FACADE_OMS = 'oms facade';
    const STORE_CONFIG = 'store config';
    const FACADE_SALES_AGGREGATOR = 'sales aggregor facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::FACADE_OMS] = function (Container $container) {
            return new PayoneToOmsBridge($container->getLocator()->oms()->facade());
        };

        $container[self::FACADE_SALES_AGGREGATOR] = function (Container $container) {
            return new PayoneToSalesAggregatorBridge($container->getLocator()->salesAggregator()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::STORE_CONFIG] = function (Container $container) {
            return Store::getInstance();
        };

        return $container;
    }

}
