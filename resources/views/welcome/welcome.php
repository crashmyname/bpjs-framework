<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?= asset('bpjs.png')?>" type="image/x-icon">
  </head>
  <style>
    .card-img {
      width: 55%;
      height: auto; 
      max-height: 250px; 
      object-fit: cover; 
      margin-bottom: 1rem; 
    }
  </style>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="<?= asset('bpjs.png')?>" alt="bpjs" width="6%"> <?= $title?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-light text-center py-4">
      <div class="container">
        <h1 class="display-4">Welcome to <a href="<?= base_url() ?>"><?= $title?></a></h1>
        <p class="lead">A simple and elegant framework to kickstart your PHP projects.</p>
        <a href="<?= route('instalasi')?>" class="btn btn-primary btn-lg">Get Started</a>
      </div>
    </section>

    <!-- Features Section -->
    <section class="container py-1">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Feature One</h5>
                        <img src="<?= asset('images.jpg')?>" class="card-img" alt="Feature One">
                        <p class="card-text">Easy Going and Easy use cause based on native php pdo object</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Feature Two</h5>
                        <img src="<?= asset('pagepage1.jpeg')?>" class="card-img" alt="Feature Two">
                        <p class="card-text">Have Validator u can easily validate data what u want.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Feature Three</h5>
                        <img src="<?= asset('GBZsLvrWsAAwtIw.png')?>" class="card-img" alt="Feature Three">
                        <p class="card-text">Now you can change your config or database just edit file .env and it can change your life</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 fixed-bottom">
      <div class="container">
        <p>&copy; 2024 <?= $title?>. All rights reserved.</p>
        <a href="#" class="text-white">Privacy Policy</a> |
        <a href="#" class="text-white">Terms of Service</a>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
