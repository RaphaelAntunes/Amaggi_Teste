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

    // Substitua 'teste/general/selected_product' pelo caminho real que você está usando
    $configPath = 'teste/general/selected_product';

    // Obter o ID do produto a partir da configuração
    $productID = $scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    // Obter informações do produto com base no ID
    $product = $productRepository->getById($productID);

    // Obter a URL da imagem do produto
    $imageUrl = $objectManager->get('Magento\Catalog\Helper\Image')
        ->init($product, 'product_page_image_small')
        ->getUrl();

    // Obter informações sobre o estoque do produto
    $stockItem = $stockRegistry->getStockItem($product->getId());

    // Retornar um array associativo simples
    $responseData = [
        'stock_quantity' => $stockItem->getQty(),
        'is_in_stock' => $stockItem->getIsInStock(),
        // Adicione outros campos que você deseja incluir
    ];

    return $responseData;
}

}
