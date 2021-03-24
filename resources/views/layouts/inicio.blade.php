@extends('layouts.main')

@section('content')

<!-- Carousel wrapper -->
<div
  id="carouselBasicExample"
  class="carousel slide carousel-fade"
  data-mdb-ride="carousel"
>
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img
        src="https://i1.wp.com/www.enlacejudio.com/wp-content/uploads/2020/11/0.jpg?fit=1285%2C642&quality=80&strip=all&ssl=1"
        class="d-block w-100"
        alt="..."
        height="600"
      />
      <div class="carousel-caption d-none d-md-block">
        <h5>Aerolinea Aventura</h5>
        <p>La comodidad ante tus pies</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img
        src="https://www.peru.travel/Contenido/Atractivo/Imagen/pe/145/1.1/Principal/Machu%20Picchu.jpg"
        class="d-block w-100"
        alt="..."
        height="600"
      />
      <div class="carousel-caption d-none d-md-block">
        <h5>Destinos Increibles</h5>
        <p> Lugares desconocidos </p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img
        src="https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2016/08/03/1101/Hyatt-Regency-Cartagena-P016-Bay-View-with-Old-City.jpg/Hyatt-Regency-Cartagena-P016-Bay-View-with-Old-City.16x9.jpg"
        class="d-block w-100"
        alt="..."
        height="600"
      />
      <div class="carousel-caption d-none d-md-block">
        <h5>Viaja Seguro </h5>
        <p>Los mejores sitios accesibles para ti</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselBasicExample"
    data-mdb-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselBasicExample"
    data-mdb-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->

@stop