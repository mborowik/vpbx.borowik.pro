@extends('layouts.app')

@section('title', 'Page Title')



@section('content')




					<!-- Search results -->
					<div class="row">
						<div class="col-12 col-lg-8">
							<div class="card card-body">
								<span class="text-muted font-size-sm">About {{count($results)}} results (0.34 seconds)</span>

								<hr>

								<ul class="media-list mb-3">


                                    @forelse ($results as $result)

                                    
			                    	<li class="media">
			                    		<div class="media-body">
				                    		<h6 class="media-title">{{$result->name}}  </h6>
				                    		<ul class="list-inline list-inline-dotted text-muted mb-2">
				                    			<li class="list-inline-item">{{class_basename($result)}}</li>
				                    		</ul>

				                    		Or kind rest bred with am shed then. In raptures building an bringing be. Elderly is detract tedious assured private so to visited. Do travelling companions contrasted it. Mistress strongly remember up to. Ham him compass you proceed calling detract. Better of always...
			                    		</div>
			                    	</li>


                                  
                                      @empty
                                          Brak danych
                                      @endforelse
                                
                                  



			                    


			                    </ul>

			                    <ul class="pagination pagination-flat align-self-center flex-wrap my-2">
									<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left8"></i></a></li>
									<li class="page-item active"><a href="#" class="page-link">1</a></li>
									<li class="page-item"><a href="#" class="page-link">2</a></li>
									<li class="page-item align-self-center"><span class="mx-2">...</span></li>
									<li class="page-item"><a href="#" class="page-link">58</a></li>
									<li class="page-item"><a href="#" class="page-link">59</a></li>
									<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right8"></i></a></li>
								</ul>
							</div>
						</div>

						<div class="col-12 col-lg-4">
			            	<div class="card card-body">
			            		<div class="mb-3">
			                		<a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a>
			            		</div>

			                	<h5 class="font-weight-semibold">Limitless UI kit</h5>
			                	<p class="mb-3">In post mean shot ye. There out her child sir his lived. Design at uneasy me season of branch on praise esteem. Abilities discourse believing consisted remaining to no. Mistaken no me denoting dashwood as screened. Whence or esteem easily he on. Dissuade husbands at of no if disposal. Oh he decisively impression attachment friendship so if everything.</p>

			                	<ul class="list mb-3">
			                		<li><span class="font-weight-semibold">Author:</span> <a href="#">Eugene Kopyov</a></li>
			                		<li><span class="font-weight-semibold">Time spent:</span> 8 months</li>
			                		<li><span class="font-weight-semibold">Client base:</span> <a href="#">16,893 (2015)</a></li>
			                		<li><span class="font-weight-semibold">Pages:</span> 1200+</li>
			                		<li><span class="font-weight-semibold">Latest update:</span> June 1, 2015</li>
			                	</ul>

			                	<div class="pt-3 mb-3 border-top">
			                    	<h6 class="mb-0">Photos</h6>
			                    	<div class="row">
				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>

				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>

				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>
			                    	</div>
			                	</div>

			                	<div>
			                    	<h6 class="mb-0">Videos</h6>
			                    	<div class="row">
				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>

				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>

				                    	<div class="col-sm-4">
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    		<div class="mt-3"><a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded" alt=""></a></div>
				                    	</div>
			                    	</div>
			                	</div>
			            	</div>
						</div>
					</div>
					<!-- /search results -->

                    <div class="d-flex justify-content-center">
                        {!! $results->links() !!}
                    </div>
                    
                    @endsection
