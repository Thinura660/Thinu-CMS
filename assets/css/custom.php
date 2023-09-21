<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .btn {
        background-color: <?php echo $blog_theme ?> !important;
        border: none;
    }

    .btn:hover {
        color: white !important;
        border: <?php echo $blog_theme ?> !important;

    }

    a:hover {
        color: <?php echo $blog_theme ?> !important;
    }

    .item:hover {
        color: white !important;
    }


    nav {
        position: fixed;
        z-index: 99;
        width: 100%;

        background: <?php echo $blog_theme ?>;
    }

    nav .wrapper {
        position: relative;
        max-width: 1300px;
        padding: 0px 30px;
        height: 70px;
        line-height: 70px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .wrapper .logo a {
        color: #f2f2f2;
        font-size: 20px;
        font-weight: 500;
        text-decoration: none;
    }

    .nav-links {
        margin-top: 10px;
    }

    .wrapper .nav-links {
        display: inline-flex;
    }

    .nav-links li {
        list-style: none;
    }

    .nav-links li a {
        color: #f2f2f2;
        text-decoration: none;
        font-size: 15px;
        padding: 9px 15px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .nav-links li a:hover {
        background: #3A3B3C;
    }

    .nav-links .mobile-item {
        display: none;
    }

    .nav-links .drop-menu {
        position: absolute;
        background: <?php echo $blog_theme ?>;
        width: 180px;
        line-height: 45px;
        top: 85px;
        opacity: 0;
        visibility: hidden;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .nav-links li:hover .drop-menu,
    .nav-links li:hover .mega-box {
        transition: all 0.3s ease;
        top: 70px;
        opacity: 1;
        visibility: visible;
    }

    .drop-menu li a {
        width: 100%;
        display: block;
        padding: 0 0 0 15px;
        font-weight: 400;
        border-radius: 0px;
    }

    .mega-box {
        position: absolute;
        left: 0;
        width: 100%;
        padding: 0 30px;
        top: 85px;
        opacity: 0;
        visibility: hidden;
    }

    .mega-box .content {
        background: <?php echo $blog_theme ?>;
        padding: 25px 20px;
        display: flex;
        width: 100%;
        justify-content: space-between;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .mega-box .content .row {
        width: calc(25% - 30px);
        line-height: 45px;
    }

    .content .row img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content .row header {
        color: #f2f2f2;
        font-size: 20px;
        font-weight: 500;
    }

    .content .row .mega-links {
        margin-left: -40px;
        border-left: 1px solid rgba(255, 255, 255, 0.09);
    }

    .row .mega-links li {
        padding: 0 20px;
    }

    .row .mega-links li a {
        padding: 0px;
        padding: 0 20px;
        color: #d9d9d9;
        font-size: 17px;
        display: block;
    }

    .row .mega-links li a:hover {
        color: #f2f2f2;
    }

    .wrapper .btn {
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        display: none;
    }

    .wrapper .btn.close-btn {
        position: absolute;
        right: 30px;
        top: 10px;
    }

    @media screen and (max-width: 970px) {
        .wrapper .btn {
            display: block;
        }

        .wrapper .nav-links {
            position: fixed;
            height: 100vh;
            width: 100%;
            max-width: 350px;
            top: 0;
            left: -100%;
            background: <?php echo $blog_theme ?>;
            display: block;
            padding: 50px 10px;
            line-height: 50px;
            overflow-y: auto;
            box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.18);
            transition: all 0.3s ease;
        }

        /* custom scroll bar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: <?php echo $blog_theme ?>;
        }

        ::-webkit-scrollbar-thumb {
            background: #3A3B3C;
        }

        #menu-btn:checked~.nav-links {
            left: 0%;
        }

        #menu-btn:checked~.btn.menu-btn {
            display: none;
        }

        #close-btn:checked~.btn.menu-btn {
            display: block;
        }

        .nav-links li {
            margin: 15px 10px;
        }

        .nav-links li a {
            padding: 0 20px;
            display: block;
            font-size: 20px;
        }

        .nav-links .drop-menu {
            position: static;
            opacity: 1;
            top: 65px;
            visibility: visible;
            padding-left: 20px;
            width: 100%;
            max-height: 0px;
            overflow: hidden;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        #showDrop:checked~.drop-menu,
        #showMega:checked~.mega-box {
            max-height: 100%;
        }

        .nav-links .desktop-item {
            display: none;
        }

        .nav-links .mobile-item {
            display: block;
            color: #f2f2f2;
            font-size: 20px;
            font-weight: 500;
            padding-left: 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-links .mobile-item:hover {
            background: #3A3B3C;
        }

        .drop-menu li {
            margin: 0;
        }

        .drop-menu li a {
            border-radius: 5px;
            font-size: 18px;
        }

        .mega-box {
            position: static;
            top: 65px;
            opacity: 1;
            visibility: visible;
            padding: 0 20px;
            max-height: 0px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .mega-box .content {
            box-shadow: none;
            flex-direction: column;
            padding: 20px 20px 0 20px;
        }

        .mega-box .content .row {
            width: 100%;
            margin-bottom: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .mega-box .content .row:nth-child(1),
        .mega-box .content .row:nth-child(2) {
            border-top: 0px;
        }

        .content .row .mega-links {
            border-left: 0px;
            padding-left: 15px;
        }

        .row .mega-links li {
            margin: 0;
        }

        .content .row header {
            font-size: 19px;
        }
    }

    nav input {
        display: none;
    }

    .body-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: center;
        padding: 0 30px;
    }

    .body-text div {
        font-size: 45px;
        font-weight: 600;
    }

    .topp-ad {
        width: 100%;
        max-height: 100px;
    }

    .topp-ad {
        width: 100%;
        max-height: 100px;
    }

    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        border-radius: 100%;
        margin: 0 4px;
    }

    .pagination a.active {
        background-color: <?php echo $blog_theme ?> !important;
        color: white;
        border: 1px solid <?php echo $blog_theme ?> !important;
        border-radius: 100%;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

    .loader-div {
        display: none;
        position: fixed;
        margin: 0px;
        padding: 0px;
        right: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 30001;
        opacity: 0.8;
    }

    .loader-img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    @keyframes ldio-nuoslg0rjqe {
        0% {
            transform: rotate(0)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .ldio-nuoslg0rjqe div {
        box-sizing: border-box !important
    }

    .ldio-nuoslg0rjqe>div {
        position: absolute;
        width: 144px;
        height: 144px;
        top: 28px;
        left: 28px;
        border-radius: 50%;
        border: 16px solid #000;
        border-color: #0a0a0a transparent #0a0a0a transparent;
        animation: ldio-nuoslg0rjqe 1s linear infinite;
    }

    .ldio-nuoslg0rjqe>div:nth-child(2),
    .ldio-nuoslg0rjqe>div:nth-child(4) {
        width: 108px;
        height: 108px;
        top: 46px;
        left: 46px;
        animation: ldio-nuoslg0rjqe 1s linear infinite reverse;
    }

    .ldio-nuoslg0rjqe>div:nth-child(2) {
        border-color: transparent #28292f transparent #28292f
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) {
        border-color: transparent
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div:before,
    .ldio-nuoslg0rjqe>div:nth-child(3) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 16px;
        height: 16px;
        top: -16px;
        left: 48px;
        background: #0a0a0a;
        border-radius: 50%;
        box-shadow: 0 128px 0 0 #0a0a0a;
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div:after {
        left: -16px;
        top: 48px;
        box-shadow: 128px 0 0 0 #0a0a0a;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) {
        border-color: transparent;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div:before,
    .ldio-nuoslg0rjqe>div:nth-child(4) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 16px;
        height: 16px;
        top: -16px;
        left: 30px;
        background: #28292f;
        border-radius: 50%;
        box-shadow: 0 92px 0 0 #28292f;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div:after {
        left: -16px;
        top: 30px;
        box-shadow: 92px 0 0 0 #28292f;
    }

    .loadingio-spinner-double-ring-a1kqjil1zsq {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
        background: none;
    }

    .ldio-nuoslg0rjqe {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .ldio-nuoslg0rjqe div {
        box-sizing: content-box;
    }

    .loader-div {
        display: none;
        position: fixed;
        margin: 0px;
        padding: 0px;
        right: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 30001;
        opacity: 0.8;
    }

    .loader-img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    @keyframes ldio-nuoslg0rjqe {
        0% {
            transform: rotate(0)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .ldio-nuoslg0rjqe div {
        box-sizing: border-box !important
    }

    .ldio-nuoslg0rjqe>div {
        position: absolute;
        width: 144px;
        height: 144px;
        top: 28px;
        left: 28px;
        border-radius: 50%;
        border: 16px solid #000;
        border-color: #0a0a0a transparent #0a0a0a transparent;
        animation: ldio-nuoslg0rjqe 1s linear infinite;
    }

    .ldio-nuoslg0rjqe>div:nth-child(2),
    .ldio-nuoslg0rjqe>div:nth-child(4) {
        width: 108px;
        height: 108px;
        top: 46px;
        left: 46px;
        animation: ldio-nuoslg0rjqe 1s linear infinite reverse;
    }

    .ldio-nuoslg0rjqe>div:nth-child(2) {
        border-color: transparent #28292f transparent #28292f
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) {
        border-color: transparent
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div:before,
    .ldio-nuoslg0rjqe>div:nth-child(3) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 16px;
        height: 16px;
        top: -16px;
        left: 48px;
        background: #0a0a0a;
        border-radius: 50%;
        box-shadow: 0 128px 0 0 #0a0a0a;
    }

    .ldio-nuoslg0rjqe>div:nth-child(3) div:after {
        left: -16px;
        top: 48px;
        box-shadow: 128px 0 0 0 #0a0a0a;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) {
        border-color: transparent;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div:before,
    .ldio-nuoslg0rjqe>div:nth-child(4) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 16px;
        height: 16px;
        top: -16px;
        left: 30px;
        background: #28292f;
        border-radius: 50%;
        box-shadow: 0 92px 0 0 #28292f;
    }

    .ldio-nuoslg0rjqe>div:nth-child(4) div:after {
        left: -16px;
        top: 30px;
        box-shadow: 92px 0 0 0 #28292f;
    }

    .loadingio-spinner-double-ring-a1kqjil1zsq {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
        background: none;
    }

    .ldio-nuoslg0rjqe {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .ldio-nuoslg0rjqe div {
        box-sizing: content-box;
    }
</style>