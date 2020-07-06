{{-- Extends layout --}}
@extends('backend.layout.processor')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <!--begin::Dashboard-->
	<!--begin::Row-->
	<div class="row">

     	<div class="col-md-4">
			<!--begin::Mixed Widget 4-->
			<div class="card card-custom bg-radial-gradient-danger card-stretch card-shadowless gutter-b">
				<!--begin::Header-->
				<div class="card-header border-0 py-5">
					<h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
					
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body d-flex flex-column p-0">
					<!--begin::Chart-->
					<div id="kt_mixed_widget_6_chart" style="height: 20px"></div>
					<!--end::Chart-->
					<!--begin::Stats-->
					<div class="card-spacer bg-white card-rounded flex-grow-1">
						<!--begin::Row-->
						<div class="row m-0">
							<div class="col  py-6 mr-8">
								<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
								<div class="font-size-h4 font-weight-bolder">$650</div>
							</div>
							<div class="col  py-6">
								<div class="font-size-sm text-muted font-weight-bold">Commission</div>
								<div class="font-size-h4 font-weight-bolder">$233,600</div>
							</div>
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row m-0">
							<div class="col  py-6 mr-8">
								<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
								<div class="font-size-h4 font-weight-bolder">$29,004</div>
							</div>
							<div class="col  py-6">
								<div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
								<div class="font-size-h4 font-weight-bolder">$1,480,00</div>
							</div>
						</div>
						<!--end::Row-->
					</div>
					<!--end::Stats-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 4-->
		</div>

		<div class="col-md-4 ">
			<!--begin::List Widget 9-->
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Header-->
				<div class="card-header align-items-center border-0 mt-4">
					<h3 class="card-title align-items-start flex-column">
						<span class="font-weight-bolder text-dark">Recent Activities</span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
					</h3>
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ki ki-bold-more-ver"></i>
							</a>
							
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-4">
					<div class="timeline timeline-5 mt-3">
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">08:42</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-success icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Text-->
							<div class="timeline-content text-dark-50">Outlines of the recent activities that happened last weekend</div>
							<!--end::Text-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">3 hr</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-danger icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Content-->
							<div class="timeline-content d-flex">
								<span class="mr-4 font-weight-bolder text-dark-75">AEOL meeting with</span>
								<!--begin::Section-->
								<div class="d-flex align-items-start mt-n2">
									<!--begin::Symbol-->
									<a href="#" class="symbol symbol-35 symbol-light-success mr-2">
										<span class="symbol-label">
											<img src="assets/media/svg/avatars/004-boy-1.svg" class="h-75 align-self-end" alt="" />
										</span>
									</a>
									<!--end::Symbol-->
									<!--begin::Symbol-->
									<a href="#" class="symbol symbol-35 symbol-light-success">
										<span class="symbol-label">
											<img src="assets/media/svg/avatars/002-girl.svg" class="h-75 align-self-end" alt="" />
										</span>
									</a>
									<!--end::Symbol-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">14:37</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-info icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Desc-->
							<div class="timeline-content font-weight-bolder text-dark-75">Submit initial budget -
							<a href="#" class="text-primary">USD 700</a>.</div>
							<!--end::Desc-->
						</div>
						<!--end::Item-->
						
						
						<!--end::Item-->
					
						<!--end: Item-->
					
						<!--end::Item-->
					</div>
					<!--end: Items-->
				</div>
				<!--end: Card Body-->
			</div>
			<!--end: Card-->
			<!--end: List Widget 9-->
		</div>

		
		<!--begin::Stats Widget 11-->
		
			<div class="card card-custom card-stretch gutter-b">
				
				<div class="card-body d-flex flex-column p-0" style="position: relative;">
					<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
						<span class="symbol symbol-50 symbol-light-primary mr-2">
							<span class="symbol-label">
								<span class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:public/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
									</g>
									</svg><!--end::Svg Icon-->
								</span>
							</span>
						</span>
						<div class="d-flex flex-column text-right">
							<span class="text-dark-75 font-weight-bolder font-size-h3">100</span>
							<span class="text-muted font-weight-bold mt-2">Weekly Income</span>
						</div>
					</div>
					<div id="kt_stats_widget_12_chart" class="card-rounded-bottom" style="height: 150px; min-height: 150px;"><div id="apexchartsenan9g0u" class="apexcharts-canvas apexchartsenan9g0u apexcharts-theme-light" style="width: 328px; height: 150px;"><svg id="SvgjsSvg1649" width="328" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1651" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1650"><clipPath id="gridRectMaskenan9g0u"><rect id="SvgjsRect1654" width="335" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskenan9g0u"><rect id="SvgjsRect1655" width="332" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1663" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1664" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1666" class="apexcharts-grid"><g id="SvgjsG1667" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1669" x1="0" y1="0" x2="328" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1670" x1="0" y1="15" x2="328" y2="15" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1671" x1="0" y1="30" x2="328" y2="30" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1672" x1="0" y1="45" x2="328" y2="45" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1673" x1="0" y1="60" x2="328" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1674" x1="0" y1="75" x2="328" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1675" x1="0" y1="90" x2="328" y2="90" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1676" x1="0" y1="105" x2="328" y2="105" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1677" x1="0" y1="120" x2="328" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1678" x1="0" y1="135" x2="328" y2="135" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1679" x1="0" y1="150" x2="328" y2="150" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1668" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1681" x1="0" y1="150" x2="328" y2="150" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1680" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1657" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1658" class="apexcharts-series" seriesName="UserxViewer" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1661" d="M 0 150L 0 40.90909090909091C 19.133333333333333 40.90909090909091 35.53333333333334 40.90909090909091 54.66666666666667 40.90909090909091C 73.80000000000001 40.90909090909091 90.20000000000002 68.18181818181817 109.33333333333334 68.18181818181817C 128.46666666666667 68.18181818181817 144.86666666666667 68.18181818181817 164 68.18181818181817C 183.13333333333333 68.18181818181817 199.53333333333336 54.54545454545453 218.66666666666669 54.54545454545453C 237.8 54.54545454545453 254.20000000000005 54.54545454545453 273.33333333333337 54.54545454545453C 292.4666666666667 54.54545454545453 308.8666666666667 13.636363636363626 328 13.636363636363626C 328 13.636363636363626 328 13.636363636363626 328 150M 328 13.636363636363626z" fill="rgba(225,233,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskenan9g0u)" pathTo="M 0 150L 0 40.90909090909091C 19.133333333333333 40.90909090909091 35.53333333333334 40.90909090909091 54.66666666666667 40.90909090909091C 73.80000000000001 40.90909090909091 90.20000000000002 68.18181818181817 109.33333333333334 68.18181818181817C 128.46666666666667 68.18181818181817 144.86666666666667 68.18181818181817 164 68.18181818181817C 183.13333333333333 68.18181818181817 199.53333333333336 54.54545454545453 218.66666666666669 54.54545454545453C 237.8 54.54545454545453 254.20000000000005 54.54545454545453 273.33333333333337 54.54545454545453C 292.4666666666667 54.54545454545453 308.8666666666667 13.636363636363626 328 13.636363636363626C 328 13.636363636363626 328 13.636363636363626 328 150M 328 13.636363636363626z" pathFrom="M -1 150L -1 150L 54.66666666666667 150L 109.33333333333334 150L 164 150L 218.66666666666669 150L 273.33333333333337 150L 328 150"></path><path id="SvgjsPath1662" d="M 0 40.90909090909091C 19.133333333333333 40.90909090909091 35.53333333333334 40.90909090909091 54.66666666666667 40.90909090909091C 73.80000000000001 40.90909090909091 90.20000000000002 68.18181818181817 109.33333333333334 68.18181818181817C 128.46666666666667 68.18181818181817 144.86666666666667 68.18181818181817 164 68.18181818181817C 183.13333333333333 68.18181818181817 199.53333333333336 54.54545454545453 218.66666666666669 54.54545454545453C 237.8 54.54545454545453 254.20000000000005 54.54545454545453 273.33333333333337 54.54545454545453C 292.4666666666667 54.54545454545453 308.8666666666667 13.636363636363626 328 13.636363636363626" fill="none" fill-opacity="1" stroke="#6993ff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskenan9g0u)" pathTo="M 0 40.90909090909091C 19.133333333333333 40.90909090909091 35.53333333333334 40.90909090909091 54.66666666666667 40.90909090909091C 73.80000000000001 40.90909090909091 90.20000000000002 68.18181818181817 109.33333333333334 68.18181818181817C 128.46666666666667 68.18181818181817 144.86666666666667 68.18181818181817 164 68.18181818181817C 183.13333333333333 68.18181818181817 199.53333333333336 54.54545454545453 218.66666666666669 54.54545454545453C 237.8 54.54545454545453 254.20000000000005 54.54545454545453 273.33333333333337 54.54545454545453C 292.4666666666667 54.54545454545453 308.8666666666667 13.636363636363626 328 13.636363636363626" pathFrom="M -1 150L -1 150L 54.66666666666667 150L 109.33333333333334 150L 164 150L 218.66666666666669 150L 273.33333333333337 150L 328 150"></path><g id="SvgjsG1659" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1660" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1682" x1="0" y1="0" x2="328" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1683" x1="0" y1="0" x2="328" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1684" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1685" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1686" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1665" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1652" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
				<div class="resize-triggers"><div class="expand-trigger"><div style="width: 329px; height: 258px;"></div></div><div class="contract-trigger"></div></div></div>
			</div>
		
		<!--end::Stats Widget 11-->
			
		


    </div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row">
		<div class="col-xl-12">
			<!--begin::Base Table Widget 5-->
			<div class="card card-custom card-stretch card-shadowless gutter-b">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label font-weight-bolder text-dark">New Arrivals</span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
					</h3>
					<div class="card-toolbar">
						<ul class="nav nav-pills nav-pills-sm nav-dark-75">
							<li class="nav-item">
								<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_4_1">Month</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_4_2">Week</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_4_3">Day</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2 pb-0">
					<!--begin::Table-->
					<div class="table-responsive">
						<table class="table table-borderless table-vertical-center">
							<thead>
								<tr>
									<th class="p-0" style="width: 50px"></th>
									<th class="p-0" style="min-width: 150px"></th>
									<th class="p-0" style="min-width: 140px"></th>
									<th class="p-0" style="min-width: 110px"></th>
									<th class="p-0" style="min-width: 50px"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="py-5 pl-0">
										<div class="symbol symbol-50 symbol-light mr-2">
											<span class="symbol-label">
												<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
											</span>
										</div>
									</td>
									<td class="pl-0">
										<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top Authors</a>
										<span class="text-muted font-weight-bold d-block">Successful Fellas</span>
									</td>
									<td class="text-right">
										<span class="text-muted font-weight-500">ReactJs, HTML</span>
									</td>
									<td class="text-right">
										<span class="label label-lg label-light-primary label-inline">Approved</span>
									</td>
									<td class="text-right pr-0">
										<a href="#" class="btn btn-icon btn-light btn-sm">
											<span class="svg-icon svg-icon-md svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
								<tr>
									<td class="pl-0 py-5">
										<div class="symbol symbol-50 symbol-light mr-2">
											<span class="symbol-label">
												<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
											</span>
										</div>
									</td>
									<td class="pl-0">
										<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular Authors</a>
										<span class="text-muted font-weight-bold d-block">Most Successful</span>
									</td>
									<td class="text-right">
										<span class="text-muted font-weight-500">Python, MySQL</span>
									</td>
									<td class="text-right">
										<span class="label label-lg label-light-warning label-inline">In Progress</span>
									</td>
									<td class="text-right pr-0">
										<a href="#" class="btn btn-icon btn-light btn-sm">
											<span class="svg-icon svg-icon-md svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
								<tr>
									<td class="py-5 pl-0">
										<div class="symbol symbol-50 symbol-light mr-2">
											<span class="symbol-label">
												<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
											</span>
										</div>
									</td>
									<td class="pl-0">
										<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New Users</a>
										<span class="text-muted font-weight-bold d-block">Awesome Users</span>
									</td>
									<td class="text-right">
										<span class="text-muted font-weight-500">Laravel,Metronic</span>
									</td>
									<td class="text-right">
										<span class="label label-lg label-light-success label-inline">Success</span>
									</td>
									<td class="text-right pr-0">
										<a href="#" class="btn btn-icon btn-light btn-sm">
											<span class="svg-icon svg-icon-md svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
								<tr>
									<td class="py-5 pl-0">
										<div class="symbol symbol-50 symbol-light mr-2">
											<span class="symbol-label">
												<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
											</span>
										</div>
									</td>
									<td class="pl-0">
										<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active Customers</a>
										<span class="text-muted font-weight-bold d-block">Best Customers</span>
									</td>
									<td class="text-right">
										<span class="text-muted font-weight-500">AngularJS, C#</span>
									</td>
									<td class="text-right">
										<span class="label label-lg label-light-danger label-inline">Rejected</span>
									</td>
									<td class="text-right pr-0">
										<a href="#" class="btn btn-icon btn-light btn-sm">
											<span class="svg-icon svg-icon-md svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
								<tr>
									<td class="py-5 pl-0">
										<div class="symbol symbol-50 symbol-light mr-2">
											<span class="symbol-label">
												<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
											</span>
										</div>
									</td>
									<td class="pl-0">
										<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller Theme</a>
										<span class="text-muted font-weight-bold d-block">Amazing Templates</span>
									</td>
									<td class="text-right">
										<span class="text-muted font-weight-500">ReactJS, Ruby</span>
									</td>
									<td class="text-right">
										<span class="label label-lg label-light-warning label-inline">In Progress</span>
									</td>
									<td class="text-right pr-0">
										<a href="#" class="btn btn-icon btn-light btn-sm">
											<span class="svg-icon svg-icon-md svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--end::Tablet-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Base Table Widget 5-->
		</div>
	</div>
	<!--end::Row-->
	<!--begin::Row-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
    
@endsection
