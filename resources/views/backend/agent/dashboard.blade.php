{{-- Extends layout --}}
@extends('backend.layout.agent')

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
						   <div class="col py-6 mr-8">
							   <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
							   <div class="font-size-h4 font-weight-bolder">$650</div>
						   </div>
						   <div class="col py-6">
							   <div class="font-size-sm text-muted font-weight-bold">Commission</div>
							   <div class="font-size-h4 font-weight-bolder">$233,600</div>
						   </div>
					   </div>
					   <!--end::Row-->
					   <!--begin::Row-->
					   <div class="row m-0">
						   <div class="col py-6 mr-8">
							   <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
							   <div class="font-size-h4 font-weight-bolder">$29,004</div>
						   </div>
						   <div class="col py-6">
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

	   <div class="col-md-4">
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Body-->
				<div class="card-body d-flex flex-column p-0" style="position: relative;">
					<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h5">Weekly Sales</a>
							<span class="text-muted font-weight-bold mt-2">Your Weekly Sales Chart</span>
						</div>
						<span class="symbol symbol-light-success symbol-45">
							<span class="symbol-label font-weight-bolder font-size-h6">+57</span>
						</span>
					</div>
					<div id="kt_stats_widget_7_chart" class="card-rounded-bottom" style="height: 150px; min-height: 150px;"><div id="apexcharts1262jinni" class="apexcharts-canvas apexcharts1262jinni apexcharts-theme-light" style="width: 328px; height: 150px;"><svg id="SvgjsSvg1311" width="328" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1313" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1312"><clipPath id="gridRectMask1262jinni"><rect id="SvgjsRect1316" width="335" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask1262jinni"><rect id="SvgjsRect1317" width="332" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1324" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1325" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1327" class="apexcharts-grid"><g id="SvgjsG1328" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1330" x1="0" y1="0" x2="328" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1331" x1="0" y1="25" x2="328" y2="25" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1332" x1="0" y1="50" x2="328" y2="50" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1333" x1="0" y1="75" x2="328" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1334" x1="0" y1="100" x2="328" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1335" x1="0" y1="125" x2="328" y2="125" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1336" x1="0" y1="150" x2="328" y2="150" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1329" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1338" x1="0" y1="150" x2="328" y2="150" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1337" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1318" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1319" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1322" d="M 0 150L 0 125C 28.7 125 53.3 87.5 82 87.5C 110.7 87.5 135.3 120 164 120C 192.7 120 217.3 25 246 25C 274.7 25 299.3 100 328 100C 328 100 328 100 328 150M 328 100z" fill="rgba(201,247,245,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask1262jinni)" pathTo="M 0 150L 0 125C 28.7 125 53.3 87.5 82 87.5C 110.7 87.5 135.3 120 164 120C 192.7 120 217.3 25 246 25C 274.7 25 299.3 100 328 100C 328 100 328 100 328 150M 328 100z" pathFrom="M -1 200L -1 200L 82 200L 164 200L 246 200L 328 200"></path><path id="SvgjsPath1323" d="M 0 125C 28.7 125 53.3 87.5 82 87.5C 110.7 87.5 135.3 120 164 120C 192.7 120 217.3 25 246 25C 274.7 25 299.3 100 328 100" fill="none" fill-opacity="1" stroke="#1bc5bd" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask1262jinni)" pathTo="M 0 125C 28.7 125 53.3 87.5 82 87.5C 110.7 87.5 135.3 120 164 120C 192.7 120 217.3 25 246 25C 274.7 25 299.3 100 328 100" pathFrom="M -1 200L -1 200L 82 200L 164 200L 246 200L 328 200"></path><g id="SvgjsG1320" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1344" r="0" cx="82" cy="87.5" class="apexcharts-marker wxotneyc2 no-pointer-events" stroke="#1bc5bd" fill="#c9f7f5" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1321" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1339" x1="0" y1="0" x2="328" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1340" x1="0" y1="0" x2="328" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1341" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1342" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1343" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1326" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1314" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 93px; top: 90.5px;"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">Mar</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(201, 247, 245);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Net Profit: </span><span class="apexcharts-tooltip-text-value">$45 thousands</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 60.0391px; top: 152px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px; min-width: 24.9844px;">Mar</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
				<div class="resize-triggers"><div class="expand-trigger"><div style="width: 328px; height: 253px;"></div></div><div class="contract-trigger"></div></div></div>
				<!--end::Body-->
			</div>
		</div>
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
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
