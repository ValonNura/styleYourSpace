<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style Your Space | Products</title>
    <link rel="stylesheet" href="css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  
     <section class="header">
        <nav> 
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php" >About us</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="contactus.php">Contact us</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="SignIn.php">Sign in</a></li>

                </ul>
            </div>
        </nav>
   
    
        <h1 class="products-title">Products</h1>
        </section>
       <div class="container">
         <div class="filter-container">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="bestseller">Best Sellers</button>
                <button class="filter-btn" data-filter="sale">On Sale</button>
            </div>
            
           
            <div class="sort-options">
                <select id="sort-select">
                    <option value="">Sort by</option>
                    <option value="name-asc">Name (A-Z)</option>
                    <option value="name-desc">Name (Z-A)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to low)</option>
                </select>
        
                <select id="categorySelect" onchange="filterByCategory(this.value)">
                    <option value="all">All Categories</option>
                    <option value="lighting">Lighting</option>
                    <option value="beds">Beds</option>
                    <option value="sofas">Sofas</option>
                    <option value="dressers">Dressers</option>
                    <option value="chairs">Chairs</option>
                    <option value="decor">Decor</option>
                </select>
            </div>
        </div>
        <main>
    
        
        <section class="category" id="lighting">
            <h3>Lighting</h3>
            
            <div class="products">

              
                <div class="product" data-category="lighting">
                    <div class="image-container">
                        <img class="default" src="./img/products/black_lamp.png" alt="Black Table Lamp">
                        <img class="hover" src="./img/products/black_lamp_hover.png" alt="Black Table Lamp Hover">
                    </div>
                    <h4>Black Table Lamp</h4>
                    <p class="dimensions">15" H x 8" W x 8" D</p>
                    <p class="price">$345</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>
                
                <div class="product" data-category="lighting">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/mushroom_lamp.png" alt="Mushroom Table Lamp">
                        <img class="hover" src="./img/products/mushroom_lamp_hover.png" alt="Mushroom Table Lamp Hover">
                    </div>
                    <h4>Mushroom Table Lamp</h4>
                    <p class="dimensions">15" H x 8" W x 8" D</p>
                    <p class="price">$98</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>

                 
                 <div class="product" data-category="lighting">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/marble_tablelamp.png" alt="Marble Table  Lamp">
                        <img class="hover" src="./img/products/marble_tablelamp_hover.png" alt="Marble Table  Lamp Hover">
                    </div>
                    <h4>Marble Table  Lamp</h4>
                    <p class="dimensions">15" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$569</span> $466</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

               
                <div class="product" data-category="lighting">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/black_chandelier.png" alt="Black Chandelier">
                        <img class="hover" src="./img/products/black_chandelier_hover.png" alt="Black Chandelier Hover">
                    </div>
                    <h4>Black Chandelier</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$230</span> $199</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

               
                <div class="product" data-category="lighting">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/gold_chandelier.png" alt="Gold Chandelier">
                        <img class="hover" src="./img/products/gold_chandelier_hover.png" alt="Gold Chandelier Hover">
                    </div>
                    <h4>Gold Chandelier</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$590</span> $456</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>
                
                
                <div class="product" data-category="lighting">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/palm_floorlamp.png" alt="Palm Floor Lamp">
                        <img class="hover" src="./img/products/palm_floorlamp_hover.png" alt="Palm Floor Lamp Hover">
                    </div>
                    <h4>Palm Floor Lamp</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$459</span> $377</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

            </div>
        </section>
    </br>
       
        <section class="category" id="beds" data-category="beds">
            <h3>Beds</h3>
            <div class="products">

              
                <div class="product" data-category="beds">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/wooden_bed.png" alt="Wooden Bed">
                        <img class="hover" src="./img/products/wooden_bed_hover.png" alt="Wooden Bed Hover">
                    </div>
                    <h4>Wooden Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$4570</span> $3700</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
               
                <div class="product" data-category="beds">
                    <div class="image-container">
                        <img class="default" src="./img/products/royalblue_bed.png" alt="Royal Blue Bed">
                        <img class="hover" src="./img/products/royalblue_bed_hover.png" alt="Royal Blue Bed Hover">
                    </div>
                    <h4>Royal Blue Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$3075</span> $2400</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>
              
                <div class="product" data-category="beds">
                    <div class="image-container">
                        <img class="default" src="./img/products/panora_bed.png" alt="Panora Bed">
                        <img class="hover" src="./img/products/panora_bed_hover.png" alt="Panora Bed Hover">
                    </div>
                    <h4>Panora Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$5690</span> $5078</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

               
                 <div class="product" data-category="beds">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/upholstered_bed.png" alt="Upholstered Bed">
                        <img class="hover" src="./img/products/upholstered_bed_hover.png" alt="Upholstered Bed Hover">
                    </div>
                    <h4>Upholstered Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$5600</span> $4800</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>

                 <div class="product" data-category="beds">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/siro_bed.png" alt="Siro Bed">
                        <img class="hover" src="./img/products/siro_bed_hover.png" alt="Siro Bed Hover">
                    </div>
                    <h4>Siro Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$3490</span> $3400</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                
                 <div class="product" data-category="beds">
                    <div class="image-container">
                        <img class="default" src="./img/products/wingback_bed.png" alt="Wingback Bed">
                        <img class="hover" src="./img/products/wingback_bed_hover.png" alt="Wingback Bed Hover">
                    </div>
                    <h4>Wingback Bed</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$20000</span> $17659</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

            </div>
        </section>
    </br>
       
        <section class="category" id="sofas" data-category="sofas">
            <h3>Sofas</h3>
            <div class="products">

              
                <div class="product" data-category="sofas">
                    <div class="image-container">
                        <img class="default" src="./img/products/grey_sofa.png" alt="Grey Sofa">
                        <img class="hover" src="./img/products/grey_sofa_hover.png" alt="Grey Sofa Hover">
                    </div>
                    <h4>Grey Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$2400</span> $1980</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>
               
                <div class="product" data-category="sofas">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/mylene_sofa.png" alt="Mylene Sofa">
                        <img class="hover" src="./img/products/mylene_sofa_hover.png" alt="Mylene Sofa Hover">
                    </div>
                    <h4>Mylene Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$3075</span> $2400</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
              
                <div class="product" data-category="sofas">
                    <div class="image-container">
                        <img class="default" src="./img/products/leonne_sofa.png" alt="Leonne Sofa">
                        <img class="hover" src="./img/products/leonne_sofa_hover.png" alt="Leonne Sofa Hover">
                    </div>
                    <h4>Leonne Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$3400</span> $3200</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>

                
                 <div class="product" data-category="sofas">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/leather_sofa.png" alt="Leather Sofa">
                        <img class="hover" src="./img/products/leather_sofa_hover.png" alt="Leather Sofa Hover">
                    </div>
                    <h4>Leather Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$4568</span> $3780</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                
                
                 <div class="product" data-category="sofas">
                    <div class="image-container">
                        <img class="default" src="./img/products/cloud_sofa.png" alt="Cloud Sofa">
                        <img class="hover" src="./img/products/cloud_sofa_hover.png" alt="Cloud Sofa Hover">
                    </div>
                    <h4>Cloud Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$4567</span> $4290</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

                
                 <div class="product" data-category="sofas">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/pinth_sofa.png" alt="Pinth Sofa">
                        <img class="hover" src="./img/products/pinth_sofa_hover.png" alt="Pinth Sofa Hover">
                    </div>
                    <h4>Pinth Sofa</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$6700</span> $5900</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
            </div>
        </section>
    </br>
        
          <section class="category" id="dressers" data-category="dressers">
            <h3>Dressers</h3>
            <div class="products">

                
                <div class="product" data-category="dressers">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/oak_dresser.png" alt="Oak Dresser">
                        <img class="hover" src="./img/products/oak_dresser_hover.png" alt="Oak Dresser Hover">
                    </div>
                    <h4>Oak Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$5600</span> $5432</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
               
                <div class="product" data-category="dressers">
                    <div class="image-container">
                        <img class="default" src="./img/products/shagreen_dresser.png" alt="Shagreen Dresser">
                        <img class="hover" src="./img/products/shagreen_dresser_hover.png" alt="Shagreen Dresser Hover">
                    </div>
                    <h4>Shagreen Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$4087</span> $3567</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
               
                <div class="product" data-category="dressers">
                    <div class="image-container">
                        <img class="default" src="./img/products/ford_dresser.png" alt="Ford Dresser">
                        <img class="hover" src="./img/products/ford_dresser_hover.png" alt="Ford Dresser Hover">
                    </div>
                    <h4>Ford Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$2099</span> $1768</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>

                 
                 <div class="product" data-category="dressers">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/oberlin_dresser.png" alt="Oberlin Dresser">
                        <img class="hover" src="./img/products/oberlin_dresser_hover.png" alt="Oberlin Dresser Hover">
                    </div>
                    <h4>Oberlin Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$469</span> $239</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                
                 <div class="product" data-category="dressers">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/white_dresser.png" alt="White Dresser">
                        <img class="hover" src="./img/products/white_dresser_hover.png" alt="White Dresser Hover">
                    </div>
                    <h4>White Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$560</span> $356</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
             
                 <div class="product" data-category="dressers">
                    <div class="image-container">
                        <img class="default" src="./img/products/wooden_dresser.png" alt="Wooden Dresser">
                        <img class="hover" src="./img/products/wooden_dresser_hover.png" alt="Wooden Dresser Hover">
                    </div>
                    <h4>Wooden Dresser</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$466</span> $422</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
            </div>
        </section>
    </br>
         
         <section class="category" id="chairs" data-category="chairs">
            <h3>Chairs</h3>
            <div class="products">

               
                <div class="product" data-category="chairs">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/avot_chair.png" alt="Avot Chair">
                        <img class="hover" src="./img/products/avot_chair_hover.png" alt="Avot Chair Hover">
                    </div>
                    <h4>Avot Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$899</span> $760</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>

                 
                 <div class="product" data-category="chairs">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/camel_chair.png" alt="Camel Chair">
                        <img class="hover" src="./img/products/camel_chair_hover.png" alt="Camel Chair Hover">
                    </div>
                    <h4>Camel Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$356</span> $322</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                
                 <div class="product" data-category="chairs">
                    <div class="image-container">
                        <img class="default" src="./img/products/lupo_chair.png" alt="Lupo Chair">
                        <img class="hover" src="./img/products/lupo_chair_hover.png" alt="Lupo Chair Hover">
                    </div>
                    <h4>Lupo Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$256</span> $244</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>
               
                 <div class="product" data-category="chairs">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/fluffy_chair.png" alt="Fluffy Chair">
                        <img class="hover" src="./img/products/fluffy_chair_hover.png" alt="Fluffy Chair Hover">
                    </div>
                    <h4>Fluffy Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$1900</span> $1000</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                
                 <div class="product" data-category="chairs">
                    <div class="image-container">
                        <img class="default" src="./img/products/velvet_chair.png" alt="Velvet Chair">
                        <img class="hover" src="./img/products/velvet_chair_hover.png" alt="Velvet Chair Hover">
                    </div>
                    <h4>Velvet Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$544</span> $344</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

                
                 <div class="product" data-category="chairs">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/brown_chair.png" alt="Brown Chair">
                        <img class="hover" src="./img/products/brown_chair_hover.png" alt="Brown Chair Hover">
                    </div>
                    <h4>Brown Chair</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$576</span> $278</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
            </div>
        </section>
    </br>
       
        <section class="category" id="decor" data-category="decor">
            <h3>Decor</h3>
            <div class="products">

               
                <div class="product" data-category="decor">
                    <div class="image-container">
                        <img class="default" src="./img/products/round_mirror.png" alt="Round Mirror">
                        <img class="hover" src="./img/products/round_mirror_hover.png" alt="Round Mirror Hover">
                    </div>
                    <h4>Round Mirror</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$298</span> $199</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

               
                 <div class="product" data-category="decor">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/meduzadecor.png" alt="Meduza Decor">
                        <img class="hover" src="./img/products/meduzadecor_hover.png" alt="Meduza Decor Hover">
                    </div>
                    <h4>Meduza Decor</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$190</span> $69</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
                 <div class="product" data-category="decor">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/metalvase.png" alt="Metal Vase">
                        <img class="hover" src="./img/products/metalvase_hover.png" alt="Metal Vase Hover">
                    </div>
                    <h4>Metal Vase</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$309</span> $134</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
               
                 <div class="product" data-category="decor">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/candelholder.png" alt="Candel Holder">
                        <img class="hover" src="./img/products/candelholder_hover.png" alt="Candel Holder Hover">
                    </div>
                    <h4>Candel Holder</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$4450</span> $2334</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
                 <div class="product" data-category="decor">
                    <div class="image-container">
                        <img class="default" src="./img/products/wall_decor.png" alt="Wall Decor">
                        <img class="hover" src="./img/products/wall_decor_hover.png" alt="Wall Decor Hover">
                    </div>
                    <h4>Wall Decor</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$3075</span> $2400</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i> 
                    </div>
                </div>

              
                 <div class="product" data-category="decor">
                    <div class="bestseller-label">Best Seller</div>
                    <div class="image-container">
                        <img class="default" src="./img/products/porcelain_vase.png" alt="Porcelain Vase">
                        <img class="hover" src="./img/products/porcelain_vase_hover.png" alt="Porcelain Vase Hover">
                    </div>
                    <h4>Porcelain Vase</h4>
                    <p class="dimensions">17" H x 8" W x 8" D</p>
                    <p class="price"><span class="old-price">$675</span> $400</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> 
                    </div>
                </div>
                 
            </div>
        </section>

            </div>
        </section>

    </main>
       </div>
    
<section class="footer">
    <div class="footer-boxes">
      <div class="footer-box">
        <h4>Stay connected with us</h4>
        <p>
          Follow us on social media for the latest updates, inspiration, and
          more!
        </p>
        <div class="icons">
          <a
            href="https://facebook.com"
            target="_blank"
            aria-label="Visit our Facebook page"
          >
            <i class="fab fa-facebook"></i>
          </a>
          <a
            href="https://instagram.com"
            target="_blank"
            aria-label="Visit our Instagram page"
          >
            <i class="fab fa-instagram"></i>
          </a>
          <a
            href="https://linkedin.com"
            target="_blank"
            aria-label="Visit our LinkedIn page"
          >
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
      </div>
      <div class="footer-box">
        <h4>Subscribe to our newsletter</h4>
        <p>Subscribe for exclusive deals and updates!</p>
        <form class="newsletter" action="#">
          <input type="email" placeholder="Enter your email" required />
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </div>
    <p>&copy; 2024 Style Your Space. All rights reserved.</p>
  </section>

  <script src="script.js"></script>
    
</body>
</html>