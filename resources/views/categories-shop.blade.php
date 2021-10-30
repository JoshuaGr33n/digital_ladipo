  <!-- <li><a href="#">Body Parts</a> -->
                                              @foreach($shopCategories as $shopCategories)
                                                    <ul>
                                                        <li><a href="shop-categories">{{$shopCategories->main_category}}</a></li>
                                                        <li><a href="shop-categories">Tyres</a></li>
                                                        <li><a href="shop-categories">Lightehings</a></li>
                                                        <li><a href="shop-categories"> Screens</a></li>
                                                        <li><a href="shop-categories">Wiper blades</a></li>
                                                    </ul>
                                              @endforeach 
 <!-- </li> -->

