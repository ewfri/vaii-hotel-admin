<!doctype html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-gold bg-light bg-transparent gradient-background">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">HOTEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/ubytovanie">UBYTOVANIE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/wellness">WELLNESS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/gastronomia">GASTRONÓMIA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/kontakt">KONTAKT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/rezervacia">REZERVÁCIA</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<div class="pata gradient-background">
    <footer class="py-6">

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
