
<body>
    <style>
        /*=============== HOME ===============*/
        :root {
            --first-color: hsl(38, 69%, 59%);
            --body-font: 'Space Grotesk', sans-serif;
            --biggest-font-size: 2.375rem;
            --normal-font-size: .938rem;
            --smaller-font-size: .75rem;
        }

        /* Responsive typography */
        @media screen and (min-width: 1024px) {
            :root {
                --biggest-font-size: 5rem;
                --normal-font-size: 1rem;
                --smaller-font-size: .813rem;
            }
        }

        /*=============== BASE ===============*/
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            font-weight: 500;
            color: var(--text-color);
        }


        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        .home {
            background-color: var(--first-color);
            padding: 9rem 0 2rem;
            height: 100vh;
            display: grid;
        }

        .home__container {
            display: grid;
            align-content: center;
            row-gap: 2.5rem;
        }

        .home__data {
            text-align: center;
        }

        .home__title {
            font-size: var(--biggest-font-size);
            margin: .75rem 0;
        }

        .home__button {
            margin-top: 2rem;
            display: inline-block;
            background-color: var(--text-color);
            color: #fff;
            padding: .80rem 1.5rem;
            border-radius: 3rem;
            transition: .4s;
        }

        .home__button:hover {
            box-shadow: 0 4px 12px hsla(38, 69%, 8%, .2);
        }

        .home__img img {
            width: 230px;
            animation: floaty 1.8s infinite alternate;
        }

        .home__img {
            justify-self: center;
        }

        .home__shadow {
            width: 130px;
            height: 24px;
            background-color: hsla(38, 21%, 19%, .16);
            margin: 0 auto;
            border-radius: 50%;
            filter: blur(7px);
            animation: shadow 1.8s infinite alternate;
        }

        .home__footer {
            display: flex;
            justify-content: center;
            column-gap: .5rem;
            font-size: var(--smaller-font-size);
            align-self: flex-end;
        }

        /* Animate ghost */
        @keyframes floaty {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(15px);
            }
        }

        @keyframes shadow {
            0% {
                transform: scale(1, 1);
            }

            100% {
                transform: scale(.85, .85);
            }
        }

        /*=============== BREAKPOINTS ===============*/
        /* For small devices */
        @media screen and (max-width: 320px) {
            .home {
                padding-top: 7rem;
            }
        }

        /* For medium devices */
        @media screen and (min-width: 767px) {
            .nav {
                height: calc(var(--header-height) + 1.5rem);
            }

            .nav__toggle,
            .nav__close {
                display: none;
            }

            .nav__list {
                flex-direction: row;
                column-gap: 3.5rem;
            }
        }

        /* For large devices */
        @media screen and (min-width: 1024px) {
            .home__container {
                grid-template-columns: repeat(2, 1fr);
                align-items: center;
                column-gap: 2rem;
            }

            .home__data {
                text-align: initial;
            }

            .home__img img {
                width: 400px;
            }

            .home__shadow {
                width: 250px;
                height: 40px;
            }
        }

        @media screen and (min-width: 1048px) {
            .container {
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* For 2K resolutions (2048 x 1152, 2048 x 1536) */
        @media screen and (min-width: 2048px) {
            body {
                zoom: 1.7;
            }

            .home {
                height: initial;
                row-gap: 4rem;
            }
        }

        @media screen and (min-width: 3840px) {
            body {
                zoom: 3.1;
            }
        }
    </style>

<div>
    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home">
            <div class="home__container container">
                <div class="home__data">
                    <span class="home__subtitle">Error 404</span>
                    <h1 class="home__title">SORRY</h1>
                    <p class="home__description">
                        We can't seem to find the page <br> you are looking for.
                    </p>
                    <a href="/" class="home__button">
                        Go Home
                    </a>
                </div>

                <div class="home__img">
                    <img src="https://raw.githubusercontent.com/bedimcode/responsive-404-page/main/assets/img/ghost-img.png" alt="">
                    <div class="home__shadow"></div>
                </div>
            </div>

            <footer class="home__footer">
                <span>(84) 0334-598-851</span>
                <span>|</span>
                <span>asol.250@company.com</span>
            </footer>
        </section>
    </main>
</div>

</body>