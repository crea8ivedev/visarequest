{{-- Extends layout --}}
@extends('backend.layout.processor')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <!--begin::Dashboard-->
	<!--begin::Row-->
	<div class="row">

     	<div class="col-xl-4">
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
							<div class="col px-8 py-6 mr-8">
								<div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
								<div class="font-size-h4 font-weight-bolder">$650</div>
							</div>
							<div class="col px-8 py-6">
								<div class="font-size-sm text-muted font-weight-bold">Commission</div>
								<div class="font-size-h4 font-weight-bolder">$233,600</div>
							</div>
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row m-0">
							<div class="col px-8 py-6 mr-8">
								<div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
								<div class="font-size-h4 font-weight-bolder">$29,004</div>
							</div>
							<div class="col px-8 py-6">
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

		<div class="col-lg-4 ">
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
							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
								<!--begin::Navigation-->
								<ul class="navi navi-hover">
									<li class="navi-header font-weight-bold py-4">
										<span class="font-size-lg">Choose Label:</span>
										<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
									</li>
									<li class="navi-separator mb-3 opacity-70"></li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-text">
												<span class="label label-xl label-inline label-light-success">Customer</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-text">
												<span class="label label-xl label-inline label-light-danger">Partner</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-text">
												<span class="label label-xl label-inline label-light-warning">Suplier</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-text">
												<span class="label label-xl label-inline label-light-primary">Member</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-text">
												<span class="label label-xl label-inline label-light-dark">Staff</span>
											</span>
										</a>
									</li>
									<li class="navi-separator mt-3 opacity-70"></li>
									<li class="navi-footer py-4">
										<a class="btn btn-clean font-weight-bold btn-sm" href="#">
										<i class="ki ki-plus icon-sm"></i>Add new</a>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
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
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">16:50</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-danger icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Text-->
							<div class="timeline-content text-dark-50">Stakeholder meeting scheduling.</div>
							<!--end::Text-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">17:30</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-success icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Text-->
							<div class="timeline-content text-dark-50">Project scoping &amp; estimations with stakeholders.</div>
							<!--end::Text-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">21:03</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-warning icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Desc-->
							<div class="timeline-content font-weight-bolder text-dark-75">New order placed
							<a href="#" class="text-primary">#XF-2356</a>.</div>
							<!--end::Desc-->
						</div>
						<!--end::Item-->
						<!--begin: Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">21:07</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-danger icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Text-->
							<div class="timeline-content text-dark-50">Company BBQ to celebrate the last quater achievements and goals.</div>
							<!--end::Text-->
						</div>
						<!--end: Item-->
						<!--begin::Item-->
						<div class="timeline-item align-items-start">
							<!--begin::Label-->
							<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">20:30</div>
							<!--end::Label-->
							<!--begin::Badge-->
							<div class="timeline-badge">
								<i class="fa fa-genderless text-info icon-xxl"></i>
							</div>
							<!--end::Badge-->
							<!--begin::Text-->
							<div class="timeline-content text-dark-50">Marketing campaign planning with customer.</div>
							<!--end::Text-->
						</div>
						<!--end::Item-->
					</div>
					<!--end: Items-->
				</div>
				<!--end: Card Body-->
			</div>
			<!--end: Card-->
			<!--end: List Widget 9-->
		</div>

		<div class="col-lg-4 row">
			<!--begin::Stats Widget 11-->
			<div class="card card-custom card-stretch card-stretch-half gutter-b">
				<!--begin::Body-->
				<div class="card-body p-0" style="position: relative;">
					<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
						<span class="symbol symbol-50 symbol-light-success mr-2">
							<span class="symbol-label">
								<span class="svg-icon svg-icon-xl svg-icon-success">
									<!--begin::Svg Icon | path:../../../../../metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
						</span>
						<div class="d-flex flex-column text-right">
							<span class="text-dark-75 font-weight-bolder font-size-h3">750$</span>
							<span class="text-muted font-weight-bold mt-2">Weekly Income</span>
						</div>
					</div>
					<div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px; min-height: 150px;"><div id="apexchartsbc13ex1s" class="apexcharts-canvas apexchartsbc13ex1s apexcharts-theme-light" style="width: 413px; height: 150px;"><svg id="SvgjsSvg1735" width="413" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1737" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1736"><clipPath id="gridRectMaskbc13ex1s"><rect id="SvgjsRect1740" width="420" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskbc13ex1s"><rect id="SvgjsRect1741" width="417" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1749" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1750" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1752" class="apexcharts-grid"><g id="SvgjsG1753" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1755" x1="0" y1="0" x2="413" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1756" x1="0" y1="15" x2="413" y2="15" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1757" x1="0" y1="30" x2="413" y2="30" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1758" x1="0" y1="45" x2="413" y2="45" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1759" x1="0" y1="60" x2="413" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1760" x1="0" y1="75" x2="413" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1761" x1="0" y1="90" x2="413" y2="90" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1762" x1="0" y1="105" x2="413" y2="105" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1763" x1="0" y1="120" x2="413" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1764" x1="0" y1="135" x2="413" y2="135" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1765" x1="0" y1="150" x2="413" y2="150" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1754" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1767" x1="0" y1="150" x2="413" y2="150" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1766" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1743" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1744" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1747" d="M 0 150L 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626C 413 13.636363636363626 413 13.636363636363626 413 150M 413 13.636363636363626z" fill="rgba(201,247,245,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbc13ex1s)" pathTo="M 0 150L 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626C 413 13.636363636363626 413 13.636363636363626 413 150M 413 13.636363636363626z" pathFrom="M -1 150L -1 150L 68.83333333333333 150L 137.66666666666666 150L 206.5 150L 275.3333333333333 150L 344.16666666666663 150L 413 150"></path><path id="SvgjsPath1748" d="M 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626" fill="none" fill-opacity="1" stroke="#1bc5bd" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbc13ex1s)" pathTo="M 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626" pathFrom="M -1 150L -1 150L 68.83333333333333 150L 137.66666666666666 150L 206.5 150L 275.3333333333333 150L 344.16666666666663 150L 413 150"></path><g id="SvgjsG1745" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1773" r="0" cx="0" cy="0" class="apexcharts-marker wd7kiwh1s no-pointer-events" stroke="#1bc5bd" fill="#c9f7f5" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1746" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1768" x1="0" y1="0" x2="413" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1769" x1="0" y1="0" x2="413" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1770" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1771" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1772" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1751" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1738" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(201, 247, 245);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
				<div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 258px;"></div></div><div class="contract-trigger"></div></div></div>
				<!--end::Body-->
			</div>
			<!--end::Stats Widget 11-->
			<!--begin::Stats Widget 12-->
			<div class="card card-custom card-stretch card-stretch-half gutter-b">
				<!--begin::Body-->
				<div class="card-body p-0" style="position: relative;">
					<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
						<span class="symbol symbol-50 symbol-light-primary mr-2">
							<span class="symbol-label">
								<span class="svg-icon svg-icon-xl svg-icon-primary">
									<!--begin::Svg Icon | path:../../../../../metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
						</span>
						<div class="d-flex flex-column text-right">
							<span class="text-dark-75 font-weight-bolder font-size-h3">+6,5K</span>
							<span class="text-muted font-weight-bold mt-2">New Users</span>
						</div>
					</div>
					<div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px; min-height: 150px;"><div id="apexchartsdhiwihhtl" class="apexcharts-canvas apexchartsdhiwihhtl apexcharts-theme-light" style="width: 413px; height: 150px;"><svg id="SvgjsSvg1775" width="413" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1777" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1776"><clipPath id="gridRectMaskdhiwihhtl"><rect id="SvgjsRect1780" width="420" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskdhiwihhtl"><rect id="SvgjsRect1781" width="417" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1789" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1790" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1792" class="apexcharts-grid"><g id="SvgjsG1793" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1795" x1="0" y1="0" x2="413" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1796" x1="0" y1="15" x2="413" y2="15" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1797" x1="0" y1="30" x2="413" y2="30" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1798" x1="0" y1="45" x2="413" y2="45" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1799" x1="0" y1="60" x2="413" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1800" x1="0" y1="75" x2="413" y2="75" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1801" x1="0" y1="90" x2="413" y2="90" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1802" x1="0" y1="105" x2="413" y2="105" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1803" x1="0" y1="120" x2="413" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1804" x1="0" y1="135" x2="413" y2="135" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1805" x1="0" y1="150" x2="413" y2="150" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1794" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1807" x1="0" y1="150" x2="413" y2="150" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1806" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1783" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1784" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1787" d="M 0 150L 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626C 413 13.636363636363626 413 13.636363636363626 413 150M 413 13.636363636363626z" fill="rgba(225,240,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskdhiwihhtl)" pathTo="M 0 150L 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626C 413 13.636363636363626 413 13.636363636363626 413 150M 413 13.636363636363626z" pathFrom="M -1 150L -1 150L 68.83333333333333 150L 137.66666666666666 150L 206.5 150L 275.3333333333333 150L 344.16666666666663 150L 413 150"></path><path id="SvgjsPath1788" d="M 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626" fill="none" fill-opacity="1" stroke="#3699ff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskdhiwihhtl)" pathTo="M 0 40.90909090909091C 24.091666666666665 40.90909090909091 44.74166666666666 40.90909090909091 68.83333333333333 40.90909090909091C 92.925 40.90909090909091 113.57499999999999 68.18181818181817 137.66666666666666 68.18181818181817C 161.75833333333333 68.18181818181817 182.40833333333333 68.18181818181817 206.5 68.18181818181817C 230.59166666666667 68.18181818181817 251.24166666666665 54.54545454545453 275.3333333333333 54.54545454545453C 299.42499999999995 54.54545454545453 320.075 54.54545454545453 344.16666666666663 54.54545454545453C 368.2583333333333 54.54545454545453 388.9083333333333 13.636363636363626 413 13.636363636363626" pathFrom="M -1 150L -1 150L 68.83333333333333 150L 137.66666666666666 150L 206.5 150L 275.3333333333333 150L 344.16666666666663 150L 413 150"></path><g id="SvgjsG1785" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1813" r="0" cx="0" cy="0" class="apexcharts-marker wc18ole9y no-pointer-events" stroke="#3699ff" fill="#e1f0ff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1786" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1808" x1="0" y1="0" x2="413" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1809" x1="0" y1="0" x2="413" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1810" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1811" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1812" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1791" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1778" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(225, 240, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
				<div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 258px;"></div></div><div class="contract-trigger"></div></div></div>
				<!--end::Body-->
			</div>
			<!--end::Stats Widget 12-->
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
