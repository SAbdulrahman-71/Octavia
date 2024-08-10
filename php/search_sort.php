<?php
// search_sort.php
/**
 * Displays products based on category, search query, and sorting option.
 *
 * @param array  $inventory       Array of products categorized by their categories.
 * @param string $selectedCategory Selected category for filtering products.
 * @param string $searchQuery     Search query for filtering products by name.
 * @param string $sortBy          Sorting option (e.g., 'name', 'price_asc', 'price_desc').
 */
function displayCategoryProducts($inventory, $selectedCategory, $searchQuery, $sortBy)
{
    // If "All" is selected, combine all products from all categories
    if ($selectedCategory === 'All') {
        $products = [];
        foreach ($inventory as $categoryProducts) {
            $products = array_merge($products, $categoryProducts);
        }
    } else if ($selectedCategory && isset($inventory[$selectedCategory])) {
        $products = $inventory[$selectedCategory];
    } else {
        $products = [];
    }

    // Filter products by search query
    if ($searchQuery) {
        $products = array_filter($products, function ($product) use ($searchQuery) {
            return stripos($product['name'], $searchQuery) !== false;
        });
    }

    // Sort products based on the selected option
    if ($sortBy) {
        usort($products, function ($a, $b) use ($sortBy) {
            switch ($sortBy) {
                case 'name':
                    return strcmp($a['name'], $b['name']);
                case 'price_asc':
                    return $a['price'] - $b['price'];
                case 'price_desc':
                    return $b['price'] - $a['price'];
                default:
                    return 0;
            }
        });
    }



    if (!empty($products)) {
        echo '<div class="container-fluid mb-1 mt-1">';
        echo '<div class="row">';

        foreach ($products as $product) {
            $id = htmlspecialchars($product['id']);
            $img = htmlspecialchars($product['img']);
            $name = htmlspecialchars($product['name']);
            $price = number_format($product['price'], 2);
            $occasion = htmlspecialchars($product['occasion']);
            $category = htmlspecialchars($selectedCategory);

            // Output HTML with PHP variables directly
            echo <<<HTML
            <div id="product-$id" class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm bg-light">
                    <div class="card-header text-center">
                        <img src="$img" alt="$name" class="img-fluid">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title font-weight-bold">$name</h5>
                        <p class="card-text"><strong>Price:</strong> $price AED</p>
                        <p class="card-text"><strong>Occasion:</strong> $occasion</p>
                    </div>
                    <div class="card-footer">
                        <form action="display.php" method="get">
                            <input type="hidden" name="product" value="$id">
                            <input type="hidden" name="category" value="$category">
                            <input type="hidden" name="scroll_to" value="$id">
                            <div class="input-group">
                                <input type="number" class="form-control" name="quantity" value="1" min="1">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" name="add_to_cart" value="1">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            HTML;
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>No products found.</p>';
    }
}