<div>
    <section class="our-listing bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="breadcrumb_content style2 mb0-991">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – List View</li>
						</ol>
						<h2 class="breadcrumb_title">Listagem de automóveis
						</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="listing_list_style mb20-xsd tal-991">
						
					</div>
					<div class="dn db-991 mt30 mb0">
						<div id="main2">
							<span id="open2" class="flaticon-filter-results-button filter_open_btn style2"> Show Filter</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xl-4">
					@livewire('automoveis.apoio.filtro', ['marcas' => $marcas, 'categorias' => $categorias])
				</div>
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="grid_list_search_result">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd">
									<p>9 Search results</p>
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
								<div class="right_area text-right tac-xsd">
									<ul>
										<li class="list-inline-item"><span class="stts">Status:</span>
											<select class="selectpicker show-tick">
												<option>All Status</option>
												<option>Recent</option>
												<option>Old Review</option>
											</select>
										</li>
										<li class="list-inline-item"><span class="shrtby">Sort by:</span>
											<select class="selectpicker show-tick">
												<option>Featured First</option>
												<option>Featured 2nd</option>
												<option>Featured 3rd</option>
												<option>Featured 4th</option>
												<option>Featured 5th</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@if ($paginators)
						@foreach ($paginators as $item)
							@livewire('automoveis.apoio.CardLista', ['item' => $item], key($item->id))
						@endforeach
					@endif
				
						
						<div class="col-lg-12 mt20">
							{{-- @livewire('automoveis.apoio.paginacao', ['paginator' => $paginators]) --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
