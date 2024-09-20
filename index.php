<!-- jik abelum login t idak bisa akses -->
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
} else {
    echo "Welcome " . $_SESSION['login'];
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS Manual -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font -->
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,100;1,200&display=swap"
      rel="stylesheet"
    />

    <!-- Feathers Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Portofolio Ardya</title>
  </head>
  <body id="home">
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top"
    >
      <div class="container">
        <a class="navbar-brand" href="#"
          ><span class="judul">KIZARU</span><span>ZERO</span></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#projects">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar Ends -->

    <!-- Jumbotron -->
    <section class="jumbotron">
      <div class="container text-center">
        <img
          src="img/1.jpg"
          alt="Ardya"
          class="img-thumbnail rounded-circle"
          width="200"
        />
        <h1 class="display-4 fw-semibold">KIZARU<span>ZERO</span></h1>
        <p class="lead">Students | Web Developer</p>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L40,138.7C80,149,160,171,240,186.7C320,203,400,213,480,192C560,171,640,117,720,106.7C800,96,880,128,960,154.7C1040,181,1120,203,1200,186.7C1280,171,1360,117,1400,90.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Jumbotron Ends -->

    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col"><h2 class="fw-bold">ABOUT ME</h2></div>
        </div>
        <div class="row text-center justify-content-center fs-5">
          <div class="col-md-4">
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam
              quis velit omnis aliquam ut accusantium!. Lorem ipsum dolor sit,
              amet consectetur adipisicing elit. Quo aspernatur necessitatibus
              accusamus? Perferendis ratione laboriosam modi rerum
              necessitatibus blanditiis alias?
            </p>
          </div>
          <div class="col-md-4">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex ut
              pariatur quidem, eos sit dolorem nobis quae ad labore
              voluptatibus. Lorem ipsum dolor sit, amet consectetur adipisicing
              elit. Est eius eligendi optio, explicabo aut nulla voluptate
              maxime provident, doloremque, ea exercitationem velit esse maiores
              vitae!
            </p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#e2edff"
          fill-opacity="1"
          d="M0,224L40,202.7C80,181,160,139,240,144C320,149,400,203,480,229.3C560,256,640,256,720,229.3C800,203,880,149,960,128C1040,107,1120,117,1200,112C1280,107,1360,85,1400,74.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- About Ends -->

    <!-- Projects -->
    <section class="projects" id="projects">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2 class="fw-bold mb-3">MY PROJECT</h2>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/2.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/3.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/5.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffff"
          fill-opacity="1"
          d="M0,160L34.3,170.7C68.6,181,137,203,206,208C274.3,213,343,203,411,192C480,181,549,171,617,176C685.7,181,754,203,823,192C891.4,181,960,139,1029,138.7C1097.1,139,1166,181,1234,192C1302.9,203,1371,181,1406,170.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>

    <!-- Contact Me -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="fw-bold text-center mb-3">CONTACT ME</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  aria-describedby="bane"
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  aria-describedby="email"
                />
              </div>
              <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mt-1 mb-3">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <!-- Footer Start -->
    <footer class="bg-primary text-white">
      <div class="container">
        <div class="row text-center py-2">
          <div class="col fw-bold">
            <h3>KIZARU<span>ZERO</span></h3>
          </div>
          <div class="col fw-semibold">
            CONTENT
            <div class="row text-center fw-normal">
              <a href="#home" class="text-white text-decoration-none">Home</a>
              <a href="#about" class="text-white text-decoration-none">About</a>
              <a href="#projects" class="text-white text-decoration-none"
                >Project</a
              >
              <a href="#contact" class="text-white text-decoration-none"
                >Contact</a
              >
            </div>
          </div>
          <div class="col fw-semibold">
            CONTACT
            <div class="row text-center fw-normal">
              <p>ardyapusaka@gmail.com</p>
              <p>+6285155448633</p>
            </div>
          </div>
          <div class="col fw-semibold">SOCIAL MEDIA</div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Footer End -->
    <!-- Feathers Icons -->
    <script>
      feather.replace();
    </script>
    <!-- Projects Ends -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
