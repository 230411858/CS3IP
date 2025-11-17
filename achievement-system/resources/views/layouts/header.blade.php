<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
                Achievement System
        </title>
    </head>
    <body>
        <header>
            <h1>
                <a href="{{ route('welcome') }}">
                    Achievement System
                </a>
            </h1>
            <ul>
                @auth
                    <ul>
                        <li>
                            <a href="/dashboard">Home</a> </li>
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                @endauth
                @guest
                <li>
                    <a href="/login">Login</a>
                </li>
                <li>
                    <a href="/register">Register</a>
                </li>
                @endguest
            </ul>
        </header>
        <main>
<style>
    header
    {
        display: flex;
        /* Stops the header links from taking up the entire width of the page */
        width: fit-content;
        /* Makes the header items horizontal */
        flex-direction: row;
        text-align: center;
        justify-content: center;
        align-items: center;
        margin: auto;
        gap: 75vw;
    }
    header li
    {
        /* Makes the header links horizontal */
        float: left;
        /* Gets rid of the dot at the start of each list element */
        list-style: none;
        border-style: solid;
    }
    header li:hover
    {
        color: darkgrey;
    }
    header li button
    {
        /* Styles the logout button so it looks consistent with the links */ 
        border-style: none;
        background: none;
        padding: 0px 5px;
        cursor: pointer;
        font-size: 15px;
    }
    header li button:hover
    {
        color: darkgrey;
    }
    header a
    {
        color: black;
        text-decoration: none;
        padding: 10px;
    }
    header a:hover
    {
        color: darkgrey;
    }
</style>