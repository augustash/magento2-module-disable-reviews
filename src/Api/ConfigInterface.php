<?php

/**
 * August Ash Disable Reviews Module
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\DisableReviews\Api;

use Magento\Store\Model\ScopeInterface;

/**
 * Service interface responsible for the configuration model.
 *
 * @api
 */
interface ConfigInterface
{
    /**
     * Configuration constants.
     */
    public const XML_PATH_DISABLE_REVIEWS_ENABLED = 'catalog/review/disable_reviews';

    /**
     * Returns the store's configured enabled status.
     *
     * @param string $scope
     * @param null|int|string $scopeCode
     * @return bool
     */
    public function isEnabled(
        string $scope = ScopeInterface::SCOPE_STORES,
        $scopeCode = null
    ): bool;
}
