Vue.component('nav-bar', {
  template: `
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark justify-content-between">
			<a class="navbar-brand" href="#" data-target="#main-content" data-slide-to="0"><img src="img/logo2.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Amazing View</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-2">
					<li class="nav-item active"><a class="nav-link" href="#" data-target="#main-content" data-slide-to="0"><b>Home</b><span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-target="#main-content" data-slide-to="1">Pricing</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-target="#main-content" data-slide-to="2">Activities</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-target="#main-content" data-slide-to="3">About</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-target="#main-content" data-slide-to="4">Contact us!</a></li>
				</ul>
				<a class="btn btn-success m-2" href="#" data-target="#main-content" data-slide-to="1">Book now!</a>
			</div>

			<div class="collapse navbar-collapse justify-content-end text-white" id="navbarNav">
				<b><a id="navbar-sign-in-label">Already got a reservation? sign in to check:</a></b>
				<a class="btn btn-primary m-2" href="#" id="navbar-sign-in" data-target="#main-content" data-slide-to="5">Sign in</a>
				<a class="btn btn btn-success m-2" id="navbar-dashboard" href="#" data-target="#main-content" data-slide-to="5">Dashboard</a>
				<a class="btn btn btn-outline-primary m-2" id="navbar-sign-out">Sign out</a>
			</div>
	</nav>`
})
Vue.component('web-footer', {
  template: `
  <div class="container-fluid bg-dark sticky-bottom">
    <div class="container text-center text-white py-1">
      <b>&copy2020 Amazing View, Mountain and Farm Resort.</b>
    </div>
  </div>`
})
Vue.component('home-section', {
  template:`
  <div class="carousel-item active">
    <section id="home" class="">
      <div class="h1 font-weight-bold title">AMAZING VIEW</div>
      <div class="h6 font-weight-bold">MOUNTAIN RESORT</div><hr>
      <p class="h5 font-weight-normal">Nestled in a high point overlooking Mabitac Valley and Sierra Madre mountain, it is the perfect backdrop for your unforgibable relaxing holidays!</p><hr>
      <p class=""><a href="#" class="btn btn-lg btn-secondary">Learn more</a>
      </p>
    </section>
  </div>`
})
var app = new Vue({
  el: '#main-vue'
})
