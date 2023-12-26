<?php

namespace Antunes\teste\Model;

use Antunes\teste\Api\PublicEndpointInterface;

class PublicEndpoint  implements PublicEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function getPublicInfo()
{
    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $scopeConfig = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface');
    $productRepository = $objectManager->get('Magento\Catalog\Model\ProductRepository');
    $stockRegistry = $objectManager->get('Magento\CatalogInventory\Api\StockRegistryInterface');

    // Path do caminho para encontrar valor do produto
    $configPath = 'teste/general/selected_product';

    // Obtem o ID do produto a partir da configuração
    $productID = $scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    // Obtem informações do produto com base no ID
    $product = $productRepository->getById($productID);

    // Obter informações sobre o estoque do produto
    $stockItem = $stockRegistry->getStockItem($product->getId());

    // Retorna
    $responseData = [
        'stock_quantity' => $stockItem->getQty(),
        'is_in_stock' => $stockItem->getIsInStock(),
    ];
    return $responseData;
}

}
