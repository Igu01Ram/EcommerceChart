<?php

namespace Carrinho\Src;

class Stock
{
    private array $products = [];

    public function __construct()
    {
        $this->products = [
            1 => ["id" => 1, "name" => "keyboard", "price" => 100.0, "quantity" => 10],
            2 => ["id" => 2, "name" => "mouse", "price" => 50.0, "quantity" => 15],
            3 => ["id" => 3, "name" => "monitor", "price" => 900.0, "quantity" => 5],
            4 => ["id" => 4, "name" => "graphic card", "price" => 1200.0, "quantity" => 3],
            5 => ["id" => 5, "name" => "motherboard", "price" => 600.0, "quantity" => 4],
            6 => ["id" => 6, "name" => "cpu", "price" => 1500.0, "quantity" => 2],
            7 => ["id" => 7, "name" => "ram 16gb", "price" => 400.0, "quantity" => 6],
            8 => ["id" => 8, "name" => "power supply", "price" => 350.0, "quantity" => 5],
            9 => ["id" => 9, "name" => "ssd 240gb", "price" => 250.0, "quantity" => 20],
        ];
    }

    public function getAllProducts(): array
    {
        return $this->products;
    }

    public function getProduct(int $id): ?array
    {
        return $this->products[$id] ?? null;
    }

    public function updateStock(int $id, int $quantity): void
    {
        if (isset($this->products[$id])) {
            $this->products[$id]["quantity"] -= $quantity;
        }
    }

    public function restock(int $id, int $quantity): void
    {
        if (isset($this->products[$id])) {
            $this->products[$id]["quantity"] += $quantity;
        }
    }
}