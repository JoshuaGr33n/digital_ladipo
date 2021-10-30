                                       
@php    
 use App\Products;
 use App\User;
 use App\CommentReview;   
 @endphp
                                        @php  
                                        
                                        $comments_reviews = CommentReview::where('product_id','=', session('product_id'))->orderBy('created_at','DESC')->paginate(10);
                                        $comments_reviews_count = CommentReview::where('product_id','=', session('product_id'))->count();

                                        $product = Products::where('id','=', session('product_id'))->first();

                                        @endphp
                                        @if($comments_reviews_count>1)
                                        <h2> {{$count = $comments_reviews_count }} reviews for {{$product->name}}</h2>
                                        @elseif($comments_reviews_count==1)
                                        <h2> {{$count = $comments_reviews_count }} review for {{$product->name}}</h2>
                                        @else
                                        <h2> No reviews for {{$product->name}}</h2>
                                        @endif
                                        @foreach($comments_reviews as $comment_review)
                                        @php $user = User::where('id',$comment_review->user_id)->first(); @endphp
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="{{ asset('public/assets/img/blog/comment2.jpg') }}" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <!-- <div class="star_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        </ul>
                                                    </div> -->
                                                    <p><strong>{{$user->fname}} {{$user->lname}} </strong>- {{  date("d M Y", strtotime($comment_review->created_at)) }}</p>
                                                    <span>{{$comment_review->comment}}</span>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                   