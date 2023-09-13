<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?= $title ?></title>
    <link rel="icon" href="../assets/images/company-logo/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="stylesheet" href="./styles/adminStyle.css">
    <script defer src="./scripts/adminScript.js"></script>

<body>
    <svg>
        <symbol id="sw-logo" data-name="Sports Warehouse logo" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 2200 300">
            <defs>
                <style>
                    .blue {
                        fill: #00aced;
                    }

                    .white {
                        fill: #fff;
                    }

                    .orange {
                        fill: #ff690c;
                    }
                </style>
            </defs>
            <path id="SW_background" class="blue" d="M150,0H475a0,0,0,0,1,0,0V300a0,0,0,0,1,0,0H150A150,150,0,0,1,0,150v0A150,150,0,0,1,150,0Z" />
            <path id="SW" class="white" d="M202.73,173.229q-4.245-7.573-13.482-13.535t-27.607-12.3q-17.511-6.228-24.707-10.688t-10.367-10.044q-3.169-5.585-3.169-14.287,0-13.859,10.313-21.915T161.426,82.4q17.831,0,37.383,8.164l3.974-9.453a103.919,103.919,0,0,0-41.572-8.379q-21.7,0-35.5,11.118t-13.8,28.735q0,16.008,9.185,25.621T154.336,156.1q16.435,5.588,24.922,10.42T191.5,177.2q3.759,5.856,3.76,14.77a28.114,28.114,0,0,1-11.333,23.257q-11.336,8.862-30.669,8.862-26.32,0-43.291-7.2v10.957q15.36,6.337,44.15,6.338,23.953,0,38.4-11.494t14.449-31.153Q206.973,180.8,202.73,173.229ZM417.511,74.992H406.447q-30.937,114.726-33.14,123.427t-3.6,16.436q-2.364-11.6-7.842-30.508L330.392,74.992H318.253L291.4,170.275q-8.379,29.757-10.957,44.365-0.753-4.294-1.665-8.54t-2.041-8.808q-1.128-4.565-2.525-9.776T271.2,176.183L243.7,74.992H232.208l43.184,157.051h9.238Q316.1,120,319.274,107.863t4.887-21.484q2.148,9.562,6.446,24.492l34.482,121.172h9.024Z" />
            <path id="Sports" class="blue" d="M630.222,167.376q-3.86-6.885-12.256-12.305t-25.1-11.181q-15.918-5.662-22.461-9.717a26.469,26.469,0,0,1-9.424-9.131q-2.881-5.078-2.88-12.988,0-12.6,9.375-19.922t25.2-7.324q16.209,0,33.984,7.422l3.614-8.594a94.475,94.475,0,0,0-37.793-7.617q-19.728,0-32.276,10.108a32.011,32.011,0,0,0-12.549,26.123q0,14.552,8.35,23.291t30.225,16.26q14.942,5.079,22.656,9.472t11.133,9.717q3.417,5.323,3.418,13.428a25.556,25.556,0,0,1-10.3,21.142q-10.3,8.058-27.881,8.057-23.928,0-39.355-6.543v9.961q13.964,5.762,40.136,5.762,21.775,0,34.912-10.449t13.135-28.321Q634.079,174.263,630.222,167.376ZM739.6,208.391q11.865-14.4,11.865-40.576,0-26.952-11.279-41.064T707.419,112.64q-24.024,0-34.961,17.187h-0.586l-1.855-15.137h-8.2v154.2h9.668V228.46q0-8.6-.391-15.82l-0.293-8.2h0.684q11.227,18.361,35.742,18.36Q727.732,222.8,739.6,208.391Zm-59.766-4.834q-8.349-10.643-8.349-35.546v-3.125q0-23.046,8.691-33.252t27.246-10.2q33.788,0,33.789,46.777,0,21.779-8.935,33.887T707.028,214.2Q688.18,214.2,679.831,203.557ZM856.2,127.337q-12.45-14.7-34.326-14.7-21.972,0-34.57,14.5T774.7,167.62q0,16.5,5.664,29.1a43.091,43.091,0,0,0,16.309,19.335,45.007,45.007,0,0,0,24.609,6.739q22.167,0,34.766-14.6t12.6-40.576Q868.649,142.036,856.2,127.337Zm-61.816,6.152q9.522-12.06,27.1-12.06t27.294,12.109q9.717,12.109,9.717,34.082,0,21.876-9.619,34.131t-27.2,12.256q-17.579,0-27.2-12.256t-9.62-34.131Q784.86,145.551,794.382,133.489Zm127.49-16.113q-7.422,4.737-13.965,16.455h-0.683l-0.977-19.141h-8.2V220.843h9.668V162.249q0-17.578,8.691-29.1t22.266-11.523a56.618,56.618,0,0,1,13.77,1.66l1.855-9.277a83.124,83.124,0,0,0-14.453-1.367Q929.295,112.64,921.872,117.376Zm68.555,90.967q-4.3-5.86-4.3-18.067V123.089h31.15v-8.4H986.13V89.007h-4.981l-4.882,24.023-15.723,4.395v5.664h15.723v68.554q0,16.114,6.689,23.633t20.754,7.52a51.23,51.23,0,0,0,16.21-2.344V212.64a72.557,72.557,0,0,1-16.02,1.562Q994.725,214.2,990.427,208.343ZM1105.42,180.8a30.419,30.419,0,0,0-9.82-9.424q-6.54-4.15-20.9-9.326-17.19-6.153-23.09-11.133a16.492,16.492,0,0,1-5.91-13.281q0-7.618,7.62-11.915t20.6-4.3q13.38,0,29.01,6.445l3.61-8.789a83.789,83.789,0,0,0-32.62-6.445q-17.97,0-27.98,6.933t-10.01,18.848a23.47,23.47,0,0,0,3.28,12.744,30.934,30.934,0,0,0,9.71,9.375q6.45,4.152,22.37,9.912,14.835,5.274,21.33,10.742a16.966,16.966,0,0,1,6.5,13.477q0,8.693-8.16,13.916t-23.87,5.224a74.547,74.547,0,0,1-33.79-8.007v10.449q12.5,6.543,33.79,6.543,19.92,0,30.76-7.666t10.84-21.924A23.051,23.051,0,0,0,1105.42,180.8Z" />
            <path id="Warehouse" class="orange" d="M1356.49,78.069h-10.06q-28.125,104.3-30.12,112.207t-3.27,14.942q-2.16-10.548-7.13-27.735l-28.62-99.414h-11.03l-24.42,86.621q-7.6,27.053-9.96,40.332c-0.45-2.6-.96-5.191-1.51-7.763s-1.17-5.24-1.86-8.008-1.44-5.728-2.29-8.887-1.76-6.592-2.73-10.3l-25-91.992h-10.45l39.25,142.774h8.4q28.62-101.854,31.5-112.891t4.44-19.531q1.95,8.693,5.86,22.265l31.35,110.157h8.2Zm94.34,142.774V150.237q0-19.237-8.64-28.32-8.655-9.083-26.13-9.082-17.085,0-34.57,8.2l3.62,8.4q15.81-8.2,30.56-8.2,13.68,0,19.83,7.715t6.15,22.852v7.031l-20.22.586q-24.51.489-37.45,9.082t-12.94,24.121q0,14.161,8.7,22.168,8.685,8.008,24.31,8.008,11.52,0,19.97-4.248t16.46-14.5h0.78l2.44,16.8h7.13Zm-63.43-12.354q-6.105-5.516-6.1-15.478,0-12.5,9.52-18.409t31.88-6.982l18.56-.781v10.449q0,17.284-9.82,27t-26.8,9.717Q1393.51,214.007,1387.4,208.489Zm121.63-91.113q-7.425,4.737-13.96,16.455h-0.69l-0.97-19.141h-8.21V220.843h9.67V162.249q0-17.578,8.69-29.1t22.27-11.523a56.636,56.636,0,0,1,13.77,1.66l1.85-9.277A83.073,83.073,0,0,0,1527,112.64Q1516.455,112.64,1509.03,117.376Zm113.67,104a77.683,77.683,0,0,0,16.61-5.323v-8.789a97.145,97.145,0,0,1-17.44,5.469,88.8,88.8,0,0,1-15.96,1.27q-18.66,0-28.66-11.524-10.02-11.522-10.21-33.4h76.46v-7.813q0-22.459-10.83-35.547-10.845-13.084-29.59-13.085-21.195,0-33.7,15.283t-12.5,40.674q0,25.684,12.94,39.941t36.09,14.258A92.09,92.09,0,0,0,1622.7,221.38Zm2.54-89.746q8.01,10.4,8.01,28.857h-65.62q1.56-19.043,10.84-29.15t24.61-10.108Q1617.225,121.233,1625.24,131.634Zm131.16,89.209V151.409q0-38.767-36.14-38.769-13.47,0-22.56,4.3a35.628,35.628,0,0,0-15.03,13.868h-0.69l0.49-13.575V68.89h-9.67V220.843h9.67V162.249q0-21.582,8.84-31.2t27.88-9.619q14.16,0,20.9,7.275T1746.83,152v68.848h9.57Zm109.71-93.506q-12.45-14.7-34.32-14.7-21.975,0-34.57,14.5t-12.6,40.479q0,16.5,5.66,29.1a43.106,43.106,0,0,0,16.31,19.335,45.025,45.025,0,0,0,24.61,6.739q22.17,0,34.77-14.6,12.585-14.6,12.59-40.576Q1878.56,142.036,1866.11,127.337Zm-61.81,6.152q9.51-12.06,27.1-12.06,17.565,0,27.29,12.109t9.72,34.082q0,21.876-9.62,34.131t-27.2,12.256q-17.58,0-27.2-12.256t-9.62-34.131Q1794.77,145.551,1804.3,133.489Zm102.49-18.8v69.336q0,38.77,36.23,38.77,26.46,0,36.81-16.6h0.59l1.76,14.649h8.2V114.69h-9.57v58.594q0,21.584-8.94,31.152-8.925,9.573-27.88,9.571-14.16,0-20.9-7.276t-6.73-23.291V114.69h-9.57ZM2088.48,180.8a30.52,30.52,0,0,0-9.82-9.424q-6.54-4.15-20.9-9.326-17.19-6.153-23.09-11.133a16.492,16.492,0,0,1-5.91-13.281q0-7.618,7.62-11.915,7.605-4.3,20.6-4.3,13.38,0,29.01,6.445l3.61-8.789a83.789,83.789,0,0,0-32.62-6.445q-17.97,0-27.98,6.933t-10.01,18.848a23.554,23.554,0,0,0,3.27,12.744,30.974,30.974,0,0,0,9.72,9.375q6.45,4.152,22.36,9.912,14.85,5.274,21.34,10.742a16.966,16.966,0,0,1,6.5,13.477q0,8.693-8.16,13.916t-23.87,5.224a74.547,74.547,0,0,1-33.79-8.007v10.449q12.5,6.543,33.79,6.543,19.92,0,30.76-7.666t10.84-21.924A23.051,23.051,0,0,0,2088.48,180.8Zm90.28,40.576a77.613,77.613,0,0,0,16.6-5.323v-8.789a96.837,96.837,0,0,1-17.43,5.469,88.836,88.836,0,0,1-15.97,1.27q-18.645,0-28.66-11.524t-10.21-33.4h76.47v-7.813q0-22.459-10.84-35.547t-29.59-13.085q-21.2,0-33.69,15.283-12.51,15.285-12.5,40.674,0,25.684,12.94,39.941t36.08,14.258A92.282,92.282,0,0,0,2178.76,221.38Zm2.54-89.746q8.01,10.4,8.01,28.857h-65.63q1.56-19.043,10.84-29.15t24.61-10.108Q2173.29,121.233,2181.3,131.634Z" />
        </symbol>
        <symbol id="down" viewBox="0 0 16 16">
            <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
        </symbol>
        <symbol id="collapse" viewBox="0 0 16 16">
            <polygon points="11.62 3.81 7.43 8 11.62 12.19 10.09 13.71 4.38 8 10.09 2.29 11.62 3.81" />
        </symbol>
        <symbol id="search" viewBox="0 0 16 16">
            <path d="M6.57,1A5.57,5.57,0,1,1,1,6.57,5.57,5.57,0,0,1,6.57,1m0-1a6.57,6.57,0,1,0,6.57,6.57A6.57,6.57,0,0,0,6.57,0Z" />
            <rect x="11.84" y="9.87" width="2" height="5.93" transform="translate(-5.32 12.84) rotate(-45)" />
        </symbol>
    </svg>
    <header class="page-header">
        <nav>
            <a href="../index.php" aria-label="forecastr logo" class="logo">
                <svg width="100%" height="50">
                    <use xlink:href="#sw-logo"></use>
                </svg>
            </a>
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
                <svg width="20" height="20" aria-hidden="true">
                    <use xlink:href="#down"></use>
                </svg>
            </button>
            <ul class="admin-menu">
                <li class="menu-heading">
                    <h3>Admin</h3>
                </li>
                <li>
                    <a href="./displayDashboard.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                            <path d="M304 240V16.6c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16H304zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4V288L412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288H558.4z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="displayUsers.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                            <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="displayProducts.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                            <path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z" />
                        </svg>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="displayCategories.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                        </svg>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="displayOrderItems.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                        <span>Order Items</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                        </svg>
                        <span>Logout</span>
                    </a>
                </li>
                <li>
                    <div class="switch">
                        <input type="checkbox" id="mode" checked>
                        <label for="mode">
                            <span></span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                        <svg aria-hidden="true">
                            <use xlink:href="#collapse"></use>
                        </svg>
                        <span>Collapse</span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>
    <section class="page-content">
        <section class="search-and-user">
            <form>
                <input type="search" placeholder="Search Pages...">
                <button type="submit" aria-label="submit form">
                    <svg aria-hidden="true">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
            </form>
            <div class="admin-profiles">
                <div class="admin-profile">
                    <a href="displayUsers.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                        </svg>
                    </a>
                </div>
                <div class="admin-profile">
                    <a href="../logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                        </svg>
                    </a>
                </div>
            </div>
            </div>


            </div>
        </section>
        <section class="adminSection">

            <?= $output ?>

        </section>
    </section>


</body>

</html>