
    <nav>
        <ul>
            <li>
                <a href="http://localhost/Food-Order/FrontEnd/admin/page1.php">DEPT-LOGIN</a>
            </li>
            <li>
                <a href="http://localhost/Food-Order/FrontEnd/admin/page2.php">DEPARTMENT</a>
            </li>
            <li>
                <a href="http://localhost/Food-Order/FrontEnd/">HOME</a>
            </li>
            <li>
            <a href="http://localhost/Food-Order/FrontEnd/logout.php">LOGOUT</a>
            </li>
        </ul>
    </nav>

    <style>* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html {
    height: 100vh;
}

.logo {
    margin-left: 2%;
}

nav {
    position:absolute;
    top:0px;
    padding-left: 100px;
    padding-right: 100px;
}

nav,
nav ul {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

nav {
    background-color: #283646;
    height: 50px;
}

nav ul li {
    font-size: 1.3rem;
    font-family: 'Montserrat', sans-serif;
    list-style-type: none;
}

nav ul li a {
    text-decoration: none;
    color: white;
}

nav ul li a:hover {
    color: yellowgreen;
}

@media only screen and (max-width: 768px) {
    nav {
        padding: unset !important
    }
}

@media only screen and (max-width: 576px) {
    nav,
    nav ul {
        height: auto;
        display: flex;
        flex-flow: column wrap;
    }
    nav ul li {
        width: 100%;
    }
    nav ul li a {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 50px;
    }
    nav ul li a:hover {
        color: white;
        background-color: yellowgreen;
    }
}</style>