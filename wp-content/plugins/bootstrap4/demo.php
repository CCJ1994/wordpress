<?php
function bootstrap_put_demo(){
  ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100"
        src="<?php echo esc_url( plugins_url( '_inc/img/demo1.jpeg', __FILE__ ) ); ?>"
        alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"
        src="<?php echo esc_url( plugins_url( '_inc/img/demo2.jpeg', __FILE__ ) ); ?>"
        alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"
        src="<?php echo esc_url( plugins_url( '_inc/img/demo3.jpeg', __FILE__ ) ); ?>"
        alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
}
?>