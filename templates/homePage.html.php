<div class="mainContents">
    <h1 class="sr-only">Sports warehouse homepage</h1>
    <div>
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

        <div class="banner ">
            <div class="banner_content siteWrapper">
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
                <div class="blockHeading">
                    <h2>trending products</h2>
                </div>
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





        <div class="tabContainer">
            <div class="tab-wrapper">
                <h3 class="tab-heading sr-only">Dilivery, track your order and return</h3>
                <input id="tab1" type="radio" name="tab" checked="checked">
                <input id="tab2" type="radio" name="tab">
                <input id="tab3" type="radio" name="tab">
                <div class="tab-layout">
                    <nav class="tab-nav">
                        <ul>
                            <li class="tab1">
                                <label for="tab1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" />
                                    </svg>
                                    <h4 class="tab-title">Dilivery</h4>
                                    <span class="indicator"></span>
                                </label>
                            </li>
                            <li class="tab2">
                                <label for="tab2"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                        <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                    <h4 class="tab-title">Track Order</h4>
                                    <span class="indicator"></span>
                                </label>
                            </li>
                            <li class="tab3">
                                <label for="tab3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
                                    </svg>
                                    <h4 class="tab-title">Return</h4>
                                    <span class="indicator"></span>
                                </label>
                            </li>
                        </ul>
                    </nav>
                    <section class="tab-contents">
                        <article class="tab1 content">
                            <h2 class="content-heading">Dilivery</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus itaque quidem minus nostrum, voluptatem accusamus aspernatur quia harum ratione, officia laudantium inventore autem doloribus</p>

                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est quidem aut, odio atque possimus quas ipsam ea sed eveniet, maiores dolorum dolorem recusandae voluptate reiciendis explicabo ipsum obcaecati maxime itaque!</p>
                        </article>
                        <article class="tab2 content">
                            <h2 class="content-heading">Track My Order</h2>
                            <div class="searchContainer">
                                <form action="./searchProducts.php" class="search" method="get" id="searchForm">
                                    <div class="search_input">
                                        <label for="search" class="sr-only">Search Products</label>
                                        <input type="text" placeholder="Tracking Number" name="search" id="search" class="search__input">
                                    </div>
                                    <button type="submit" name="searchButton" value="search" class="searchButton"><i class=" fa-solid fa-magnifying-glass"><span class="sr-only">search</span></i>
                                    </button>
                                </form>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores provident placeat nulla sed magni officiis, aut voluptates soluta aliquam rerum.</p>
                        </article>
                        <article class="tab3 content">
                            <h2 class="content-heading">Return</h2>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis harum dicta, ipsam nostrum excepturi, odit, inventore nisi quis soluta voluptas quibusdam! Hic voluptates asperiores harum consequatur adipisci numquam illo ab. Nulla tempore aspernatur quia qui culpa dolor, consequatur impedit, ipsum, modi laboriosam totam hic eius incidunt amet ullam! Soluta, </p>
                            <p>
                                repudiandae!em ipsum, dolor sit amet consectetur adipisicing elit. Omnis harum dicta, ipsam nostrum excepturi, odit, am illo ab. Nulla tempore aspernatur quia qui culpa dolor, consequatur impedit, ipsum, modi laboriosam totam hic eius incidunt amet ullam! Soluta, repudiandae
                            </p>
                        </article>
                    </section>
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
                        <a href="https://www.nike.com/au/"><img src="./assets/images/partner-logo/addidas.png" class="partners__logo-image" width="80" height="28" alt="nike logo" aria-hidden="true"></a>
                    </li>
                    <li class="logo">
                        <a href="#"><img src="./assets/images/partner-logo/puma.png" class="partners__logo-image" width="80" height="53" alt="adidas logo" aria-hidden="true"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/nike.png" class="partners__logo-image" width="80" height="19" alt="skins logo" aria-hidden="true"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/reebok.png" class="partners__logo-image" width="80" height="26" alt="asics logo" aria-hidden="true"></a>
                    </li>
                    <li class="logo">
                        <a href="#"> <img src="./assets/images/partner-logo/asics.png" class="partners__logo-image" width="80" height="43" alt="newbalance logo" aria-hidden="true"></a>
                    </li>
                    <li class="logo">
                        <a href="#"><img src="./assets/images/partner-logo/under_armour.png" class="partners__logo-image" width="80" height="19" alt="wilson logo" aria-hidden="true"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>