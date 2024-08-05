<?php

// Define an array of product categories with IDs and parent IDs

$category = array();

$inventory = [
    'Flowers' => [
        ['id' => 101, 'brand' => 'Octavia', 'name' => 'Rose Bouquet', 'price' => 99.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/rose_bouquet.jpg', 'description' => 'A beautiful bouquet of fresh roses.'],
        ['id' => 102, 'brand' => 'Octavia', 'name' => 'Tulip Bundle', 'price' => 79.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/tulip_bundle.jpg', 'description' => 'A vibrant bundle of tulips.'],
        ['id' => 103, 'brand' => 'Octavia', 'name' => 'Lily Arrangement', 'price' => 89.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/lily_arrangement.jpg', 'description' => 'A lovely arrangement of lilies in a vase.'],
        ['id' => 104, 'brand' => 'Octavia', 'name' => 'Orchid Delight', 'price' => 119.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/orchid_delight.jpg', 'description' => 'Elegant orchids arranged beautifully.'],
        ['id' => 105, 'brand' => 'Octavia', 'name' => 'Daisy Bouquet', 'price' => 69.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/daisy_bouquet.jpg', 'description' => 'A cheerful bouquet of fresh daisies.'],
        ['id' => 106, 'brand' => 'Octavia', 'name' => 'Sunflower Bunch', 'price' => 74.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/sunflower_bunch.jpg', 'description' => 'Bright and sunny sunflowers in a bunch.'],
        ['id' => 107, 'brand' => 'Octavia', 'name' => 'Carnation Basket', 'price' => 84.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/carnation_basket.jpg', 'description' => 'A basket full of vibrant carnations.'],
        ['id' => 108, 'brand' => 'Octavia', 'name' => 'Peony Collection', 'price' => 94.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/peony_collection.jpg', 'description' => 'A collection of beautiful peonies.'],
        ['id' => 109, 'brand' => 'Octavia', 'name' => 'Hydrangea Arrangement', 'price' => 109.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/hydrangea_arrangement.jpg', 'description' => 'A stunning arrangement of hydrangeas.'],
        ['id' => 110, 'brand' => 'Octavia', 'name' => 'Mixed Flower Basket', 'price' => 89.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/mixed_flower_basket.jpg', 'description' => 'A lovely basket of mixed flowers.'],
        ['id' => 111, 'brand' => 'Octavia', 'name' => 'Gerbera Daisies', 'price' => 69.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/gerbera_daisies.jpg', 'description' => 'A vibrant bunch of gerbera daisies.'],
        ['id' => 112, 'brand' => 'Octavia', 'name' => 'Tulip & Lily Mix', 'price' => 79.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/tulip_lily_mix.jpg', 'description' => 'A mix of tulips and lilies in a bouquet.'],
        ['id' => 113, 'brand' => 'Octavia', 'name' => 'Rose & Orchid Combo', 'price' => 119.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/rose_orchid_combo.jpg', 'description' => 'A stunning combo of roses and orchids.'],
        ['id' => 114, 'brand' => 'Octavia', 'name' => 'Sunflower & Daisy Mix', 'price' => 74.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/sunflower_daisy_mix.jpg', 'description' => 'A cheerful mix of sunflowers and daisies.'],
        ['id' => 115, 'brand' => 'Octavia', 'name' => 'Peony & Hydrangea', 'price' => 104.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/peony_hydrangea.jpg', 'description' => 'A beautiful arrangement of peonies and hydrangeas.'],
        ['id' => 116, 'brand' => 'Octavia', 'name' => 'Carnation & Rose Combo', 'price' => 89.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/carnation_rose_combo.jpg', 'description' => 'A lovely combo of carnations and roses.'],
        ['id' => 117, 'brand' => 'Octavia', 'name' => 'Lily & Orchid Arrangement', 'price' => 119.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/lily_orchid_arrangement.jpg', 'description' => 'A sophisticated arrangement of lilies and orchids.'],
        ['id' => 118, 'brand' => 'Octavia', 'name' => 'Mixed Spring Flowers', 'price' => 89.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/mixed_spring_flowers.jpg', 'description' => 'A colorful mix of spring flowers.'],
        ['id' => 119, 'brand' => 'Octavia', 'name' => 'Orchid & Tulip Mix', 'price' => 104.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/orchid_tulip_mix.jpg', 'description' => 'An elegant mix of orchids and tulips.'],
        ['id' => 120, 'brand' => 'Octavia', 'name' => 'Rose & Peony Bouquet', 'price' => 99.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/rose_peony_bouquet.jpg', 'description' => 'A beautiful bouquet of roses and peonies.'],
        ['id' => 121, 'brand' => 'Octavia', 'name' => 'Sunflower & Hydrangea Mix', 'price' => 84.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/sunflower_hydrangea_mix.jpg', 'description' => 'A vibrant mix of sunflowers and hydrangeas.'],
        ['id' => 122, 'brand' => 'Octavia', 'name' => 'Tulip & Daisy Arrangement', 'price' => 74.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/tulip_daisy_arrangement.jpg', 'description' => 'A fresh arrangement of tulips and daisies.'],
        ['id' => 123, 'brand' => 'Octavia', 'name' => 'Rose & Lily Combo', 'price' => 89.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/rose_lily_combo.jpg', 'description' => 'A classic combo of roses and lilies.'],
        ['id' => 124, 'brand' => 'Octavia', 'name' => 'Carnation & Sunflower', 'price' => 79.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/carnation_sunflower.jpg', 'description' => 'A cheerful mix of carnations and sunflowers.'],
        ['id' => 125, 'brand' => 'Octavia', 'name' => 'Mixed Flower Bouquets', 'price' => 104.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/mixed_flower_bouquets.jpg', 'description' => 'A selection of mixed flower bouquets.'],
        ['id' => 126, 'brand' => 'Octavia', 'name' => 'Orchid & Peony Arrangement', 'price' => 119.99, 'Occasion' => 'Just Because', 'img' => '/src/images/flowers/orchid_peony_arrangement.jpg', 'description' => 'A stunning arrangement of orchids and peonies.'],
        ['id' => 127, 'brand' => 'Octavia', 'name' => 'Rose & Carnation Mix', 'price' => 89.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/rose_carnation_mix.jpg', 'description' => 'A lovely mix of roses and carnations.'],
        ['id' => 128, 'brand' => 'Octavia', 'name' => 'Tulip & Hydrangea Combo', 'price' => 99.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/flowers/tulip_hydrangea_combo.jpg', 'description' => 'A beautiful combo of tulips and hydrangeas.'],
        ['id' => 129, 'brand' => 'Octavia', 'name' => 'Peony & Sunflower Mix', 'price' => 94.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/peony_sunflower_mix.jpg', 'description' => 'A vibrant mix of peonies and sunflowers.'],
        ['id' => 130, 'brand' => 'Octavia', 'name' => 'Orchid & Rose Basket', 'price' => 104.99, 'Occasion' => 'Thank You', 'img' => '/src/images/flowers/orchid_rose_basket.jpg', 'description' => 'An elegant basket of orchids and roses.']
    ],

    'Perfumes' => [
        ['id' => 201, 'brand' => 'Chanel', 'name' => 'Chanel No. 5', 'price' => 499.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/chanel_no_5.jpg', 'description' => 'Classic and timeless fragrance with floral notes.'],
        ['id' => 202, 'brand' => 'Chanel', 'name' => 'Chanel Coco Mademoiselle', 'price' => 469.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/chanel_coco_mademoiselle.jpg', 'description' => 'A modern and elegant fragrance with citrus notes.'],
        ['id' => 203, 'brand' => 'Chanel', 'name' => 'Chanel Chance', 'price' => 549.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/perfumes/chanel_chance.jpg', 'description' => 'A youthful and fresh fragrance with floral hints.'],
        ['id' => 204, 'brand' => 'Dior', 'name' => 'Dior Sauvage', 'price' => 529.99, 'Occasion' => 'Thank You', 'img' => '/src/images/perfumes/dior_sauvage.jpg', 'description' => 'A bold and spicy fragrance with woody undertones.'],
        ['id' => 205, 'brand' => 'Dior', 'name' => 'Dior J\'Adore', 'price' => 489.99, 'Occasion' => 'Just Because', 'img' => '/src/images/perfumes/dior_jadore.jpg', 'description' => 'A luxurious floral fragrance with hints of fruit.'],
        ['id' => 206, 'brand' => 'Dior', 'name' => 'Dior Addict', 'price' => 569.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/dior_addict.jpg', 'description' => 'A warm and sensual fragrance with vanilla and spices.'],
        ['id' => 207, 'brand' => 'Dior', 'name' => 'Dior Homme', 'price' => 509.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/dior_homme.jpg', 'description' => 'A sophisticated fragrance with leather and woody notes.'],
        ['id' => 208, 'brand' => 'Yves Saint Laurent', 'name' => 'Black Opium', 'price' => 459.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/perfumes/ysl_black_opium.jpg', 'description' => 'A seductive fragrance with coffee and vanilla notes.'],
        ['id' => 209, 'brand' => 'Yves Saint Laurent', 'name' => 'Libre', 'price' => 499.99, 'Occasion' => 'Thank You', 'img' => '/src/images/perfumes/ysl_libre.jpg', 'description' => 'A bold fragrance with lavender and vanilla notes.'],
        ['id' => 210, 'brand' => 'Yves Saint Laurent', 'name' => 'Mon Paris', 'price' => 469.99, 'Occasion' => 'Just Because', 'img' => '/src/images/perfumes/ysl_mon_paris.jpg', 'description' => 'A fruity and floral fragrance with strawberry and peony.'],
        ['id' => 211, 'brand' => 'Yves Saint Laurent', 'name' => 'La Nuit de L\'Homme', 'price' => 519.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/ysl_la_nuit_de_l_homme.jpg', 'description' => 'A spicy and woody fragrance with cardamom and cedar.'],
        ['id' => 212, 'brand' => 'Tom Ford', 'name' => 'Black Orchid', 'price' => 599.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/tom_ford_black_orchid.jpg', 'description' => 'An opulent fragrance with black orchid and spices.'],
        ['id' => 213, 'brand' => 'Tom Ford', 'name' => 'Tobacco Vanille', 'price' => 629.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/perfumes/tom_ford_tobacco_vanille.jpg', 'description' => 'A rich fragrance with tobacco and vanilla.'],
        ['id' => 214, 'brand' => 'Tom Ford', 'name' => 'Neroli Portofino', 'price' => 579.99, 'Occasion' => 'Thank You', 'img' => '/src/images/perfumes/tom_ford_neroli_portofino.jpg', 'description' => 'A fresh and citrusy fragrance with neroli and bergamot.'],
        ['id' => 215, 'brand' => 'Tom Ford', 'name' => 'Oud Wood', 'price' => 609.99, 'Occasion' => 'Just Because', 'img' => '/src/images/perfumes/tom_ford_oud_wood.jpg', 'description' => 'A warm fragrance with oud and spices.'],
        ['id' => 216, 'brand' => 'Creed', 'name' => 'Aventus', 'price' => 799.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/creed_aventus.jpg', 'description' => 'A powerful fragrance with pineapple and musk.'],
        ['id' => 217, 'brand' => 'Creed', 'name' => 'Green Irish Tweed', 'price' => 749.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/creed_green_irish_tweed.jpg', 'description' => 'A fresh fragrance with iris and green notes.'],
        ['id' => 218, 'brand' => 'Creed', 'name' => 'Royal Oud', 'price' => 799.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/perfumes/creed_royal_oud.jpg', 'description' => 'An elegant fragrance with oud and spices.'],
        ['id' => 219, 'brand' => 'Creed', 'name' => 'Viking', 'price' => 769.99, 'Occasion' => 'Thank You', 'img' => '/src/images/perfumes/creed_viking.jpg', 'description' => 'A bold fragrance with spicy and woody notes.'],
        ['id' => 220, 'brand' => 'Giorgio Armani', 'name' => 'Acqua di Gio', 'price' => 489.99, 'Occasion' => 'Just Because', 'img' => '/src/images/perfumes/armani_acqua_di_gio.jpg', 'description' => 'A fresh and aquatic fragrance with citrus notes.'],
        ['id' => 221, 'brand' => 'Giorgio Armani', 'name' => 'Si', 'price' => 479.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/armani_si.jpg', 'description' => 'A sophisticated fragrance with blackcurrant and vanilla.'],
        ['id' => 222, 'brand' => 'Giorgio Armani', 'name' => 'Armani Code', 'price' => 499.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/armani_code.jpg', 'description' => 'A seductive fragrance with tonka bean and citrus.'],
        ['id' => 223, 'brand' => 'Giorgio Armani', 'name' => 'Armani Code Profumo', 'price' => 529.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/perfumes/armani_code_profumo.jpg', 'description' => 'A warm and spicy fragrance with amber and leather.'],
        ['id' => 224, 'brand' => 'Gucci', 'name' => 'Gucci Bloom', 'price' => 449.99, 'Occasion' => 'Thank You', 'img' => '/src/images/perfumes/gucci_bloom.jpg', 'description' => 'A floral fragrance with jasmine and tuberose.'],
        ['id' => 225, 'brand' => 'Gucci', 'name' => 'Gucci Guilty', 'price' => 469.99, 'Occasion' => 'Just Because', 'img' => '/src/images/perfumes/gucci_guilty.jpg', 'description' => 'A bold fragrance with amber and patchouli.'],
        ['id' => 226, 'brand' => 'Gucci', 'name' => 'Gucci Memoire d\'une Odeur', 'price' => 489.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/gucci_memoire_dune_odour.jpg', 'description' => 'A unique fragrance with chamomile and cedarwood.'],
        ['id' => 227, 'brand' => 'Gucci', 'name' => 'Gucci Flora Gorgeous Gardenia', 'price' => 459.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/gucci_flora_gorgeous_gardenia.jpg', 'description' => 'A fruity and floral fragrance with gardenia and pear.']
    ],


    'Gift Sets' => [
        ['id' => 301, 'brand' => 'Octavia', 'name' => 'Luxury Spa Set', 'price' => 349.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/luxury_spa_set.jpg', 'description' => 'A luxurious spa set featuring scented candles, bath salts, and lotions.'],
        ['id' => 302, 'brand' => 'Octavia', 'name' => 'Gourmet Chocolate Box', 'price' => 249.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/gourmet_chocolate_box.jpg', 'description' => 'A selection of premium chocolates in an elegant box.'],
        ['id' => 303, 'brand' => 'Octavia', 'name' => 'Classic Tea Collection', 'price' => 299.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/classic_tea_collection.jpg', 'description' => 'A curated collection of fine teas and a stylish teapot.'],
        ['id' => 304, 'brand' => 'Octavia', 'name' => 'Elegant Wine Set', 'price' => 399.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/elegant_wine_set.jpg', 'description' => 'A set featuring a bottle of premium wine, wine glasses, and a corkscrew.'],
        ['id' => 305, 'brand' => 'Octavia', 'name' => 'Artisan Cheese Platter', 'price' => 279.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/artisan_cheese_platter.jpg', 'description' => 'An assortment of gourmet cheeses paired with crackers and jams.'],
        ['id' => 306, 'brand' => 'Octavia', 'name' => 'Personalized Jewelry Set', 'price' => 449.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/personalized_jewelry_set.jpg', 'description' => 'A custom jewelry set including a necklace and earrings with personalization options.'],
        ['id' => 307, 'brand' => 'Octavia', 'name' => 'Luxury Candle Set', 'price' => 329.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/luxury_candle_set.jpg', 'description' => 'A set of high-quality scented candles in a decorative box.'],
        ['id' => 308, 'brand' => 'Octavia', 'name' => 'Gourmet Coffee Bundle', 'price' => 239.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/gourmet_coffee_bundle.jpg', 'description' => 'A bundle of artisanal coffees and a stylish French press.'],
        ['id' => 309, 'brand' => 'Octavia', 'name' => 'Home Décor Set', 'price' => 359.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/home_decor_set.jpg', 'description' => 'A set including decorative vases, picture frames, and candles.'],
        ['id' => 310, 'brand' => 'Octavia', 'name' => 'Fitness Enthusiast Pack', 'price' => 299.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/fitness_enthusiast_pack.jpg', 'description' => 'A set including a water bottle, towel, and resistance bands.'],
        ['id' => 311, 'brand' => 'Chanel', 'name' => 'Chanel Fragrance Gift Set', 'price' => 589.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/chanel_fragrance_gift_set.jpg', 'description' => 'A gift set featuring a selection of Chanel perfumes.'],
        ['id' => 312, 'brand' => 'Chanel', 'name' => 'Chanel Skincare Set', 'price' => 639.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/chanel_skincare_set.jpg', 'description' => 'A luxurious skincare set from Chanel including creams and serums.'],
        ['id' => 313, 'brand' => 'Chanel', 'name' => 'Chanel Makeup Collection', 'price' => 679.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/chanel_makeup_collection.jpg', 'description' => 'An exclusive makeup collection featuring Chanel cosmetics.'],
        ['id' => 314, 'brand' => 'Chanel', 'name' => 'Chanel Fashion Accessories Set', 'price' => 709.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/chanel_fashion_accessories_set.jpg', 'description' => 'A set of Chanel fashion accessories including scarves and sunglasses.'],
        ['id' => 315, 'brand' => 'Chanel', 'name' => 'Chanel Classic Bag', 'price' => 1899.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/chanel_classic_bag.jpg', 'description' => 'A timeless Chanel bag perfect for any occasion.'],
        ['id' => 316, 'brand' => 'Dior', 'name' => 'Dior Fragrance Collection', 'price' => 629.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/dior_fragrance_collection.jpg', 'description' => 'A collection of Dior fragrances in an elegant gift box.'],
        ['id' => 317, 'brand' => 'Dior', 'name' => 'Dior Makeup Set', 'price' => 699.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/dior_makeup_set.jpg', 'description' => 'A luxurious makeup set featuring Dior products.'],
        ['id' => 318, 'brand' => 'Dior', 'name' => 'Dior Skincare Essentials', 'price' => 759.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/dior_skincare_essentials.jpg', 'description' => 'Essential skincare products from Dior for a complete routine.'],
        ['id' => 319, 'brand' => 'Dior', 'name' => 'Dior Fashion Accessories', 'price' => 729.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/dior_fashion_accessories.jpg', 'description' => 'A set of Dior fashion accessories including belts and wallets.'],
        ['id' => 320, 'brand' => 'Dior', 'name' => 'Dior Luxury Handbag', 'price' => 2099.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/dior_luxury_handbag.jpg', 'description' => 'A high-end Dior handbag, ideal for any special occasion.'],
        ['id' => 321, 'brand' => 'Yves Saint Laurent', 'name' => 'YSL Fragrance Set', 'price' => 549.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/ysl_fragrance_set.jpg', 'description' => 'An exquisite fragrance set from Yves Saint Laurent.'],
        ['id' => 322, 'brand' => 'Yves Saint Laurent', 'name' => 'YSL Beauty Collection', 'price' => 599.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/ysl_beauty_collection.jpg', 'description' => 'A collection of YSL beauty products including makeup and skincare.'],
        ['id' => 323, 'brand' => 'Yves Saint Laurent', 'name' => 'YSL Perfume & Accessories Set', 'price' => 579.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/ysl_perfume_accessories_set.jpg', 'description' => 'A gift set including a YSL perfume and matching accessories.'],
        ['id' => 324, 'brand' => 'Yves Saint Laurent', 'name' => 'YSL Elegant Jewelry Set', 'price' => 629.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/ysl_elegant_jewelry_set.jpg', 'description' => 'An elegant jewelry set from YSL including a necklace and bracelet.'],
        ['id' => 325, 'brand' => 'Yves Saint Laurent', 'name' => 'YSL Luxury Handbag', 'price' => 1999.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/ysl_luxury_handbag.jpg', 'description' => 'A chic and stylish YSL handbag for any occasion.'],
        ['id' => 326, 'brand' => 'Gucci', 'name' => 'Gucci Fragrance Set', 'price' => 459.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/gucci_fragrance_set.jpg', 'description' => 'A sophisticated Gucci fragrance set featuring multiple scents.'],
        ['id' => 327, 'brand' => 'Gucci', 'name' => 'Gucci Skincare Set', 'price' => 499.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/gucci_skincare_set.jpg', 'description' => 'Premium skincare products from Gucci in a luxurious set.'],
        ['id' => 328, 'brand' => 'Gucci', 'name' => 'Gucci Makeup Collection', 'price' => 539.99, 'Occasion' => 'Congratulations', 'img' => '/src/images/gift_sets/gucci_makeup_collection.jpg', 'description' => 'A complete Gucci makeup collection with various cosmetic items.'],
        ['id' => 329, 'brand' => 'Gucci', 'name' => 'Gucci Fashion Accessories', 'price' => 489.99, 'Occasion' => 'Thank You', 'img' => '/src/images/gift_sets/gucci_fashion_accessories.jpg', 'description' => 'A stylish set of Gucci fashion accessories including belts and scarves.'],
        ['id' => 330, 'brand' => 'Gucci', 'name' => 'Gucci Exclusive Handbag', 'price' => 2399.99, 'Occasion' => 'Just Because', 'img' => '/src/images/gift_sets/gucci_exclusive_handbag.jpg', 'description' => 'An exclusive Gucci handbag, perfect for any special event.']
    ],


    'Chocolates_and_Sweets' => [
        ['id' => 401, 'brand' => 'Lindt', 'name' => 'Lindt Swiss Chocolate Bar', 'price' => 45.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/lindt_swiss_chocolate_bar.jpg', 'description' => 'Smooth and creamy Swiss chocolate bar with rich flavors.'],
        ['id' => 402, 'brand' => 'Godiva', 'name' => 'Godiva Chocolate Truffles', 'price' => 85.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/chocolates_and_sweets/godiva_chocolate_truffles.jpg', 'description' => 'Luxurious chocolate truffles with a variety of fillings.'],
        ['id' => 403, 'brand' => 'Cadbury', 'name' => 'Cadbury Dairy Milk', 'price' => 25.00, 'Occasion' => 'Thank You', 'img' => '/src/images/chocolates_and_sweets/cadbury_dairy_milk.jpg', 'description' => 'Classic creamy milk chocolate bar.'],
        ['id' => 404, 'brand' => 'Toblerone', 'name' => 'Toblerone Swiss Chocolate', 'price' => 40.00, 'Occasion' => 'Just Because', 'img' => '/src/images/chocolates_and_sweets/toblerone_swiss_chocolate.jpg', 'description' => 'Unique triangular shaped chocolate with honey and almond nougat.'],
        ['id' => 405, 'brand' => 'Ferrero Rocher', 'name' => 'Ferrero Rocher Hazelnut Chocolates', 'price' => 70.00, 'Occasion' => 'Graduation', 'img' => '/src/images/chocolates_and_sweets/ferrero_rocher_hazelnut.jpg', 'description' => 'Indulge in these crispy hazelnut chocolates with creamy filling.'],
        ['id' => 406, 'brand' => 'Ghirardelli', 'name' => 'Ghirardelli Intense Dark', 'price' => 55.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/ghirardelli_intense_dark.jpg', 'description' => 'Rich and intense dark chocolate with a smooth finish.'],
        ['id' => 407, 'brand' => 'Hershey', 'name' => 'Hershey’s Milk Chocolate Bar', 'price' => 20.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/chocolates_and_sweets/hersheys_milk_chocolate_bar.jpg', 'description' => 'Classic milk chocolate bar with a creamy taste.'],
        ['id' => 408, 'brand' => 'Lindt', 'name' => 'Lindt Lindor Truffles', 'price' => 95.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/chocolates_and_sweets/lindt_lindor_truffles.jpg', 'description' => 'Smooth melting truffles with a variety of flavors.'],
        ['id' => 409, 'brand' => 'Guylian', 'name' => 'Guylian Sea Shells', 'price' => 85.00, 'Occasion' => 'Thank You', 'img' => '/src/images/chocolates_and_sweets/guylian_sea_shells.jpg', 'description' => 'Sea shell shaped chocolates with a rich hazelnut filling.'],
        ['id' => 410, 'brand' => 'Ritter Sport', 'name' => 'Ritter Sport Whole Hazelnuts', 'price' => 35.00, 'Occasion' => 'Just Because', 'img' => '/src/images/chocolates_and_sweets/ritter_sport_whole_hazelnuts.jpg', 'description' => 'Delicious milk chocolate bar with whole hazelnuts.'],
        ['id' => 411, 'brand' => 'Lindt', 'name' => 'Lindt Excellence Mint', 'price' => 50.00, 'Occasion' => 'Graduation', 'img' => '/src/images/chocolates_and_sweets/lindt_excellence_mint.jpg', 'description' => 'Refreshing mint chocolate with Lindt’s signature smoothness.'],
        ['id' => 412, 'brand' => 'Godiva', 'name' => 'Godiva Milk Chocolate Bars', 'price' => 60.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/godiva_milk_chocolate_bars.jpg', 'description' => 'Rich and creamy milk chocolate bars.'],
        ['id' => 413, 'brand' => 'Cadbury', 'name' => 'Cadbury Roses', 'price' => 90.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/chocolates_and_sweets/cadbury_roses.jpg', 'description' => 'An assortment of Cadbury chocolates in a beautiful box.'],
        ['id' => 414, 'brand' => 'Toblerone', 'name' => 'Toblerone Fruit & Nut', 'price' => 45.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/chocolates_and_sweets/toblerone_fruit_nut.jpg', 'description' => 'Toblerone with added fruit and nut pieces for a unique taste.'],
        ['id' => 415, 'brand' => 'Ferrero Rocher', 'name' => 'Ferrero Rocher Golden Gallery', 'price' => 75.00, 'Occasion' => 'Thank You', 'img' => '/src/images/chocolates_and_sweets/ferrero_rocher_golden_gallery.jpg', 'description' => 'An assortment of Ferrero Rocher chocolates in a golden box.'],
        ['id' => 416, 'brand' => 'Ghirardelli', 'name' => 'Ghirardelli Milk Chocolate Caramel', 'price' => 70.00, 'Occasion' => 'Just Because', 'img' => '/src/images/chocolates_and_sweets/ghirardelli_milk_chocolate_caramel.jpg', 'description' => 'Milk chocolate with a rich caramel center.'],
        ['id' => 417, 'brand' => 'Hershey', 'name' => 'Hershey’s Kisses', 'price' => 30.00, 'Occasion' => 'Graduation', 'img' => '/src/images/chocolates_and_sweets/hersheys_kisses.jpg', 'description' => 'Classic Hershey’s Kisses chocolates, perfect for any occasion.'],
        ['id' => 418, 'brand' => 'Lindt', 'name' => 'Lindt Milk Chocolate Bar', 'price' => 40.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/lindt_milk_chocolate_bar.jpg', 'description' => 'Creamy milk chocolate bar from Lindt.'],
        ['id' => 419, 'brand' => 'Guylian', 'name' => 'Guylian Chocolate Pralines', 'price' => 85.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/chocolates_and_sweets/guylian_chocolate_pralines.jpg', 'description' => 'Exquisite pralines with a unique taste and texture.'],
        ['id' => 420, 'brand' => 'Ritter Sport', 'name' => 'Ritter Sport Dark Chocolate', 'price' => 30.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/chocolates_and_sweets/ritter_sport_dark_chocolate.jpg', 'description' => 'Rich dark chocolate with a full flavor.'],
        ['id' => 421, 'brand' => 'Lindt', 'name' => 'Lindt Hazelnut Chocolate', 'price' => 50.00, 'Occasion' => 'Thank You', 'img' => '/src/images/chocolates_and_sweets/lindt_hazelnut_chocolate.jpg', 'description' => 'Delicious milk chocolate with whole hazelnuts.'],
        ['id' => 422, 'brand' => 'Godiva', 'name' => 'Godiva Dark Chocolate', 'price' => 60.00, 'Occasion' => 'Just Because', 'img' => '/src/images/chocolates_and_sweets/godiva_dark_chocolate.jpg', 'description' => 'Luxurious dark chocolate with rich flavor.'],
        ['id' => 423, 'brand' => 'Cadbury', 'name' => 'Cadbury Whole Nut', 'price' => 35.00, 'Occasion' => 'Graduation', 'img' => '/src/images/chocolates_and_sweets/cadbury_whole_nut.jpg', 'description' => 'Creamy milk chocolate bar with whole nuts.'],
        ['id' => 424, 'brand' => 'Toblerone', 'name' => 'Toblerone White Chocolate', 'price' => 50.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/toblerone_white_chocolate.jpg', 'description' => 'White chocolate with honey and almond nougat.'],
    ],
    'Watches' => [
        ['id' => 601, 'brand' => 'Rolex', 'name' => 'Rolex Submariner', 'price' => 27500.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/rolex_submariner.jpg', 'description' => 'Classic Rolex Submariner with stainless steel and black dial.'],
        ['id' => 602, 'brand' => 'Omega', 'name' => 'Omega Seamaster', 'price' => 22000.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/omega_seamaster.jpg', 'description' => 'Elegant Omega Seamaster with blue dial and stainless steel bracelet.'],
        ['id' => 603, 'brand' => 'Tag Heuer', 'name' => 'Tag Heuer Carrera', 'price' => 9500.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/tag_heuer_carrera.jpg', 'description' => 'Sporty Tag Heuer Carrera with chronograph function and leather strap.'],
        ['id' => 604, 'brand' => 'Breitling', 'name' => 'Breitling Navitimer', 'price' => 11200.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/watches/breitling_navitimer.jpg', 'description' => 'Iconic Breitling Navitimer with a complex dial and stainless steel case.'],
        ['id' => 605, 'brand' => 'Patek Philippe', 'name' => 'Patek Philippe Calatrava', 'price' => 40000.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/patek_philippe_calatrava.jpg', 'description' => 'Timeless Patek Philippe Calatrava with a simple yet elegant design.'],
        ['id' => 606, 'brand' => 'Cartier', 'name' => 'Cartier Ballon Bleu', 'price' => 15500.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/cartier_ballon_bleu.jpg', 'description' => 'Luxurious Cartier Ballon Bleu with distinctive round shape and blue cabochon.'],
        ['id' => 607, 'brand' => 'Tag Heuer', 'name' => 'Tag Heuer Monaco', 'price' => 8500.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/tag_heuer_monaco.jpg', 'description' => 'Distinctive Tag Heuer Monaco with square case and chronograph function.'],
        ['id' => 608, 'brand' => 'Omega', 'name' => 'Omega Speedmaster', 'price' => 13500.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/watches/omega_speedmaster.jpg', 'description' => 'Legendary Omega Speedmaster with chronograph and tachymetric scale.'],
        ['id' => 609, 'brand' => 'Rolex', 'name' => 'Rolex Datejust', 'price' => 25000.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/rolex_datejust.jpg', 'description' => 'Classic Rolex Datejust with a versatile design and date function.'],
        ['id' => 610, 'brand' => 'Breitling', 'name' => 'Breitling Superocean', 'price' => 9800.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/breitling_superocean.jpg', 'description' => 'Robust Breitling Superocean designed for diving with high water resistance.'],
        ['id' => 611, 'brand' => 'Patek Philippe', 'name' => 'Patek Philippe Nautilus', 'price' => 55000.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/patek_philippe_nautilus.jpg', 'description' => 'Iconic Patek Philippe Nautilus with a distinctive porthole design.'],
        ['id' => 612, 'brand' => 'Cartier', 'name' => 'Cartier Santos', 'price' => 12000.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/watches/cartier_santos.jpg', 'description' => 'Elegant Cartier Santos with a classic square case and leather strap.'],
        ['id' => 613, 'brand' => 'Rolex', 'name' => 'Rolex Explorer', 'price' => 26500.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/rolex_explorer.jpg', 'description' => 'Rolex Explorer with a rugged design and highly legible dial.'],
        ['id' => 614, 'brand' => 'Omega', 'name' => 'Omega Constellation', 'price' => 18000.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/omega_constellation.jpg', 'description' => 'Stylish Omega Constellation with a distinctive star logo and elegant design.'],
        ['id' => 615, 'brand' => 'Tag Heuer', 'name' => 'Tag Heuer Aquaracer', 'price' => 8900.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/tag_heuer_aquaracer.jpg', 'description' => 'Durable Tag Heuer Aquaracer with a sporty design and high water resistance.'],
        ['id' => 616, 'brand' => 'Breitling', 'name' => 'Breitling Chronomat', 'price' => 11500.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/watches/breitling_chronomat.jpg', 'description' => 'Versatile Breitling Chronomat with chronograph functions and a bold design.'],
        ['id' => 617, 'brand' => 'Patek Philippe', 'name' => 'Patek Philippe Aquanaut', 'price' => 62000.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/patek_philippe_aquanaut.jpg', 'description' => 'Patek Philippe Aquanaut with a sporty design and advanced movement.'],
        ['id' => 618, 'brand' => 'Cartier', 'name' => 'Cartier Drive de Cartier', 'price' => 13500.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/cartier_drive_de_cartier.jpg', 'description' => 'Elegant Cartier Drive de Cartier with a classic round case and sophisticated design.'],
        ['id' => 619, 'brand' => 'Rolex', 'name' => 'Rolex GMT-Master II', 'price' => 29500.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/rolex_gmt_master_ii.jpg', 'description' => 'Rolex GMT-Master II with dual time zone functionality and robust design.'],
        ['id' => 620, 'brand' => 'Omega', 'name' => 'Omega De Ville', 'price' => 15000.00, 'Occasion' => 'Congratulations', 'img' => '/src/images/watches/omega_de_ville.jpg', 'description' => 'Sophisticated Omega De Ville with a refined design and elegant dial.'],
        ['id' => 621, 'brand' => 'Tag Heuer', 'name' => 'Tag Heuer Connected', 'price' => 6000.00, 'Occasion' => 'Just Because', 'img' => '/src/images/watches/tag_heuer_connected.jpg', 'description' => 'Smart Tag Heuer Connected watch with advanced technology and stylish design.'],
        ['id' => 622, 'brand' => 'Breitling', 'name' => 'Breitling Avenger', 'price' => 10500.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/breitling_avenger.jpg', 'description' => 'Rugged Breitling Avenger with a bold design and high durability.'],
        ['id' => 623, 'brand' => 'Patek Philippe', 'name' => 'Patek Philippe Grand Complications', 'price' => 75000.00, 'Occasion' => 'Graduation', 'img' => '/src/images/watches/patek_philippe_grand_complications.jpg', 'description' => 'Exquisite Patek Philippe Grand Complications with advanced horological features.'],
        ['id' => 624, 'brand' => 'Cartier', 'name' => 'Cartier Panthère', 'price' => 14500.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/cartier_panthere.jpg', 'description' => 'Elegant Cartier Panthère with a distinctive design and refined aesthetic.'],
    ],
];




















$inventory = [
    'Flowers' => [
        ['id' => 101, 'brand' => 'Octavia', 'name' => 'Rose Bouquet', 'price' => 99.99, 'Occasion' => 'Birthday', 'img' => '/src/images/flowers/rose_bouquet.jpg', 'description' => 'A beautiful bouquet of fresh roses.'],
        ['id' => 102, 'brand' => 'Octavia', 'name' => 'Tulip Bundle', 'price' => 79.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/flowers/tulip_bundle.jpg', 'description' => 'A vibrant bundle of tulips.'],
    ],

    'Perfumes' => [
        ['id' => 201, 'brand' => 'Chanel', 'name' => 'Chanel No. 5', 'price' => 499.99, 'Occasion' => 'Birthday', 'img' => '/src/images/perfumes/chanel_no_5.jpg', 'description' => 'Classic and timeless fragrance with floral notes.'],
        ['id' => 202, 'brand' => 'Chanel', 'name' => 'Chanel Coco Mademoiselle', 'price' => 469.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/perfumes/chanel_coco_mademoiselle.jpg', 'description' => 'A modern and elegant fragrance with citrus notes.'],
    ],


    'Gift Sets' => [
        ['id' => 301, 'brand' => 'Octavia', 'name' => 'Luxury Spa Set', 'price' => 349.99, 'Occasion' => 'Birthday', 'img' => '/src/images/gift_sets/luxury_spa_set.jpg', 'description' => 'A luxurious spa set featuring scented candles, bath salts, and lotions.'],
        ['id' => 302, 'brand' => 'Octavia', 'name' => 'Gourmet Chocolate Box', 'price' => 249.99, 'Occasion' => 'Anniversary', 'img' => '/src/images/gift_sets/gourmet_chocolate_box.jpg', 'description' => 'A selection of premium chocolates in an elegant box.'],
    ],


    'Chocolates_and_Sweets' => [
        ['id' => 401, 'brand' => 'Lindt', 'name' => 'Lindt Swiss Chocolate Bar', 'price' => 45.00, 'Occasion' => 'Birthday', 'img' => '/src/images/chocolates_and_sweets/lindt_swiss_chocolate_bar.jpg', 'description' => 'Smooth and creamy Swiss chocolate bar with rich flavors.'],
        ['id' => 402, 'brand' => 'Godiva', 'name' => 'Godiva Chocolate Truffles', 'price' => 85.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/chocolates_and_sweets/godiva_chocolate_truffles.jpg', 'description' => 'Luxurious chocolate truffles with a variety of fillings.'],
    ],
    'Watches' => [
        ['id' => 601, 'brand' => 'Rolex', 'name' => 'Rolex Submariner', 'price' => 27500.00, 'Occasion' => 'Anniversary', 'img' => '/src/images/watches/rolex_submariner.jpg', 'description' => 'Classic Rolex Submariner with stainless steel and black dial.'],
        ['id' => 602, 'brand' => 'Omega', 'name' => 'Omega Seamaster', 'price' => 22000.00, 'Occasion' => 'Birthday', 'img' => '/src/images/watches/omega_seamaster.jpg', 'description' => 'Elegant Omega Seamaster with blue dial and stainless steel bracelet.'],
    ],
];
