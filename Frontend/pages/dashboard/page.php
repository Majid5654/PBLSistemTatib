<div class="dashboard">
    
    <!-- Learning Progress -->
    <div class="prog-status">
        <div class="header">
            <h4>Learning Progress</h4>
            <div class="tabs">
                <a href="#" class="active">1Y</a>
                <a href="#">6M</a>
                <a href="#">3M</a>
            </div>
        </div>

        <div class="details">
            <div class="item">
                <h2>3.45</h2>
                <p>Current GPA</p>
            </div>
            <div class="separator"></div>
            <div class="item">
                <h2>4.78</h2>
                <p>Class Average GPA</p>
            </div>
        </div>

        <canvas class="prog-chart"></canvas>
    </div>

    <!-- Popular Section -->
    <div class="popular">
        <div class="header">
            <h4>Popular</h4>
            <a href="#"># Data</a>
        </div>
        <img src="assets/podcast.jpg" alt="Podcast Image">
        <div class="audio">
            <i class='bx bx-podcast'></i>
            <a href="#">Podcast: Mastering Data Visualization</a>
        </div>
        <p>Learn to create compelling visualizations with data.</p>
        <div class="listen">
            <div class="author">
                <img src="assets/profile.png" alt="Author Profile">
                <div>
                    <a href="#">Alex</a>
                    <p>Data Analyst</p>
                </div>
            </div>
            <button>Listen <i class='bx bx-right-arrow-alt'></i></button>
        </div>
    </div>

    <!-- Upcoming Section -->
    <div class="upcoming">
        <div class="header">
            <h4>You may like it</h4>
            <a href="#">July <i class='bx bx-chevron-down'></i></a>
        </div>

        <div class="dates">
            <div class="item">
                <h5>Mo</h5>
                <a href="#">12</a>
            </div>
            <div class="item active">
                <h5>Tu</h5>
                <a href="#">13</a>
            </div>
            <div class="item">
                <h5>We</h5>
                <a href="#">14</a>
            </div>
            <div class="item">
                <h5>Th</h5>
                <a href="#">15</a>
            </div>
            <div class="item">
                <h5>Fr</h5>
                <a href="#">16</a>
            </div>
            <div class="item">
                <h5>Sa</h5>
                <a href="#">17</a>
            </div>
            <div class="item">
                <h5>Su</h5>
                <a href="#">18</a>
            </div>
        </div>

        <div class="events">
            <div class="item">
                <div>
                    <i class='bx bx-time'></i>
                    <div class="event-info">
                        <a href="#">Data Science</a>
                        <p>10:00-11:30</p>
                    </div>
                </div>
                <i class='bx bx-dots-horizontal-rounded'></i>
            </div>
            <div class="item">
                <div>
                    <i class='bx bx-time'></i>
                    <div class="event-info">
                        <a href="#">Machine Learning</a>
                        <p>13:30-15:00</p>
                    </div>
                </div>
                <i class='bx bx-dots-horizontal-rounded'></i>
            </div>
            <div class="item">
                <div>
                    <i class='bx bx-time'></i>
                    <div class="event-info">
                        <a href="#">Beginner Python</a>
                        <p>11:30-13:00</p>
                    </div>
                </div>
                <i class='bx bx-dots-horizontal-rounded'></i>
            </div>
            <div class="item">
                <div>
                    <i class='bx bx-time'></i>
                    <div class="event-info">
                        <a href="#">Introduction to SQL</a>
                        <p>10:00-11:30</p>
                    </div>
                </div>
                <i class='bx bx-dots-horizontal-rounded'></i>
            </div>
        </div>
    </div>

    <!-- New Content Section -->
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="img/green.jpg" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
          <h1 class="display-1 fw-bolder text-capitalize">The Aurora Tours</h1>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="https://images.unsplash.com/photo-1516466723877-e4ec1d736c8a?fit=crop&w=2134&q=100" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5">The season has arrived</p>
          <p class="display-1 fw-bolder text-capitalize">3 available tours</p>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="https://images.unsplash.com/photo-1612686635542-2244ed9f8ddc?fit=crop&w=2070&q=100" class="d-block w-100 c-img" alt="Slide 3">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5">Destination activities</p>
          <p class="display-1 fw-bolder text-capitalize">Go glacier hiking</p>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>