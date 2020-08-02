<footer class="footer site-footer mt-auto py-3">
  <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>MTS ISHLAHUL MASALIK</h6>
            <ul class="footer-links">
              <li>Alamat : Jl.Proklamasi, No. 35, Ds. Tebluru, Kec. Solokuro, Kab. Lamongan, Prov. Jawa Timur, Kode Pos:62265</li>
              <!-- <li>Telpon :</li> -->
              <!-- <li><a href="/Home/sambutan">Sambutan Kepala</a></li> -->
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>PROFIL SEKOLAH</h6>
            <ul class="footer-links">
              <li><a href="/Home/sejarah">Sejarah Sekolah</a></li>
              <li><a href="/Home/profil">Tentang Kami</a></li>
              <li><a href="/Home/sambutan">Sambutan Kepala</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Blogs</h6>
            <ul class="footer-links">
              <li><a href="/Home/berita">Berita</a></li>
              <li><a href="/Home/literasi">Literasi</a></li>
              <li><a href="/Home/galeri">Galeri</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 || MTs Ishlahul Masalik
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fab1 fab fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab1 fab fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fab1 fab fa-instagram"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab1 fab fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
  </div>
</footer>

<script src="<?php echo base_url('assets/bootstrap/dist/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
      } else {
          navbar.classList.remove("sticky");
      }
    }
    function myFunction1() {
      var x = document.getElementById("custom-nav");
      if (x.className === "nav-bar") {
          x.className += " responsive";
      } else {
          x.className = "nav-bar";
      }
    }

    $( document ).ready(function() {
      $('#tenaga-pendidik-slider').owlCarousel({
            loop:true,
            nav:true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 2
              },
              1000: {
                items: 3
              }
            },
            dots:false,
            margin:00,
            navText:[
              '<i class="fa fa-angle-left" aria-hidden="true"></i>',
              '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: "#slider-tools-1"
        });

        $('#alumni-slider').owlCarousel({
              loop:true,
              nav:true,
              responsive: {
                0: {
                  items: 1
                },
                600: {
                  items: 2
                },
                1000: {
                  items: 2
                }
              },
              dots:false,
              margin:20,
              navText:[
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
              ],
              navContainer: "#slider-tools-2"
          });

          $('#galeri-slider').owlCarousel({
              loop:true,
              nav:true,
              responsive: {
                0: {
                  items: 1
                },
                600: {
                  items: 2
                },
                1000: {
                  items: 3
                }
              },
              dots:false,
              margin:20,
              navText:[
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
              ],
              navContainer: "#slider-tools-3"
          });
    });
</script>
