                              <form action="{{url('search_results')}}" method="get">
                                    <div class="search_box">
                                        <input placeholder="Search entire store here ..." type="text" name="search" id="search" autocomplete="off">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                       
                                     
                                    </div>
                                    <div id="list">
                                      </div>
                                </form>

                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
                                  </script>
                                 <script type="text/javascript">
                                        var route = "{{ url('autocomplete-search') }}";

                                        $('#search').typeahead({
                                           source: function (query, process) {
                                    return $.get(route, {
                                       query: query
                                            }, function (data) {
                                            return process(data);
                                           });
                                              }
                                      });
                                       </script>