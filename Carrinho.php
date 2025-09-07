<?php

namespace Carrinho\Src;

class Carrinho
{
    private array $items = [];
    private Stock $stock;
    private float $discount = 0.0;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function addItem(int $productId, int $quantity): string
    {
        $product = $this->stock->getProduct($productId);

        if (!$product) {
            return "Inexistent product.";
        }

        if ($quantity <= 0) {
            return "Invalid quantity.";
        }

        if ($quantity > $product["quantity"]) {
            return "{$product['name']} quantity is unavailable in stock .";
        }

        if (isset($this->items[$productId])) {
            $this->items[$productId]["quantity"] += $quantity;
        } else {
            $this->items[$productId] = [
                "id" => $product["id"],
                "name" => $product["name"],
                "price" => $product["price"],
                "quantity" => $quantity
            ];
        }

        $this->stock->updateStock($productId, $quantity);
        return "Product {$product['name']} added successfully!.";
    }

    public function removeItem(int $productId, int $quantity): string
    {
        if (!isset($this->items[$productId])) {
            return "Product isn't in cart.";
        }

        if ($quantity >= $this->items[$productId]["quantity"]) {
            $quantity = $this->items[$productId]["quantity"];
            unset($this->items[$productId]);
        } else {
            $this->items[$productId]["quantity"] -= $quantity;
        }

        $this->stock->restock($productId, $quantity);
        return "Product {$this->stock->getProduct($productId)['name']} was removed from cart.";
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item["price"] * $item["quantity"];
        }
        return $total - $this->discount;
    }


    public function clearCart(): void
    {
        foreach ($this->items as $item) {
            $this->stock->restock($item["id"], $item["quantity"]);
        }
        $this->items = [];
    }
    
    public function applyCoupon(string $coupon): string
    {
        $coupon = strtoupper($coupon);

        if ($coupon === "DESCONTO10") {
            $total = $this->getTotal();
            $discount = $total * 0.10;
            $this->discount = $discount;

        return "Coupom applyed! 10% decreased value.";
        }
        return "Invalid coupon!.";
    }
}
