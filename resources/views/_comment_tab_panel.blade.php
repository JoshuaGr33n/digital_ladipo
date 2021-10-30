                                     
                                     @php    
 use App\Products;
 use App\User;
 use App\CommentReview;   
 @endphp


 
 
                                      @php $comments_reviews_count = CommentReview::where('product_id','=', session('product_id'))->count(); @endphp
                                       @if($comments_reviews_count>0)
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{$count = $comments_reviews_count }})</a>
                                        @else
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                        @endif



                                        <!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{ asset('public/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
<!--popper min js-->
<script src="{{ asset('public/assets/js/popper.js') }}"></script>
<!--bootstrap min js-->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<!--owl carousel min js-->
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<!--slick min js-->
<script src="{{ asset('public/assets/js/slick.min.js') }}"></script>
<!--magnific popup min js-->
<script src="{{ asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--jquery countdown min js-->
<script src="{{ asset('public/assets/js/jquery.countdown.js') }}"></script>
<!--jquery ui min js-->
<script src="{{ asset('public/assets/js/jquery.ui.js') }}"></script>
<!--jquery elevatezoom min js-->
<script src="{{ asset('public/assets/js/jquery.elevatezoom.js') }}"></script>
<!--isotope packaged min js-->
<script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>
<!--slinky menu js-->
<script src="{{ asset('public/assets/js/slinky.menu.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('public/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('public/assets/js/main.js') }}"></script>