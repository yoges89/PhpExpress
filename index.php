<?php

require 'bootstrap.php';

// Create a new product
$product = new App\Entity\Product();
$product->setName('Sample Product');
$product->setPrice(19.99);

// Persist the product to the database
$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";