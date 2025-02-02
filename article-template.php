<?php
$articles = [
    1 => [
        "title" => "Top 5 Modern Living Room Trends",
        "content" => "Explore the latest styles and ideas for transforming your living space.",
        "image" => "img/living/artikulli1.jpg",
        "full_content" => "
            <h2>1. Minimalist Design</h2>
            <p>Minimalist style is gaining popularity, with clean lines and neutral colors dominating modern living rooms.</p>

            <h2>2. Smart Technology</h2>
            <p>From smart lighting to AI-powered assistants, technology is making its way into interior design.</p>

            <h2>3. Natural Elements</h2>
            <p>Using wood, stone, and plants helps bring a natural touch to your living space.</p>

            <h2>4. Multi-Functional Furniture</h2>
            <p>Furniture that serves multiple purposes is essential in smaller living spaces.</p>

            <h2>5. Bold Colors</h2>
            <p>While neutral tones are still popular, bold accent colors like emerald green and navy blue are trending.</p>
        "
    ],
    2 => [
        "title" => "Krijoni një Dhoma Gjumi Relaksuese me Produktet Tona",
        "content" => "Zbuloni si produktet tona cilësore mund të transformojnë dhomën tuaj të gjumit në një oaz qetësie.",
        "image" => "img/living/artikulli2.jpg",
        "full_content" => "
            <h2>1. Çarçafë dhe Jastëkë të Cilësisë së Lartë</h2>
            <p>Rehatia fillon me tekstilet. Zgjidhni çarçafët dhe jastëkët tanë prej fibrash natyrale që ofrojnë butësi dhe ajrosje optimale.</p>

            <h2>2. Ngjyra Qetësuese dhe Dizajn Elegant</h2>
            <p>Paleta e nuancave neutrale ose pastel sjell qetësi, ndërsa detajet moderne në dizajn krijojnë një atmosferë plot stil.</p>

            <h2>3. Shtesa Dekorative</h2>
            <p>Kombinoni jastëkë dekorues, batanije të buta ose tapete relaksuese për një prekje luksi dhe ngrohtësie.</p>
        "
    ],
    3 => [
        "title" => "5 Ways to Maximize Storage in Small Apartments",
        "content" => "Optimize your space with these creative storage solutions.",
        "image" => "img/living/artikulli3.jpg",
        "full_content" => "
            <h2>1. Utilize Vertical Space</h2>
            <p>Install shelves or hanging organizers on walls to save precious floor space.</p>

            <h2>2. Multi-Purpose Furniture</h2>
            <p>Look for ottomans, benches, dhe tavolina që kanë hapësira të fshehta magazinimi.</p>

            <h2>3. Clear Containers & Labels</h2>
            <p>Ruani gjërat tuaja në kontenierë transparentë dhe përdorni etiketa për organizim më të mirë.</p>

            <h2>4. Under-Bed Storage</h2>
            <p>Shfrytëzoni hapësirën nën shtrat për të vendosur kuti, valixhe ose sende të tjera të rralla.</p>

            <h2>5. Declutter Regularly</h2>
            <p>Hidhni ose dhuroni artikujt e panevojshëm për të shmangur mbingarkimin dhe ruajtur një ambient të rregullt.</p>
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
</head>

<body>
    <section class="article-page">
        <div class="container">
            <h1><?php echo $article["title"]; ?></h1>
            <img src="<?php echo $article["image"]; ?>" alt="<?php echo $article["title"]; ?>">
            <p><?php echo $article["content"]; ?></p>
            <div class="full-content">
                <?php echo $article["full_content"]; ?>
            </div>
            <a href="blog.php" class="back-btn">Back to Blog</a>
        </div>
    </section>


</body>

</html>

</html>