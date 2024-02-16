<style>
  body{
    background: linear-gradient(30deg,rgb(224, 188, 119),rgb(173, 134, 173),rgb(106, 118, 156))
  }
  .spc{
    margin-top: -16px;
  }
  .he{
    height: 80vh;
  }
</style>
@extends('layout')
@section('home')
    <div id="carouselExampleIndicators" class="carousel slide spc" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/2c/d4/31/susegado.jpg?w=1200&h=-1&s=1" class="d-block w-100 he" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://assets.gqindia.com/photos/618be836fc922dcd74d443a1/16:9/w_2560%2Cc_limit/top-image_01.jpg" class="d-block w-100 he" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/cc/93/0b/ocean2000-dining.jpg?w=600&h=-1&s=1 " class="d-block w-100 he" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <div class="py-4" style="margin-top:-24px; ">
      <div class="p-5 mb-4 bg-my rounded-3 ">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Restaurant Lists</h1>
          <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
          <a href="/list" class="btn btn-outline-secondary lead" type="button">See Restaurant Here</a>
        </div>
      </div>
  
      <footer class="pt-3 mt-4 text-dark border-top text-center ">
       Resto&copy;  2024 
      </footer>
    </div>
  </main>
  
@endsection