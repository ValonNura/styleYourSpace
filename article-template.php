<?php
$articles = [
    1 => [
        "title" => "Top 5 Modern Living Room Trends You Can't Miss",
        "content" => "Dive into the most exciting and innovative styles revolutionizing modern living spaces today.",
        "image" => "img/artikull2.png",
        "full_content" => "
            <h2>1. Embracing Minimalist Elegance</h2>
            <p>Minimalism is all about creating a serene environment with clean lines, neutral palettes, and functional furniture. Discover how to achieve a chic, clutter-free living room that exudes sophistication.</p>

            <h2>2. Integrating Smart Home Technology</h2>
            <p>Transform your living room into a futuristic haven with smart lighting, automated climate control, and AI-powered gadgets that blend seamlessly into your decor.</p>

            <h2>3. Bringing Nature Indoors</h2>
            <p>Incorporate natural materials like reclaimed wood, stone, and lush greenery to create a tranquil, earthy ambiance right in your living room.</p>

            <h2>4. Versatile Multi-Functional Furniture</h2>
            <p>Maximize space and functionality with stylish furniture that doubles as storage or transforms to suit different needs, perfect for modern urban living.</p>

            <h2>5. Bold and Beautiful Color Schemes</h2>
            <p>While neutral tones dominate, bold accents in emerald green, deep navy, and mustard yellow are making waves, adding personality and flair to your living room.</p>
        "
    ],
    2 => [
        "title" => "Create a Relaxing Bedroom Oasis with Our Products",
        "content" => "Discover how our premium products can transform your bedroom into a serene and stylish retreat.",
        "image" => "img/artikull3.png",
        "full_content" => "
            <h2>1. Luxurious Sheets and Pillows</h2>
            <p>Comfort begins with the right textiles. Choose our high-quality, natural fiber sheets and pillows for unmatched softness and breathability.</p>

            <h2>2. Soothing Colors and Elegant Design</h2>
            <p>Create a calming atmosphere with a palette of neutral or pastel tones, complemented by modern design elements that bring a touch of sophistication.</p>

            <h2>3. Decorative Touches for a Cozy Feel</h2>
            <p>Enhance your space with decorative pillows, soft throws, and plush rugs that add warmth and luxury to your bedroom retreat.</p>
        "
    ],
    3 => [
        "title" => "5 Ingenious Ways to Maximize Storage in Small Apartments",
        "content" => "Unlock the full potential of your small apartment with these clever and stylish storage solutions.",
        "image" => "img/artikull4.png",
        "full_content" => "
            <h2>1. Make the Most of Vertical Space</h2>
            <p>Think upwards! Install floating shelves, wall-mounted organizers, and tall cabinets to free up floor space and keep your home tidy.</p>

            <h2>2. Invest in Multi-Purpose Furniture</h2>
            <p>Opt for furniture pieces like ottomans with hidden compartments, storage benches, and coffee tables with drawers to combine style and functionality.</p>

            <h2>3. Clear Containers and Smart Labeling</h2>
            <p>Use transparent containers to easily locate items and add labels for a well-organized, clutter-free environment.</p>

            <h2>4. Utilize Under-Bed Storage</h2>
            <p>Don't overlook the space beneath your bed. Store seasonal items, shoes, or linens in sleek, under-bed storage boxes.</p>

            <h2>5. Regularly Declutter and Simplify</h2>
            <p>Keep your space fresh and organized by regularly sorting through your belongings, donating or discarding items you no longer need.</p>
        "
    ]
];

$article_id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

if (!isset($articles[$article_id])) {
    die("Article not found!");
}

$article = $articles[$article_id];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article["title"]; ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($article['content']); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($article['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($article['content']); ?>">
    <meta property="og:image" content="<?php echo $article['image']; ?>">
    <link rel="stylesheet" href="css/article.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #4e4e4e;
            margin: 0;
            padding: 0;
        }

        .article-page {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            background-color: #fafafa;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            overflow: hidden;
        }

        .container img {
            width: 100%;
            height: auto;
            object-fit: cover;
            background-color: #e0e0e0;
        }

        .content {
            padding: 40px;
            background-color: #f0f0f0;
        }

        .content h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #5d5d5d;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #6e6e6e;
        }

        .full-content {
            font-size: 16px;
            line-height: 1.8;
            color: #707070;
        }

        .full-content h2 {
            color: #7a7a7a;
            margin-top: 20px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #a89f91;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
            margin-top: 20px;
        }

        .back-btn:hover {
            background: #90887b;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <section class="article-page">
        <div class="container">
            <img src="<?php echo $article["image"]; ?>" alt="<?php echo $article["title"]; ?>">
            <div class="content">
                <h1><?php echo $article["title"]; ?></h1>
                <p><?php echo $article["content"]; ?></p>
                <div class="full-content">
                    <?php echo $article["full_content"]; ?>
                </div>
                <a href="blog.php" class="back-btn">Back to Blog</a>
            </div>
        </div>
    </section>
</body>

</html>
