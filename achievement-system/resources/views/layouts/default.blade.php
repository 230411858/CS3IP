@include('layouts.header')
@yield('content')
@include('layouts.footer')
<style>
    * 
    {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body 
    {
        display: flex;
        /* Stacks the header, main and footer on top of each other */
        flex-direction: column;
        /* Makes sure that the footer is at the bottom of the page even if there is not enough content */
        min-height: 100vh;
    }
    main 
    {
        flex-grow: 1;
    }
    h1
    {
        font-family: monospace;
        font-size: 36px;
    }
    /* Styling for the registration and login form cards */
    .form-card
    {
        display: flex;
        flex-direction: column;
        width: fit-content;
        margin: auto;
        text-align: center;
        border-style: solid;
        border-color: darkgrey;
        padding: 50px;  
        min-height: 60vh;
        min-width: 50vh;
    }
    .form-card form
    {
        /* Makes form inputs vertical */
        display: flex;
        flex-direction: column;
        margin-top: 5vh;
    }
    .form-card form input
    {
        /* Gets rid of the top, right and left borders from the input fields, leaving only the bottom line */
        border-style: none none solid none;
        padding: 20px;
        margin-bottom: 5vh;
    }
    .form-card form button
    {
        /* Makes the button round */
        border-radius: 15px;
        padding: 10px;
        margin: 10px;
    }
    .error
    {
        color: red;
        list-style: none;
    }
</style>