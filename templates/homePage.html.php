<div class="mainContents">
    <h1 class="sr-only">Sports warehouse homepage</h1>
    <div>
        <div id="slideshow" class="slideshow">
            <div class="slideshow_slides fade">
                <div class="heroContainer">
                    <div class="imageWrap"><img src="./assets/images/slide-show/slideshow-ball2.webp" alt="slide show ball" aria-hidden="true"></div>
                    <div class="heroTextWrap">
                        <div class="heroText">
                            <h2 class="sr-only">New range of Sports balls</h2>
                            <p>View our brand new range of Sports balls
                            </p>
                        </div>
                        <input type="button" value="Shop now" class="button" onclick="window.location.href='./productsByCategory.php?id=5'">
                    </div>
                </div>
            </div>
            <div class="slideshow_slides fade">
                <div class="heroContainer">
                    <div class="imageWrap"><img src="./assets/images/slide-show/slideshow-helmet3.webp" alt="protective helmets" aria-hidden="true"></div>
                    <div class="heroTextWrap">
                        <div class="heroText">
                            <h2 class="sr-only">new range of protective helmets</h2>
                            <p>Get protected with <br>new range of protected helmets</p>
                        </div>
                        <input type="button" value="Shop now" class="button" onclick="window.location.href='./productsByCategory.php?id=2'">
                    </div>
                </div>
            </div>
            <div class="slideshow_slides fade">
                <div class="heroContainer">
                    <div class="imageWrap"><img src="./assets/images/slide-show/slideshow-runner2.webp" alt="Race training gear" aria-hidden="true"></div>
                    <div class="heroTextWrap">
                        <div class="heroText">
                            <h2 class="sr-only">Race training gear</h2>
                            <p>Get ready to race <br>with our professional training gear</p>
                        </div>
                        <input type="button" value="Shop now" class="button" onclick="window.location.href='./productsByCategory.php?id=7'">
                    </div>
                </div>
            </div>
            <!-- The dots/circles -->
            <div class="slideshow_indicator">
                <span class="slideshow_indicator-dot" id="dot1"></span>
                <span class="slideshow_indicator-dot" id="dot2"></span>
                <span class="slideshow_indicator-dot" id="dot3"></span>
            </div>
        </div>
        <div class="banner">
            <div class="banner_content siteWrapper">
                <a href="./products.php">
                    <div class="content">
                        <h2 class="sr-only">Promotion</h2>
                        <h3>This is a demonstration website, No real products are sold</h3>
                        <p class="bannerFont-large">
                            UP TO <span class="discountPercentage">30%</span> EXTRA OFF OUTLET!
                        </p>
                        <p class="bannerFont-large">
                            ALREADY UP TO <span class="discountPercentage">70%</span> OFF
                        </p>
                        <p class="bannerFont-medium">
                            Discount revealed @ checkout
                        </p>
                        <p class="bannerFont-medium bannerHighlight">
                            Use code: <mark>SPORTS</mark>
                        </p>
                        <p class="bannerFont-small">
                            Outlet items only. See website banner for Ts&amp;Cs. Selected marked products excluded from promo.
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="featuredOffer">
            <div class="siteWrapper">
                <div class="blockHeading">
                    <h2>featured offer</h2>
                </div>
                <div class="row">
                    <div class="column2">
                        <div class="imgWrapper">
                            <a href="./productsByCategory.php?id=6"><img src="./assets/images/featured-offer/john-arano-h4i9G-de7Po-unsplash.webp" alt="featured offer"></a>
                        </div><a href="./productsByCategory.php?id=6">
                            <div class="content">
                                <div class="content-heading">up to 50% off equipment</div>
                                <div class="content-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, expedita?</div>
                                <div class="text-link">
                                    Shop >
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="column2">
                        <div class="imgWrapper">
                            <a href="./productsByCategory.php?id=7"><img src="./assets/images/featured-offer/maarten-duineveld-pmfJcN7RGiw-unsplash.webp" alt="pants"></a>
                        </div><a href="./productsByCategory.php?id=7">
                            <div class="content">
                                <div class="content-heading">20 - 40% off training gear</div>
                                <div class="content-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem eligendi non commodi</div>
                                <div class="text-link">
                                    Shop >
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner">
            <div class="banner_content siteWrapper">
                <a href="./productsByCategory.php?id=3">
                    <div class="content">
                        <h2 class="sr-only">Promotion</h2>
                        <p class="bannerFont-large">
                            UP TO <span class="discountPercentage">50%</span> OFF pants!!
                        </p>
                        <p class="bannerFont-large">
                            wins!
                        </p>

                        <p class="bannerFont-small">
                            Limited time only. Selected training gear marked down as shown.
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="productsContainer">
            <div class="siteWrapper">
                <?php
                require_once "./classes/DBAccess.php";
                include "./settings/db.php";
                $db = new DBAccess($dsn, $username, $password);
                $pdo = $db->connect();

                $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item Where salePrice < price AND salePrice <> 0";
                $stmt = $pdo->prepare($sql);
                $rows = $db->executeSQL($stmt);
                ?>
                <div class="blockHeading">
                    <h2>products on sale</h2>
                </div>
                <div class="products">
                    <?php foreach ($rows as $row) :
                        if (file_exists("./assets/images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
                            $photoPath = "./assets/images/product-images/" . $row["photo"];
                        } else {
                            $photoPath = "./assets/images/product-images/imageUnavailable.webp";
                        }
                        $itemId = $row["itemId"];
                        $itemName = $row["itemName"];
                        $photo = $row["photo"];
                        $price = $row["price"];
                        $description = $row["description"];
                        $salePrice = $row["salePrice"];
                    ?>
                        <article class="item">
                            <a href="./productDetails.php?id=<?= $itemId ?>" class="link">
                                <div class="photo-frame">
                                    <img src="<?= $photoPath ?>" class="photo" width="500" height="500" alt="<?= $itemName ?>">
                                </div>
                                <?php
                                if ($salePrice <= 0) {
                                ?><p class="price">$<?= $price ?></p>
                                <?php
                                } else {
                                ?><div class="content">
                                        <p class="price"><span class="price-onSale">$<?= $salePrice ?></span>
                                            <span class="priceDescription
                            ">was</span>
                                            <del>$<?= $price ?></del>
                                        </p>
                                    <?php
                                }
                                    ?>
                                    <h3 class="heading"><?= $itemName ?></h3>
                                    </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="banner  ">
            <div class="banner_freeShipping siteWrapper">
                <a href="./products.php">
                    <div class="content">
                        <h2 class="sr-only">Promotion</h2>
                        <p class="bannerFont-medium">
                            Free worldwide shipping over $100
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="trendingProducts">
            <div class="siteWrapper">
                <div class="row">
                    <div class="column3">
                        <div class="imgWrapper">
                            <a href="#"><img src="./assets/images/product-images/nike-dunk-low-younger-kids-shoes-white.webp" alt="nike kids shoes white"></a>
                        </div>
                        <div class="content">
                            <div class="content-heading">New Nike Dunk</div>
                            <div class="content-info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum sed mollitia nulla dolorum amet voluptas, ex dicta temporibus soluta! Commodi.</div>
                            <div class="text-link">
                                <a href="#">Shop ></a>
                            </div>
                        </div>
                    </div>
                    <div class="column3">
                        <div class="imgWrapper">
                            <a href="#"><img src="./assets/images/product-images/32958641012766.jpg" alt="pants"></a>
                        </div>
                        <div class="content">
                            <div class="content-heading">Fitness Bands</div>
                            <div class="content-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem eligendi non commodi</div>
                            <div class="text-link">
                                <a href="#">Shop ></a>
                            </div>
                        </div>
                    </div>
                    <div class="column3">
                        <div class="imgWrapper">
                            <a href="#"><img src="./assets/images/product-images/34332258762782.jpg" alt="pants"></a>
                        </div>
                        <div class="content">
                            <div class="content-heading">Cricket Set</div>
                            <div class="content-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem eligendi non commodi</div>
                            <div class="text-link">
                                <a href="#">Shop ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shopByCategory">
            <div class="siteWrapper">
                <div class="blockHeading">
                    <h2>shop by category</h2>
                </div>
                <div class="row">
                    <a href="./productsByCategory.php?id=1" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/shoes.webp" alt="category shoes">
                        </div>
                        <div class="content">
                            <span class="title">Shoes</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=2" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/helmet.webp" alt="category helmet">
                        </div>
                        <div class="content">
                            <span class="title">Helmet</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=33" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/pants.webp" alt="category pants">
                        </div>
                        <div class="content">
                            <span class="title">Pants</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=4" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/tops.webp" alt="category tops">
                        </div>
                        <div class="content">
                            <span class="title">Tops</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=5" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/balls3.webp" alt="category balls">
                        </div>
                        <div class="content">
                            <span class="title">Balls</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=6" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/equipment.webp" alt="category equipment">
                        </div>
                        <div class="content">
                            <span class="title">Equipment</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=7" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/trainingGear.webp" alt="">
                        </div>
                        <div class="content">
                            <span class="title">Training Gear</span>
                        </div>
                    </a>
                    <a href="./productsByCategory.php?id=171" class="column4">
                        <div class="imgWrapper">
                            <img src="./assets/images/product-by-category/tech.webp" alt="category tech">
                        </div>
                        <div class="content">
                            <span class="title">Tech</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="recommendedProductContainer">
            <div class="siteWrapper">
                <?php
                require_once "./classes/DBAccess.php";
                include "./settings/db.php";
                $db = new DBAccess($dsn, $username, $password);
                $pdo = $db->connect();

                $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item Where featured = 1";
                $stmt = $pdo->prepare($sql);
                $rows = $db->executeSQL($stmt);
                ?>
                <div class="blockHeading">
                    <h2>recommended for you</h2>
                </div>
                <div class="products">
                    <?php foreach ($rows as $row) :
                        if (file_exists("./assets/images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
                            $photoPath = "./assets/images/product-images/" . $row["photo"];
                        } else {
                            $photoPath = "./assets/images/product-images/imageUnavailable.webp";
                        }
                        $itemId = $row["itemId"];
                        $itemName = $row["itemName"];
                        $photo = $row["photo"];
                        $price = $row["price"];
                        $description = $row["description"];
                        $salePrice = $row["salePrice"];
                    ?>
                        <article class="item">
                            <a href="./productDetails.php?id=<?= $itemId ?>" class="link">
                                <div class="photo-frame">
                                    <img src="<?= $photoPath ?>" class="photo" width="500" height="500" alt="<?= $itemName ?>">
                                </div>
                                <?php
                                if ($salePrice <= 0) {
                                ?><p class="price">$<?= $price ?></p>
                                <?php
                                } else {
                                ?>
                                    <p class="price"><span class="price-onSale">$<?= $salePrice ?></span>
                                        <span class="priceDescription
                            ">was</span>
                                        <del>$<?= $price ?></del>
                                    </p>
                                <?php
                                }
                                ?>
                                <h3 class="heading"><?= $itemName ?></h3>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="brandsContainer siteWrapper">
            <div class="blockHeading">
                <h2>Our brands and partnerships</h2>
            </div>
            <div class="partners">
                <ul class="partners__logos">
                    <li class="logo">
                        <a href="https://www.nike.com/au/"><img src="./assets/images/partner-logo/addidas.png" class="partners__logo-image" width="80" height="28" alt="nike logo" aria-label="nike logo"></a>
                    </li>
                    <li class="logo">
                        <a href="#"><img src="./assets/images/partner-logo/puma.png" class="partners__logo-image" width="80" height="53" alt="adidas logo" aria-label="adidas logo"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/nike.png" class="partners__logo-image" width="80" height="19" alt="skins logo" aria-label="skin logo"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/reebok.png" class="partners__logo-image" width="80" height="26" alt="asics logo" aria-label="asics logo"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/asics.png" class="partners__logo-image" width="80" height="43" alt="newbalance logo" aria-label="newbalance logo"></a>
                    </li>
                    <li class="logo">
                        <a href="#"><img src="./assets/images/partner-logo/under_armour.png" class="partners__logo-image" width="80" height="19" alt="wilson logo" aria-label="wilson logo"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>