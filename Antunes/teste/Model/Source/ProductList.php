<?php

namespace Antunes\teste\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductList implements OptionSourceInterface
{
    protected $productCollectionFactory;

    public function __construct(
        CollectionFactory $productCollectionFactory
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [['value' => '', 'label' => __('Select a Product')]];

        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('name');

        foreach ($collection as $product) {
            $options[] = [
                'value' => $product->getId(),
                'label' => $product->getName()
            ];
        }

        return $options;
    }
}
