<?php

require_once __DIR__ . '/src/Stock.php';
require_once __DIR__ . '/src/Carrinho.php';

use Carrinho\Src\Stock;
use Carrinho\Src\Carrinho;

$stock = new Stock();
$carrinho = new Carrinho($stock);

echo "<h2>Initial Stock:</h2>";
$products = $stock->getAllProducts();
$stockList = array_map(fn($p) => "{$p['name']} ({$p['quantity']})", $products);
echo "<p>" . implode(", ", $stockList) . "</p> <hr>";

echo "<h2>Shopping Car Test</h2>";

echo "<p>" . $carrinho->addItem(1, 2) . "</p>";
echo "<p>" . $carrinho->addItem(4, 1) . "</p>";
echo "<p>" . $carrinho->addItem(9, 25) . "</p> <hr>"; 

echo "<h3>Itens on shopping cart:</h3>";
foreach ($carrinho->getItems() as $item) {
    echo "<p>{$item['quantity']}x {$item['name']} - R$ " . number_format($item['price'], 2, ',', '.') . "</p>";
}

echo "<h3>Total: R$ " . number_format($carrinho->getTotal(), 2, ',', '.') . "</h3> <hr>";
echo "<h3>Removing 1 unity of keyboard:</h3>";
echo "<p>" . $carrinho->removeItem(1, 1) . "</p> <hr>";
echo "<h3>Applying discount coupon:</h3>";
echo "<p>" . $carrinho->applyCoupon("DESCONTO10") . "</p>";

echo "<h3>Total with discount: R$ " . number_format($carrinho->getTotal(), 2, ',', '.') . "</h3> <hr>";

echo "<h3>Updated stock:</h3>";
$products = $stock->getAllProducts();
$stockListUpdated = array_map(fn($p) => "{$p['name']} ({$p['quantity']})", $products);
echo "<p>" . implode(", ", $stockListUpdated) . "</p>";