-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 08:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `octavia`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `long_description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `category`, `brand`, `name`, `price`, `occasion`, `description`, `long_description`, `img`) VALUES
(1, 'Flowers', 'Artisté', 'Rose Delight', 149.99, 'Valentine\'s Day', 'A stunning bouquet of red roses, perfect for expressing love and passion.', '', '../src/images/flowers/rose_delight.jpg'),
(2, 'Flowers', 'Artisté', 'Sunflower Surprise', 99.99, 'Birthday', 'A cheerful arrangement of bright sunflowers, ideal for brightening someone\\\'s special day.', '', '../src/images/flowers/sunflower_surprise.jpg'),
(3, 'Flowers', 'Artisté', 'Tulip Treasure', 129.99, 'Anniversary', 'An elegant mix of tulips in various colors, symbolizing grace and elegance.', '', '../src/images/flowers/tulip_treasure.jpg'),
(4, 'Flowers', 'Artisté', 'Lily Luxury', 180.00, 'Mother\'s Day', 'A luxurious bouquet of lilies, representing purity and refined beauty.', '', '../src/images/flowers/lily_luxury.jpg'),
(5, 'Flowers', 'Artisté', 'Daisy Dream', 89.99, 'Get Well', 'A charming bunch of daisies to lift spirits and bring joy.', '', '../src/images/flowers/daisy_dream.jpg'),
(6, 'Flowers', 'Artisté', 'Orchid Oasis', 199.99, 'Congratulations', 'An exotic orchid arrangement that exudes sophistication and elegance.', '', '../src/images/flowers/orchid_oasis.jpg'),
(7, 'Flowers', 'Artisté', 'Carnation Charm', 99.99, 'Sympathy', 'A heartfelt bouquet of carnations to convey sympathy and support.', '', '../src/images/flowers/carnation_charm.jpg'),
(8, 'Flowers', 'Artisté', 'Peony Perfection', 169.99, 'Wedding', 'A romantic mix of peonies, perfect for celebrating a wedding or anniversary.', '', '../src/images/flowers/peony_perfection.jpg'),
(9, 'Flowers', 'Artisté', 'Iris Inspiration', 109.99, 'Graduation', 'An inspiring bouquet of irises, symbolizing wisdom and admiration.', '', '../src/images/flowers/iris_inspiration.jpg'),
(10, 'Flowers', 'Artisté', 'Lavender Love', 89.99, 'Just Because', 'A soothing arrangement of lavender flowers to show appreciation and care.', '', '../src/images/flowers/lavender_love.jpg'),
(11, 'Flowers', 'Artisté', 'Hydrangea Harmony', 159.99, 'Housewarming', 'A beautiful bouquet of hydrangeas, perfect for celebrating a new home.', '', '../src/images/flowers/hydrangea_harmony.jpg'),
(12, 'Flowers', 'Artisté', 'Magnolia Majesty', 189.99, 'Thank You', 'A majestic arrangement of magnolias to express gratitude and appreciation.', '', '../src/images/flowers/magnolia_majesty.jpg'),
(13, 'Flowers', 'Artisté', 'Poppy Passion', 89.99, 'Friendship', 'A vibrant mix of poppies to celebrate the joy of friendship.', '', '../src/images/flowers/poppy_passion.jpg'),
(14, 'Flowers', 'Artisté', 'Cherry Blossom Charm', 139.99, 'Spring', 'A delightful arrangement of cherry blossoms, perfect for spring celebrations.', '', '../src/images/flowers/cherry_blossom_charm.jpg'),
(15, 'Flowers', 'Artisté', 'Gardenia Grace', 179.99, 'Summer', 'A graceful bouquet of gardenias, ideal for summer occasions.', '', '../src/images/flowers/gardenia_grace.jpg'),
(16, 'Flowers', 'Artisté', 'Hibiscus Happiness', 129.99, 'Tropical', 'A vibrant mix of hibiscus flowers to bring a touch of the tropics.', '', '../src/images/flowers/hibiscus_happiness.jpg'),
(17, 'Flowers', 'Artisté', 'Bluebell Bliss', 99.99, 'Autumn', 'A charming arrangement of bluebells, perfect for autumn celebrations.', '', '../src/images/flowers/bluebell_bliss.jpg'),
(18, 'Flowers', 'Artisté', 'Marigold Magic', 109.99, 'Halloween', 'A festive bouquet of marigolds, ideal for Halloween decor.', '', '../src/images/flowers/marigold_magic.jpg'),
(19, 'Flowers', 'Artisté', 'Holly Happiness', 129.99, 'Christmas', 'A joyful mix of holly and festive greens for the holiday season.', '', '../src/images/flowers/holly_happiness.jpg'),
(20, 'Flowers', 'Artisté', 'Snowdrop Serenity', 159.99, 'Winter', 'A serene arrangement of snowdrops, perfect for winter celebrations.', '', '../src/images/flowers/snowdrop_serenity.jpg'),
(21, 'Flowers', 'Artisté', 'Freesia Fantasy', 119.99, 'Easter', 'A fresh bouquet of freesia, perfect for celebrating Easter.', '', '../src/images/flowers/freesia_fantasy.jpg'),
(22, 'Flowers', 'Artisté', 'Zinnia Zest', 109.99, '', 'A lively mix of zinnias to celebrate the arrival of a new baby.', '', '../src/images/flowers/zinnia_zest.jpg'),
(23, 'Flowers', 'Artisté', 'Snapdragon Surprise', 129.99, 'Engagement', 'A stunning arrangement of snapdragons, perfect for an engagement celebration.', '', '../src/images/flowers/snapdragon_surprise.jpg'),
(24, 'Flowers', 'Artisté', 'Anemone Admiration', 149.99, 'Promotion', 'A beautiful bouquet of anemones, ideal for celebrating a promotion.', '', '../src/images/flowers/anemone_admiration.jpg'),
(25, 'Perfumes', 'Chanel', 'Coco Mademoiselle', 499.99, '', 'A captivating fragrance with a blend of orange, jasmine, and rose, perfect for special occasions.', '', '../src/images/Perfumes/coco_mademoiselle.webp'),
(26, 'Perfumes', 'Chanel', 'Chance Eau Tendre', 349.99, 'Birthday', 'A refreshing scent with notes of grapefruit and quince, ideal for summer days.', '', '../src/images/Perfumes/chance_eau_tendre.webp'),
(27, 'Perfumes', 'Chanel', 'No. 5', 549.99, 'Evening', 'An iconic blend of floral and aldehyde notes, perfect for evening wear.', '', '../src/images/Perfumes/no5.webp'),
(28, 'Perfumes', 'Chanel', 'Gabrielle', 459.99, '', 'A radiant fragrance with notes of jasmine, ylang-ylang, and orange blossom, perfect for everyday use.', '', '../src/images/Perfumes/gabrielle.webp'),
(29, 'Perfumes', 'Dior', 'J\'adore', 479.99, 'Wedding', 'A luxurious blend of ylang-ylang, rose, and jasmine, perfect for weddings and romantic occasions.', '', '../src/images/Perfumes/jadore.webp'),
(30, 'Perfumes', 'Dior', 'Miss Dior', 399.99, 'Daytime', 'A bright and elegant floral scent, ideal for daytime wear.', '', '../src/images/Perfumes/miss_dior.webp'),
(31, 'Perfumes', 'Dior', 'Sauvage', 429.99, 'Evening', 'A bold and fresh fragrance with notes of bergamot and amber, perfect for evening events.', '', '../src/images/Perfumes/sauvage.webp'),
(32, 'Perfumes', 'Dior', 'Hypnotic Poison', 359.99, 'Casual', 'A sensual blend of vanilla, almond, and jasmine, ideal for a calm and relaxed atmosphere.', '', '../src/images/Perfumes/hypnotic_poison.webp'),
(33, 'Perfumes', 'Gucci', 'Bloom', 379.99, 'Spring', 'A fresh and floral fragrance with notes of jasmine and tuberose, perfect for spring days.', '', '../src/images/Perfumes/bloom.webp'),
(34, 'Perfumes', 'Gucci', 'Guilty', 419.99, 'Evening', 'A captivating blend of lilac, peach, and amber, perfect for evening wear.', '', '../src/images/Perfumes/guilty.webp'),
(35, 'Perfumes', 'Gucci', 'Flora', 339.99, 'Summer', 'A bright and cheerful floral scent, ideal for summer vacations.', '', '../src/images/Perfumes/flora.jpeg'),
(36, 'Perfumes', 'Gucci', 'Memoire d\'une Odeur', 459.99, 'Casual', 'A unique fragrance with notes of chamomile and musk, perfect for everyday use.', '', '../src/images/Perfumes/memoire.webp'),
(37, 'Perfumes', 'Versace', 'Eros', 429.99, 'Romantic', 'A passionate and intense fragrance with notes of mint, green apple, and vanilla.', '', '../src/images/Perfumes/eros.jpg'),
(38, 'Perfumes', 'Versace', 'Bright Crystal', 389.99, 'Birthday', 'A vibrant blend of yuzu, pomegranate, and peony, ideal for special celebrations.', '', '../src/images/Perfumes/bright_crystal.png'),
(39, 'Perfumes', 'Versace', 'Dylan Blue', 409.99, 'Evening', 'A fresh and bold scent with notes of fig, blackcurrant, and patchouli.', '', '../src/images/Perfumes/dylan_blue.jpg'),
(40, 'Perfumes', 'Versace', 'Crystal Noir', 449.99, 'Evening', 'A mysterious blend of gardenia, amber, and musk, perfect for evening events.', '', '../src/images/Perfumes/crystal_noir.jpg'),
(41, 'Perfumes', 'Yves Saint Laurent', 'Black Opium', 479.99, 'Night Out', 'A seductive fragrance with notes of coffee, vanilla, and white flowers, perfect for a night out.', '', '../src/images/Perfumes/black_opium.webp'),
(42, 'Perfumes', 'Yves Saint Laurent', 'Libre', 459.99, 'Daytime', 'A bold and floral scent with notes of lavender and orange blossom, ideal for daytime wear.', '', '../src/images/Perfumes/libre.webp'),
(43, 'Perfumes', 'Yves Saint Laurent', 'Mon Paris', 499.99, 'Romantic', 'A passionate blend of red berries, datura flower, and white musk.', '', '../src/images/Perfumes/mon_paris.webp'),
(44, 'Perfumes', 'Yves Saint Laurent', 'Ihomme', 429.99, '', 'A fresh and woody fragrance with notes of ginger, bergamot, and vetiver.', '', '../src/images/Perfumes/lhomme.webp'),
(45, 'Perfumes', 'Dolce & Gabbana', '', 439.99, '', 'A vibrant and refreshing scent with notes of Sicilian lemon, apple, and cedar.', '', '../src/images/Perfumes/light_blue.webp'),
(46, 'Perfumes', 'Dolce & Gabbana', 'The One', 469.99, 'Evening', 'A luxurious blend of bergamot, peach, and vanilla, perfect for evening wear.', '', '../src/images/Perfumes/the_one.webp'),
(47, 'Perfumes', 'Dolce & Gabbana', 'King', 409.99, 'Daytime', 'A fresh and woody fragrance with notes of blood orange, juniper berry, and cedarwood.', '', '../src/images/Perfumes/king.webp'),
(48, 'Perfumes', 'Dolce & Gabbana', 'Queen', 599.99, 'Special Occasion', 'An exotic and rich scent with notes of oud, incense, and amber.', '', '../src/images/Perfumes/Queen.webp'),
(49, 'Gift Sets', 'L\'Occitane', 'Lavender Relaxing Gift Set', 299.99, 'Relaxation', 'A soothing gift set featuring lavender-scented products to promote relaxation and calm.', '', '../src/images/Gifts/lavender_relaxing_gift_set.webp'),
(50, 'Gift Sets', 'L\'Occitane', 'Almond Delightful Gift Set', 349.99, 'Pampering', 'A delightful set of almond-scented products for a luxurious pampering experience.', '', '../src/images/Gifts/almond_delightful_gift_set.webp'),
(51, 'Gift Sets', 'L\'Occitane', 'Shea Butter Comforting Gift Set', 379.99, 'Moisturizing', 'A comforting gift set with shea butter products to nourish and moisturize the skin.', '', '../src/images/Gifts/shea_butter_comforting_gift_set.webp'),
(52, 'Gift Sets', 'L\'Occitane', 'Verbena Refreshing Gift Set', 329.99, 'Refreshing', 'A refreshing gift set featuring verbena-scented products for an invigorating experience.', '', '../src/images/Gifts/verbena_refreshing_gift_set.webp'),
(53, 'Gift Sets', 'The Body Shop', 'Coconut Nourishing Gift Set', 219.99, 'Nourishing', 'A nourishing gift set with coconut-scented products to hydrate and soften the skin.', '', '../src/images/Gifts/coconut_nourishing_gift_set.webp'),
(54, 'Gift Sets', 'The Body Shop', 'Mango Bliss Gift Set', 239.99, 'Energizing', 'An energizing gift set featuring mango-scented products to revitalize the senses.', '', '../src/images/Gifts/mango_bliss_gift_set.webp'),
(55, 'Gift Sets', 'The Body Shop', 'Tea Tree Skin Clearing Gift Set', 259.99, 'Cleansing', 'A skin-clearing gift set with tea tree products to purify and refresh the skin.', '', '../src/images/Gifts/tea_tree_skin_clearing_gift_set.webp'),
(56, 'Gift Sets', 'The Body Shop', 'British Rose Ultimate Gift Set', 279.99, 'Floral', 'An ultimate gift set with British rose-scented products for a luxurious floral experience.', '', '../src/images/Gifts/british_rose_ultimate_gift_set.webp'),
(57, 'Gift Sets', 'Bath & Body Works', 'Japanese Cherry Blossom Gift Set', 199.99, 'Floral', 'A floral gift set with Japanese cherry blossom-scented products for a fragrant experience.', '', '../src/images/Gifts/japanese_cherry_blossom_gift_set.webp'),
(58, 'Gift Sets', 'Bath & Body Works', 'Eucalyptus Spearmint Stress Relief Gift Set', 249.99, 'Stress Relief', 'A stress relief gift set featuring eucalyptus spearmint-scented products to promote relaxation.', '', '../src/images/Gifts/eucalyptus_spearmint_stress_relief_gift_set.jpg'),
(59, 'Gift Sets', 'Bath & Body Works', 'Vanilla Bean Noel Gift Set', 229.99, 'Holiday', 'A holiday gift set with vanilla bean-scented products for a festive experience.', '', '../src/images/Gifts/vanilla_bean_noel_gift_set.jpg'),
(60, 'Gift Sets', 'Bath & Body Works', 'Aromatherapy Sleep Gift Set', 269.99, 'Sleep', 'A sleep-promoting gift set featuring lavender and vanilla-scented products.', '', '../src/images/Gifts/aromatherapy_sleep_gift_set.jpg'),
(61, 'Gift Sets', 'Crabtree & Evelyn', 'La Source Relaxing Gift Set', 299.99, 'Relaxation', 'A relaxing gift set with La Source-scented products to soothe and calm.', '', '../src/images/Gifts/la_source_relaxing_gift_set.webp'),
(62, 'Gift Sets', 'Crabtree & Evelyn', 'Gardeners Hand Therapy Gift Set', 319.99, 'Hand Care', 'A hand therapy gift set featuring gardeners-scented products to nourish and protect hands.', '', '../src/images/Gifts/gardeners_hand_therapy_gift_set.webp'),
(63, 'Gift Sets', 'Crabtree & Evelyn', 'Evelyn Rose Ultimate Luxury Gift Set', 359.99, 'Luxury', 'An ultimate luxury gift set with Evelyn Rose-scented products for a lavish experience.', '', '../src/images/Gifts/evelyn_rose_ultimate_luxury_gift_set.webp'),
(64, 'Gift Sets', 'Crabtree & Evelyn', 'Pear and Pink Magnolia Indulgent Gift Set', 339.99, 'Indulgent', 'An indulgent gift set with pear and pink magnolia-scented products for a delightful experience.', '', '../src/images/Gifts/pear_pink_magnolia_indulgent_gift_set.webp'),
(65, 'Gift Sets', 'Jo Malone', 'Peony & Blush Suede Gift Set', 499.99, 'Luxury', 'A luxurious gift set with Peony & Blush Suede-scented products for an elegant experience.', '', '../src/images/Gifts/peony_blush_suede_gift_set.webp'),
(66, 'Gift Sets', 'Jo Malone', 'Lime Basil & Mandarin Gift Set', 449.99, 'Refreshing', 'A refreshing gift set featuring Lime Basil & Mandarin-scented products for a vibrant experience.', '', '../src/images/Gifts/lime_basil_mandarin_gift_set.webp'),
(67, 'Gift Sets', 'Jo Malone', 'English Pear & Freesia Gift Set', 479.99, 'Floral', 'A floral gift set with English Pear & Freesia-scented products for a sophisticated experience.', '', '../src/images/Gifts/english_pear_freesia_gift_set.webp'),
(68, 'Gift Sets', 'Jo Malone', 'Wood Sage & Sea Salt Gift Set', 459.99, 'Beachy', 'A beachy gift set featuring Wood Sage & Sea Salt-scented products for a coastal experience.', '', '../src/images/Gifts/wood_sage_sea_salt_gift_set.webp'),
(69, 'Gift Sets', 'Jo Malone', 'Red Roses Gift Set', 499.99, 'Romantic', 'A romantic gift set with Red Roses-scented products for a passionate experience.', '', '../src/images/Gifts/red_roses_gift_set.webp'),
(70, 'Gift Sets', 'Molton Brown', 'Orange & Bergamot Gift Set', 389.99, 'Energizing', 'An energizing gift set with Orange & Bergamot-scented products for a revitalizing experience.', '', '../src/images/Gifts/orange_bergamot_gift_set.webp'),
(71, 'Gift Sets', 'Molton Brown', 'Re-charge Black Pepper Gift Set', 409.99, 'Spicy', 'A spicy gift set featuring Re-charge Black Pepper-scented products for a warm experience.', '', '../src/images/Gifts/recharge_black_pepper_gift_set.webp'),
(72, 'Gift Sets', 'Molton Brown', 'Heavenly Gingerlily Gift Set', 429.99, 'Exotic', 'An exotic gift set with Heavenly Gingerlily-scented products for a luxurious experience.', '', '../src/images/Gifts/heavenly_gingerlily_gift_set.webp'),
(73, 'Chocolates and Sweets', 'Lindt', 'Excellence Dark Chocolate Gift Set', 149.99, 'Birthday', 'A luxurious assortment of Lindt Excellence dark chocolates, perfect for chocolate lovers.', '', 'excellence_dark_chocolate_gift_set.jpg'),
(74, 'Chocolates and Sweets', 'Lindt', 'Swiss Luxury Selection', 199.99, 'Anniversary', 'A premium selection of Swiss chocolates with a variety of exquisite flavors.', '', 'swiss_luxury_selection.jpg'),
(75, 'Chocolates and Sweets', 'Lindt', 'Lindor Assorted Truffles Gift Box', 129.99, 'Celebration', 'An assorted gift box of creamy Lindor truffles, ideal for any celebration.', '', 'lindor_assorted_truffles_gift_box.jpg'),
(76, 'Chocolates and Sweets', 'Lindt', 'Master Chocolatier Collection', 179.99, 'Thank You', 'A collection of hand-crafted chocolates by Lindt Master Chocolatiers.', '', 'master_chocolatier_collection.jpg'),
(77, 'Chocolates and Sweets', 'Godiva', 'Gold Ballotin 19-Piece Gift Box', 249.99, 'Special Occasion', 'A luxurious gift box with an assortment of 19 Godiva chocolates.', '', 'gold_ballotin_19_piece_gift_box.jpg'),
(78, 'Chocolates and Sweets', 'Godiva', 'Signature Truffles Gift Box', 299.99, 'Wedding', 'A premium gift box with an assortment of Godiva signature truffles.', '', 'signature_truffles_gift_box.jpg'),
(79, 'Chocolates and Sweets', 'Godiva', 'Dark Chocolate Assortment Gift Box', 219.99, 'Evening', 'An assortment of rich and velvety Godiva dark chocolates.', '', 'dark_chocolate_assortment_gift_box.jpg'),
(80, 'Chocolates and Sweets', 'Godiva', 'Milk Chocolate Lovers Gift Box', 199.99, 'Get Well', 'A delightful gift box with an assortment of creamy Godiva milk chocolates.', '', 'milk_chocolate_lovers_gift_box.jpg'),
(81, 'Chocolates and Sweets', 'Ferrero Rocher', 'Collection Gift Box', 179.99, 'Christmas', 'A luxurious collection of Ferrero Rocher, Raffaello, and Rondnoir chocolates.', '', 'collection_gift_box.jpg'),
(82, 'Chocolates and Sweets', 'Ferrero Rocher', 'Grand Ferrero Rocher', 99.99, 'Holiday', 'A giant Ferrero Rocher with a delicious hazelnut filling, perfect for holidays.', '', 'grand_ferrero_rocher.jpg'),
(83, 'Chocolates and Sweets', 'Ferrero Rocher', 'Golden Gallery Signature', 229.99, 'Valentine\'s Day', 'A premium assortment of Ferrero Rocher chocolates in a golden gallery.', '', 'golden_gallery_signature.jpg'),
(84, 'Chocolates and Sweets', 'Ferrero Rocher', 'Moments Gift Box', 119.99, 'Mother\'s Day', 'A special gift box of Ferrero Rocher chocolates to celebrate mothers.', '', 'moments_gift_box.jpg'),
(85, 'Chocolates and Sweets', 'Ghirardelli', 'Chocolate Squares Gift Bag', 139.99, 'Birthday', 'An assortment of Ghirardelli chocolate squares in various flavors.', '', 'chocolate_squares_gift_bag.jpg'),
(86, 'Chocolates and Sweets', 'Ghirardelli', 'Intense Dark Chocolate Gift Box', 189.99, 'Anniversary', 'A premium gift box of Ghirardelli intense dark chocolates.', '', 'intense_dark_chocolate_gift_box.jpg'),
(87, 'Chocolates and Sweets', 'Ghirardelli', 'Classic Chocolate Gift Basket', 249.99, 'Thank You', 'A classic gift basket with an assortment of Ghirardelli chocolates.', '', 'classic_chocolate_gift_basket.jpg'),
(88, 'Chocolates and Sweets', 'Ghirardelli', 'Premium Chocolate Assortment', 209.99, 'Holiday', 'A premium assortment of Ghirardelli chocolates, perfect for holiday celebrations.', '', 'premium_chocolate_assortment.jpg'),
(89, 'Chocolates and Sweets', 'Thorntons', 'Classic Collection', 159.99, 'Birthday', 'A classic collection of Thorntons chocolates with a variety of flavors.', '', 'classic_collection.jpg'),
(90, 'Chocolates and Sweets', 'Thorntons', 'Continental Selection', 199.99, 'Anniversary', 'A continental selection of premium Thorntons chocolates.', '', 'continental_selection.jpg'),
(91, 'Chocolates and Sweets', 'Thorntons', 'Fudge and Caramel Collection', 139.99, 'Celebration', 'A delicious collection of Thorntons fudge and caramel chocolates.', '', 'fudge_and_caramel_collection.jpg'),
(92, 'Chocolates and Sweets', 'Thorntons', 'Dark Chocolate Gift Box', 179.99, 'Evening', 'A luxurious gift box of Thorntons dark chocolates.', '', 'dark_chocolate_gift_box.jpg'),
(93, 'Chocolates and Sweets', 'Cadbury', 'Milk Tray', 129.99, 'Valentine\'s Day', 'A classic selection of Cadbury Milk Tray chocolates.', '', 'milk_tray.jpg'),
(94, 'Chocolates and Sweets', 'Cadbury', 'Heroes Tub', 149.99, 'Christmas', 'A festive tub of Cadbury Heroes chocolates.', '', 'heroes_tub.jpg'),
(95, 'Chocolates and Sweets', 'Cadbury', 'Celebrations Box', 169.99, 'Birthday', 'A celebratory box of assorted Cadbury chocolates.', '', 'celebrations_box.jpg'),
(96, 'Chocolates and Sweets', 'Cadbury', 'Roses Tin', 139.99, 'Holiday', 'A tin of Cadbury Roses chocolates, perfect for sharing during the holidays.', '', 'roses_tin.jpg'),
(97, 'Art Pieces', 'Saatchi Art', 'Abstract Landscape', 1999.99, 'Home Decor', 'A stunning abstract landscape painting, perfect for modern home decor.', '', 'abstract_landscape.jpg'),
(98, 'Art Pieces', 'Saatchi Art', 'Modern Portrait', 1499.99, 'Office Decor', 'A contemporary portrait that adds a touch of sophistication to any office space.', '', 'modern_portrait.jpg'),
(99, 'Art Pieces', 'Saatchi Art', 'Urban Scene', 1799.99, 'Living Room', 'An urban scene painting that captures the vibrant energy of city life.', '', 'urban_scene.jpg'),
(100, 'Art Pieces', 'Saatchi Art', 'Nature\'s Beauty', 1299.99, 'Bedroom Decor', 'A beautiful painting of nature that brings serenity to any bedroom.', '', 'natures_beauty.jpg'),
(101, 'Art Pieces', 'Etsy', 'Minimalist Art Print', 299.99, 'Office Decor', 'A minimalist art print that adds a clean and modern touch to office spaces.', '', 'minimalist_art_print.jpg'),
(102, 'Art Pieces', 'Etsy', 'Botanical Illustration', 349.99, 'Living Room', 'A detailed botanical illustration perfect for adding a touch of nature to your living room.', '', 'botanical_illustration.jpg'),
(103, 'Art Pieces', 'Etsy', 'Geometric Art', 399.99, 'Home Decor', 'A striking geometric art piece that enhances modern home decor.', '', 'geometric_art.jpg'),
(104, 'Art Pieces', 'Etsy', 'Vintage Poster', 249.99, 'Bedroom Decor', 'A vintage poster that brings a nostalgic feel to any bedroom.', '', 'vintage_poster.jpg'),
(105, 'Art Pieces', 'Redbubble', 'Surreal Art Print', 599.99, 'Home Decor', 'A captivating surreal art print that adds a unique touch to home decor.', '', 'surreal_art_print.jpg'),
(106, 'Art Pieces', 'Redbubble', 'Fantasy Landscape', 699.99, 'Office Decor', 'A fantasy landscape painting perfect for creating an imaginative office environment.', '', 'fantasy_landscape.jpg'),
(107, 'Art Pieces', 'Redbubble', 'Pop Art Canvas', 799.99, 'Living Room', 'A vibrant pop art canvas that energizes any living room.', '', 'pop_art_canvas.jpg'),
(108, 'Art Pieces', 'Redbubble', 'Animal Portrait', 499.99, 'Bedroom Decor', 'An adorable animal portrait that brings warmth to any bedroom.', '', 'animal_portrait.jpg'),
(109, 'Art Pieces', 'Society6', 'Abstract Expressionism', 899.99, 'Home Decor', 'A bold abstract expressionism piece that adds drama to home decor.', '', 'abstract_expressionism.jpg'),
(110, 'Art Pieces', 'Society6', 'Watercolor Painting', 749.99, 'Living Room', 'A delicate watercolor painting perfect for enhancing the living room atmosphere.', '', 'watercolor_painting.jpg'),
(111, 'Art Pieces', 'Society6', 'Contemporary Art', 1099.99, 'Office Decor', 'A contemporary art piece that adds a modern and sophisticated touch to office spaces.', '', 'contemporary_art.jpg'),
(112, 'Art Pieces', 'Society6', 'Floral Art', 649.99, 'Bedroom Decor', 'A beautiful floral art piece that brings elegance to any bedroom.', '', 'floral_art.jpg'),
(113, 'Art Pieces', 'Minted', 'Modern Abstract', 1299.99, 'Home Decor', 'A striking modern abstract painting that complements contemporary home decor.', '', 'modern_abstract.jpg'),
(114, 'Art Pieces', 'Minted', 'Scenic Landscape', 1199.99, 'Living Room', 'A serene scenic landscape painting perfect for creating a tranquil living room.', '', 'scenic_landscape.jpg'),
(115, 'Art Pieces', 'Minted', 'Portrait Art', 1399.99, 'Office Decor', 'A sophisticated portrait art piece that adds character to any office space.', '', 'portrait_art.jpg'),
(116, 'Art Pieces', 'Minted', 'Black and White Photography', 999.99, 'Bedroom Decor', 'A stunning black and white photography piece that adds a classic touch to bedrooms.', '', 'black_and_white_photography.jpg'),
(117, 'Art Pieces', 'Art.com', 'Classic Painting', 1899.99, 'Home Decor', 'A classic painting that brings timeless elegance to home decor.', '', 'classic_painting.jpg'),
(118, 'Art Pieces', 'Art.com', 'Modern Sculpture', 1599.99, 'Office Decor', 'A modern sculpture that adds a unique and artistic element to office spaces.', '', 'modern_sculpture.jpg'),
(119, 'Art Pieces', 'Art.com', 'Impressionist Landscape', 1799.99, 'Living Room', 'An impressionist landscape painting that enhances the beauty of any living room.', '', 'impressionist_landscape.jpg'),
(120, 'Art Pieces', 'Art.com', 'Abstract Photography', 1399.99, 'Bedroom Decor', 'An abstract photography piece that adds a contemporary feel to any bedroom.', '', 'abstract_photography.jpg'),
(121, 'Watches', 'Rolex', 'Submariner', 39999.99, 'Luxury', 'An iconic luxury dive watch with a robust design and exceptional performance.', '', 'rolex_submariner.jpg'),
(122, 'Watches', 'Rolex', 'Daytona', 45999.99, 'Luxury', 'A legendary chronograph watch designed for high-performance and sophisticated style.', '', 'rolex_daytona.jpg'),
(123, 'Watches', 'Rolex', 'Datejust', 34999.99, 'Formal', 'A classic and elegant watch perfect for formal occasions and everyday wear.', '', 'rolex_datejust.jpg'),
(124, 'Watches', 'Rolex', 'Oyster Perpetual', 29999.99, 'Casual', 'A timeless watch with a simple design, ideal for casual and formal occasions.', '', 'rolex_oyster_perpetual.jpg'),
(125, 'Watches', 'Omega', 'Speedmaster', 29999.99, 'Sports', 'A legendary sports watch known for its precision and history with space exploration.', '', 'omega_speedmaster.jpg'),
(126, 'Watches', 'Omega', 'Seamaster', 24999.99, 'Dive', 'A durable and stylish dive watch designed for underwater adventures.', '', 'omega_seamaster.jpg'),
(127, 'Watches', 'Omega', 'Constellation', 21999.99, 'Formal', 'A refined watch with a unique design, perfect for formal events.', '', 'omega_constellation.jpg'),
(128, 'Watches', 'Omega', 'De Ville', 19999.99, 'Elegant', 'An elegant watch with a classic design, ideal for both casual and formal wear.', '', 'omega_de_ville.jpg'),
(129, 'Watches', 'Tag Heuer', 'Carrera', 17999.99, 'Sports', 'A stylish sports watch with a chronograph function, perfect for active lifestyles.', '', 'tag_heuer_carrera.jpg'),
(130, 'Watches', 'Tag Heuer', 'Aquaracer', 15999.99, 'Dive', 'A robust and reliable dive watch designed for underwater performance.', '', 'tag_heuer_aquaracer.jpg'),
(131, 'Watches', 'Tag Heuer', 'Monaco', 19999.99, 'Luxury', 'A distinctive square-shaped watch with a bold design, perfect for luxury wear.', '', 'tag_heuer_monaco.jpg'),
(132, 'Watches', 'Tag Heuer', 'Formula 1', 13999.99, 'Sports', 'A high-performance sports watch inspired by the world of motorsports.', '', 'tag_heuer_formula_1.jpg'),
(133, 'Watches', 'Seiko', 'Prospex', 9999.99, 'Dive', 'A professional dive watch with exceptional durability and performance.', '', 'seiko_prospex.jpg'),
(134, 'Watches', 'Seiko', 'Presage', 8999.99, 'Formal', 'A sophisticated watch with a classic design, perfect for formal occasions.', '', 'seiko_presage.jpg'),
(135, 'Watches', 'Seiko', 'Astron', 12999.99, 'Travel', 'A GPS solar watch designed for the modern traveler, offering precise timekeeping.', '', 'seiko_astron.jpg'),
(136, 'Watches', 'Seiko', '5 Sports', 4999.99, 'Casual', 'A reliable and affordable sports watch, perfect for everyday wear.', '', 'seiko_5_sports.jpg'),
(137, 'Watches', 'Tissot', 'Le Locle', 7999.99, 'Formal', 'A classic and elegant watch named after Tissot’s home in the Swiss Jura Mountains.', '', 'tissot_le_locle.jpg'),
(138, 'Watches', 'Tissot', 'PR 100', 6999.99, 'Casual', 'A versatile and stylish watch suitable for both casual and formal occasions.', '', 'tissot_pr_100.jpg'),
(139, 'Watches', 'Tissot', 'Seastar 1000', 10999.99, 'Dive', 'A robust dive watch designed for underwater exploration and adventure.', '', 'tissot_seastar_1000.jpg'),
(140, 'Watches', 'Tissot', 'Heritage Visodate', 8999.99, 'Vintage', 'A vintage-inspired watch with a modern twist, perfect for formal wear.', '', 'tissot_heritage_visodate.jpg'),
(141, 'Watches', 'Citizen', 'Promaster', 8999.99, 'Sports', 'A durable sports watch designed for extreme conditions and adventures.', '', 'citizen_promaster.jpg'),
(142, 'Watches', 'Citizen', 'Eco-Drive', 7999.99, 'Casual', 'An eco-friendly watch powered by light, suitable for everyday wear.', '', 'citizen_eco_drive.jpg'),
(143, 'Watches', 'Citizen', 'Chronomaster', 11999.99, 'Luxury', 'A high-precision luxury watch with a sophisticated design.', '', 'citizen_chronomaster.jpg'),
(144, 'Watches', 'Citizen', 'Satellite Wave', 12999.99, 'Travel', 'A technologically advanced watch with satellite timekeeping and a sleek design.', '', 'citizen_satellite_wave.jpg'),
(145, 'Watches', 'Rolex', 'Submariner', 39999.99, 'Luxury', 'An iconic luxury dive watch with a robust design and exceptional performance.', '', 'rolex_submariner.jpg'),
(146, 'Watches', 'Rolex', 'Daytona', 45999.99, 'Luxury', 'A legendary chronograph watch designed for high-performance and sophisticated style.', '', 'rolex_daytona.jpg'),
(147, 'Watches', 'Rolex', 'Datejust', 34999.99, 'Formal', 'A classic and elegant watch perfect for formal occasions and everyday wear.', '', 'rolex_datejust.jpg'),
(148, 'Watches', 'Rolex', 'Oyster Perpetual', 29999.99, 'Casual', 'A timeless watch with a simple design, ideal for casual and formal occasions.', '', 'rolex_oyster_perpetual.jpg'),
(149, 'Watches', 'Omega', 'Speedmaster', 29999.99, 'Sports', 'A legendary sports watch known for its precision and history with space exploration.', '', 'omega_speedmaster.jpg'),
(150, 'Watches', 'Omega', 'Seamaster', 24999.99, 'Dive', 'A durable and stylish dive watch designed for underwater adventures.', '', 'omega_seamaster.jpg'),
(151, 'Watches', 'Omega', 'Constellation', 21999.99, 'Formal', 'A refined watch with a unique design, perfect for formal events.', '', 'omega_constellation.jpg'),
(152, 'Watches', 'Omega', 'De Ville', 19999.99, 'Elegant', 'An elegant watch with a classic design, ideal for both casual and formal wear.', '', 'omega_de_ville.jpg'),
(153, 'Watches', 'Tag Heuer', 'Carrera', 17999.99, 'Sports', 'A stylish sports watch with a chronograph function, perfect for active lifestyles.', '', 'tag_heuer_carrera.jpg'),
(154, 'Watches', 'Tag Heuer', 'Aquaracer', 15999.99, 'Dive', 'A robust and reliable dive watch designed for underwater performance.', '', 'tag_heuer_aquaracer.jpg'),
(155, 'Watches', 'Tag Heuer', 'Monaco', 19999.99, 'Luxury', 'A distinctive square-shaped watch with a bold design, perfect for luxury wear.', '', 'tag_heuer_monaco.jpg'),
(156, 'Watches', 'Tag Heuer', 'Formula 1', 13999.99, 'Sports', 'A high-performance sports watch inspired by the world of motorsports.', '', 'tag_heuer_formula_1.jpg'),
(157, 'Watches', 'Seiko', 'Prospex', 9999.99, 'Dive', 'A professional dive watch with exceptional durability and performance.', '', 'seiko_prospex.jpg'),
(158, 'Watches', 'Seiko', 'Presage', 8999.99, 'Formal', 'A sophisticated watch with a classic design, perfect for formal occasions.', '', 'seiko_presage.jpg'),
(159, 'Watches', 'Seiko', 'Astron', 12999.99, 'Travel', 'A GPS solar watch designed for the modern traveler, offering precise timekeeping.', '', 'seiko_astron.jpg'),
(160, 'Watches', 'Seiko', '5 Sports', 4999.99, 'Casual', 'A reliable and affordable sports watch, perfect for everyday wear.', '', 'seiko_5_sports.jpg'),
(161, 'Watches', 'Tissot', 'Le Locle', 7999.99, 'Formal', 'A classic and elegant watch named after Tissot’s home in the Swiss Jura Mountains.', '', 'tissot_le_locle.jpg'),
(162, 'Watches', 'Tissot', 'PR 100', 6999.99, 'Casual', 'A versatile and stylish watch suitable for both casual and formal occasions.', '', 'tissot_pr_100.jpg'),
(163, 'Watches', 'Tissot', 'Seastar 1000', 10999.99, 'Dive', 'A robust dive watch designed for underwater exploration and adventure.', '', 'tissot_seastar_1000.jpg'),
(164, 'Watches', 'Tissot', 'Heritage Visodate', 8999.99, 'Vintage', 'A vintage-inspired watch with a modern twist, perfect for formal wear.', '', 'tissot_heritage_visodate.jpg'),
(165, 'Watches', 'Citizen', 'Promaster', 8999.99, 'Sports', 'A durable sports watch designed for extreme conditions and adventures.', '', 'citizen_promaster.jpg'),
(166, 'Watches', 'Citizen', 'Eco-Drive', 7999.99, 'Casual', 'An eco-friendly watch powered by light, suitable for everyday wear.', '', 'citizen_eco_drive.jpg'),
(167, 'Watches', 'Citizen', 'Chronomaster', 11999.99, 'Luxury', 'A high-precision luxury watch with a sophisticated design.', '', 'citizen_chronomaster.jpg'),
(168, 'Watches', 'Citizen', 'Satellite Wave', 12999.99, 'Travel', 'A technologically advanced watch with satellite timekeeping and a sleek design.', '', 'citizen_satellite_wave.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_promotion`
--

CREATE TABLE `inventory_promotion` (
  `inventory_id` int(11) NOT NULL,
  `promotion_type` varchar(255) DEFAULT NULL,
  `is_new_arrival` tinyint(1) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_promotion`
--

INSERT INTO `inventory_promotion` (`inventory_id`, `promotion_type`, `is_new_arrival`, `is_featured`) VALUES
(1, 'Sales', 1, 1),
(2, '', 0, 0),
(3, 'Sales', 1, 1),
(4, 'Sales', 1, 1),
(6, '', 1, 0),
(7, 'Sales', 1, 1),
(36, 'Sales', 0, 1),
(43, 'Sales', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(2, 11, 'Your order #ORD17236432139324 has been updated to shipped.', 0, '2024-08-15 06:33:45'),
(3, 11, 'Your order #ORD17237175544360 has been updated to approved.', 0, '2024-08-15 10:26:25'),
(4, 1, 'Your order #66b1d305b7628 has been updated to delivered.', 0, '2024-08-15 11:35:14'),
(5, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-15 11:37:04'),
(6, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-15 11:53:21'),
(7, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-15 11:53:55'),
(8, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-19 08:50:40'),
(9, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-19 08:53:25'),
(10, 1, 'Your order #66b1d305b7628 has been updated to approved.', 0, '2024-08-19 08:53:27'),
(11, 12, 'Your order #ORD17237069619687 has been updated to placed.', 0, '2024-08-19 11:06:15'),
(12, 1, 'Your order #66b1d305b7628 has been updated to delivered.', 0, '2024-08-21 05:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('placed','approved','canceled','shipped','delivered') DEFAULT 'placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `order_date`, `total_amount`, `status`) VALUES
(1, 1, '66b1d305b7628', '2024-08-06 07:38:45', 829.97, 'delivered'),
(2, 4, '66b1dc6e1ec16', '2024-08-06 08:18:54', 35149.98, 'canceled'),
(3, 4, 'ORD17229325301014', '2024-08-06 08:22:10', 3999.92, 'canceled'),
(4, 4, 'ORD17229326182844', '2024-08-06 08:23:38', 749950.00, 'shipped'),
(5, 6, 'ORD17231036574139', '2024-08-08 07:54:17', 449.97, 'approved'),
(6, 6, 'ORD17231117118591', '2024-08-08 10:08:31', 1399.96, 'placed'),
(7, 1, 'ORD17232629722610', '2024-08-10 04:09:32', 3569.89, 'approved'),
(8, 6, 'ORD17232872288070', '2024-08-10 10:53:48', 549.99, 'placed'),
(9, 6, 'ORD17232875415777', '2024-08-10 10:59:01', 349.99, 'placed'),
(10, 6, 'ORD17232879898099', '2024-08-10 11:06:29', 679.98, 'placed'),
(11, 6, 'ORD17232880693852', '2024-08-10 11:07:49', 0.00, 'placed'),
(12, 6, 'ORD17232880855439', '2024-08-10 11:08:05', 1049.97, 'approved'),
(13, 11, 'ORD17234498069761', '2024-08-12 08:03:26', 259.98, 'placed'),
(14, 11, 'ORD17235502383947', '2024-08-13 11:57:18', 359.99, 'placed'),
(15, 11, 'ORD17236432139324', '2024-08-14 13:46:53', 1259.95, 'shipped'),
(16, 12, 'ORD17237038435022', '2024-08-15 06:37:23', 109.99, 'placed'),
(17, 12, 'ORD17237052658678', '2024-08-15 07:01:05', 4619.80, 'placed'),
(18, 12, 'ORD17237062524978', '2024-08-15 07:17:32', 129.99, 'placed'),
(19, 12, 'ORD17237064029178', '2024-08-15 07:20:02', 149.99, 'placed'),
(20, 12, 'ORD17237069105210', '2024-08-15 07:28:30', 149.99, 'placed'),
(21, 12, 'ORD17237069619687', '2024-08-15 07:29:21', 179.99, 'placed'),
(22, 12, 'ORD17237085148909', '2024-08-15 07:55:14', 479.99, 'approved'),
(23, 11, 'ORD17237173945492', '2024-08-15 10:23:14', 3579.92, 'placed'),
(24, 11, 'ORD17237175544360', '2024-08-15 10:25:54', 1579.96, 'approved'),
(25, 16, 'ORD17241335837099', '2024-08-20 05:59:43', 1459.91, 'placed'),
(26, 16, 'ORD17241389197560', '2024-08-20 07:28:39', 869.97, 'placed'),
(27, 11, 'ORD17241498337577', '2024-08-20 10:30:33', 1439.97, 'placed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_price_current` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_number`, `item_id`, `item_qty`, `item_price_current`) VALUES
(1, '66b1d305b7628', 1, 1, 149.99),
(2, '66b1d305b7628', 25, 1, 499.99),
(3, '66b1d305b7628', 81, 1, 179.99),
(4, '66b1dc6e1ec16', 1, 1, 149.99),
(5, '66b1dc6e1ec16', 123, 1, 34999.99),
(6, 'ORD17229325301014', 108, 8, 499.99),
(7, 'ORD17229326182844', 1, 5000, 149.99),
(8, 'ORD17231036574139', 1, 3, 149.99),
(9, 'ORD17231117118591', 50, 4, 349.99),
(10, 'ORD17232629722610', 2, 1, 99.99),
(11, 'ORD17232629722610', 3, 1, 129.99),
(12, 'ORD17232629722610', 51, 3, 379.99),
(13, 'ORD17232629722610', 52, 2, 329.99),
(14, 'ORD17232629722610', 25, 2, 499.99),
(15, 'ORD17232629722610', 31, 1, 429.99),
(16, 'ORD17232629722610', 18, 1, 109.99),
(17, 'ORD17232872288070', 27, 1, 549.99),
(18, 'ORD17232875415777', 26, 1, 349.99),
(19, 'ORD17232879898099', 35, 2, 339.99),
(20, 'ORD17232880855439', 26, 3, 349.99),
(21, 'ORD17234498069761', 3, 1, 129.99),
(22, 'ORD17234498069761', 16, 1, 129.99),
(23, 'ORD17235502383947', 32, 1, 359.99),
(24, 'ORD17236432139324', 55, 1, 259.99),
(25, 'ORD17236432139324', 58, 4, 249.99),
(26, 'ORD17237038435022', 9, 1, 109.99),
(27, 'ORD17237052658678', 32, 3, 359.99),
(28, 'ORD17237052658678', 53, 10, 219.99),
(29, 'ORD17237052658678', 60, 2, 269.99),
(30, 'ORD17237052658678', 11, 5, 159.99),
(31, 'ORD17237062524978', 3, 1, 129.99),
(32, 'ORD17237064029178', 1, 1, 149.99),
(33, 'ORD17237069105210', 1, 1, 149.99),
(34, 'ORD17237069619687', 4, 1, 179.99),
(35, 'ORD17237085148909', 29, 1, 479.99),
(36, 'ORD17237173945492', 25, 5, 499.99),
(37, 'ORD17237173945492', 32, 3, 359.99),
(38, 'ORD17237175544360', 4, 1, 179.99),
(39, 'ORD17237175544360', 26, 1, 349.99),
(40, 'ORD17237175544360', 25, 1, 499.99),
(41, 'ORD17237175544360', 27, 1, 549.99),
(42, 'ORD17241335837099', 63, 2, 359.99),
(43, 'ORD17241335837099', 10, 2, 89.99),
(44, 'ORD17241335837099', 3, 2, 129.99),
(45, 'ORD17241335837099', 7, 3, 99.99),
(46, 'ORD17241389197560', 63, 2, 359.99),
(47, 'ORD17241389197560', 1, 1, 149.99),
(48, 'ORD17241498337577', 36, 1, 459.99),
(49, 'ORD17241498337577', 41, 1, 479.99),
(50, 'ORD17241498337577', 43, 1, 499.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','manager','super_manager') NOT NULL DEFAULT 'user',
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_loggedin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `verification_code`, `is_verified`, `is_loggedin`, `created_at`) VALUES
(1, 'Abdulrahman', '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'manager', '31637024', 1, 0, '2024-08-06 06:54:06'),
(4, 'Dettore', 'DFatui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '17365029', 1, 0, '2024-08-06 08:05:13'),
(5, 'Scaramouche', 'SFatui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'manager', '20491556', 1, 1, '2024-08-08 05:46:08'),
(6, 'Tartaglia', 'TFatui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '37232096', 1, 0, '2024-08-08 05:46:34'),
(7, 'L Capitano', 'CFatui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'super_manager', '70458742', 1, 0, '2024-08-08 07:49:51'),
(8, 'Pantalone ', 'PFatui@gmail.com', '$2y$10$tgd8iO2WnS6sGSDJeN6apuE7fgFV4TeFFgc/s3xBI20sCQ3f3aL/u', 'user', '47407297', 0, 0, '2024-08-12 07:00:52'),
(11, 'Navistalous', 'NFatui@gmail.com', '$2y$10$TUPlOA6AL8sapn.Sjbh7P.6g2QHCewWZalSulkIl/2AXQMVSv4gnW', 'super_manager', '78424645', 1, 1, '2024-08-12 08:01:49'),
(12, 'Devastation Azeroth  ', 'Azeroth@gmail.com', '$2y$10$sHN.EI3tvXoUqH7X5axIbubnTvIFmVc0h1D2UiHktU04lPvu7whRG', 'user', '78890409', 1, 0, '2024-08-12 08:53:38'),
(13, 'Abdulrahman', 'A@gmail.com', '$2y$10$JHLo4jwMZHUEgbwdiIDpj.srKDBO.ZaQsS0zGCnxOIGmyMN1mneW6', 'user', '98410583', 1, 0, '2024-08-14 10:42:12'),
(15, 'Abdulrahman', 'AD@gmail.com', '$2y$10$9eKrsdGqe.d0GviwlLprouWeI3yC1igMfVZv42IQYVX5aOw29nvwK', 'admin', '63975054', 1, 0, '2024-08-14 10:48:04'),
(16, 'Sandronne Luminous', 'SnFatui@gmail.com', '$2y$10$fjPRW74rTWCkU/mEutM3KOeDUKgWnvmlu1cZhPpuOZ0ThV8Pq1QIi', 'user', '28283462', 1, 0, '2024-08-20 05:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_promotion`
--
ALTER TABLE `inventory_promotion`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_promotion`
--
ALTER TABLE `inventory_promotion`
  ADD CONSTRAINT `inventory_promotion_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
