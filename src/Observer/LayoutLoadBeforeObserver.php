<?php

/**
 * August Ash Disable Reviews Module
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\DisableReviews\Observer;

use Augustash\DisableReviews\Api\ConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LayoutLoadBeforeObserver implements ObserverInterface
{
    /**
     * @var \Augustash\DisableReviews\Api\ConfigInterface
     */
    protected $config;

    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Augustash\DisableReviews\Api\ConfigInterface $config
     */
    public function __construct(
        ConfigInterface $config
    ) {
        $this->config = $config;
    }

    /**
     * Add custom layout handle that will remove blocks.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        if (!$this->config->isEnabled()) {
            return;
        }

        /** @var \Magento\Framework\View\LayoutInterface $layout */
        $layout = $observer->getData('layout');
        $layout
            ->getUpdate()
            ->addHandle('remove_product_reviews');
    }
}
