<?php

use Magento\Framework\App\Bootstrap;

// Inclua o bootstrap do Magento
require __DIR__ . '/app/bootstrap.php';

// Inicialize o Magento de forma adequada
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

// Importe as classes necessárias
use Magento\Catalog\Model\ProductRepository;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

// Obtenha instâncias dos objetos necessários
$scopeConfig = $objectManager->get(ScopeConfigInterface::class);
$productRepository = $objectManager->get(ProductRepository::class);
$stockRegistry = $objectManager->get(StockRegistryInterface::class);

// Substitua 'teste/general/selected_product' pelo caminho real que você está usando
$configPath = 'teste/general/selected_product';

// Obter o ID do produto a partir da configuração
$productID = $scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

// Obter informações do produto com base no ID
$product = $productRepository->getById($productID);

// Obter informações sobre o estoque do produto
$stockItem = $stockRegistry->getStockItem($product->getId());

// Formate os dados para retorno
$responseData = [
    'product_name' => $product->getName(),
    'product_price' => $product->getPrice(),
    'stock_quantity' => $stockItem->getQty(),
    // Adicione outros dados conforme necessário
];

// Converte os dados para JSON e imprime a resposta
header('Content-Type: application/json');
echo json_encode($responseData);
