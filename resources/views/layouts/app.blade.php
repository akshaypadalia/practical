<!DOCTYPE htmnl>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width:device-width, initial-scale=1.0">
        <title>Laravel CRUD</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plans.index') }}">Plans</a>
                        </li>        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('combo_plans.index') }}">Combo Plans</a>
                        </li>        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eligibility_criterias.index') }}">Eligibility Criterias</a>
                        </li>        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            @yield('content')
        </div>
    </body>
</html>