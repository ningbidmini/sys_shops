<?php
  /**
   * Model Templates
   */
  class templates
  {
    use database;
    use config;
    use security;
    private $tpl_active='shop-master';
    function __construct($param=array()){
      // echo "Load Template";
    }
    public function tpl_getname(){ return $this->tpl_active; }
    public function tpl_test(){
      echo "test Templates";
    }
    private function tpl_navbar($param=array()){
      $strhtml = '
        <!-- Navbar -->
        <nav class="fh5co-nav" role="navigation">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-xs-2">
                <div id="fh5co-logo"><a href="index.html">Shop.</a></div>
              </div>
              <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                  <li class="has-dropdown">
                    <a href="product.html">Shop</a>
                    <ul class="dropdown">
                      <li><a href="single.html">Single Shop</a></li>
                    </ul>
                  </li>
                  <li><a href="about.html">About</a></li>
                  <li class="has-dropdown">
                    <a href="services.html">Services</a>
                    <ul class="dropdown">
                      <li><a href="#">Web Design</a></li>
                      <li><a href="#">eCommerce</a></li>
                      <li><a href="#">Branding</a></li>
                      <li><a href="#">API</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </div>
              <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                <ul>
                  <li class="search">
                    <div class="input-group">
                        <input type="text" placeholder="Search..">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                        </span>
                      </div>
                  </li>
                  <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
                </ul>
              </div>
            </div>

          </div>
        </nav>
      ';
      return $strhtml;
    }
    private function tpl_header($param=array()){
      // var_dump($param['slide']);
      $strhtml = '
      <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url('.$param['slide'].');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
              <div class="display-t">
                <div class="display-tc animate-box" data-animate-effect="fadeIn">
                  <h1>Product</h1>
                  <h2>Free html5 templates by <a href="https://themewagon.com/theme_tag/free/" target="_blank">Themewagon</a></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      ';
      return $strhtml;
    }
    private function tpl_products($param=array()){
      $strhtml = '
      <div id="fh5co-product">
        <div class="container">
          <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
              <span>Cool Stuff</span>
              <h2>Products.</h2>
              <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-1.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Hauteville Concrete Rocking Chair</a></h3>
                  <span class="price">$350</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-2.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Pavilion Speaker</a></h3>
                  <span class="price">$600</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-3.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Ligomancer</a></h3>
                  <span class="price">$780</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-4.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Alato Cabinet</a></h3>
                  <span class="price">$800</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-5.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Earing Wireless</a></h3>
                  <span class="price">$100</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-6.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Sculptural Coffee Table</a></h3>
                  <span class="price">$960</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-7.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">The WW Chair</a></h3>
                  <span class="price">$540</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-8.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Himitsu Money Box</a></h3>
                  <span class="price">$55</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center animate-box">
              <div class="product">
                <div class="product-grid" style="background-image:url(images/product-9.jpg);">
                  <div class="inner">
                    <p>
                      <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                      <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                    </p>
                  </div>
                </div>
                <div class="desc">
                  <h3><a href="single.html">Ariane Prin</a></h3>
                  <span class="price">$99</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
      return $strhtml;
    }
    private function tpl_start($param=array()){
      $strhtml='
      <div id="fh5co-started">
        <div class="container">
          <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
              <h2>Newsletter</h2>
              <p>Just stay tune for our latest Product. Now you can subscribe</p>
            </div>
          </div>
          <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
              <form class="form-inline">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
      return $strhtml;
    }
    private function tpl_footer($param=array()){
      $strhtml = '
      <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
          <div class="row row-pb-md">
            <div class="col-md-4 fh5co-widget">
              <h3>Shop.</h3>
              <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
              <ul class="fh5co-footer-links">
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Meetups</a></li>
              </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
              <ul class="fh5co-footer-links">
                <li><a href="#">Shop</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Handbook</a></li>
                <li><a href="#">Held Desk</a></li>
              </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
              <ul class="fh5co-footer-links">
                <li><a href="#">Find Designers</a></li>
                <li><a href="#">Find Developers</a></li>
                <li><a href="#">Teams</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">API</a></li>
              </ul>
            </div>
          </div>

          <div class="row copyright">
            <div class="col-md-12 text-center">
              <p>
                <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
              </p>
              <p>
                <ul class="fh5co-social-icons">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
              </p>
            </div>
          </div>

        </div>
      </footer>
      ';
      return $strhtml;
    }
    public function tpl_home($param=array()){
      // var_dump($param);
      $strhtml = '
        <div class="fh5co-loader"></div>

        <div id="page">
          '.$this->tpl_navbar(array()).'
          '.$this->tpl_header(array('slide'=>$param['img']['slide'])).'
          '.$this->tpl_products(array()).'
          '.$this->tpl_start(array()).'

          '.$this->tpl_footer(array()).'
        </div>

        <div class="gototop js-top">
      		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
      	</div>

      ';
      return $strhtml;
    }
    // public function tpl_testdb(){
    //
    // }
  }

?>
