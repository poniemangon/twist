@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">
        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Pricings <span class="total-section-title-content">(Total registered: {{ $totalPricings }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                <a href="{{ route('register-pricing') }}" class="btn btn-custom btn-rounded">New pricing</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-lg-9">

                <a class="mb-3 d-inline-block" data-toggle="collapse" href="#collapsable-pricings-content" role="button" aria-expanded="false" aria-controls="collapsable-pricings-content">Filter pricings</a>

            </div>

        </div>


        <div class="collapse @if (isset($filtersParameters['filterSource']) && $filtersParameters['filterSource'] != '') show @endif" id="collapsable-pricings-content">

            <div class="card card-body">

                <form id="user-search-form" method="get">

                    <div class="row">
                        
                        <div class="col-lg-6">

                            <label>Search for pricings by title</label>
                            
                            <input type="text" class="form-control searcheable-input" name="source" autocomplete="off" @if (isset($filtersParameters['filterSource'])) value="{{ $filtersParameters['filterSource'] }}" @endif>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-3">

                            <button type="submit" class="btn btn-custom btn-sm">Filter</button>

                            <a href="{{ url('/twist-administration/pricings-list') }}" class="btn btn-default btn-sm text-white ml-1">Clear filters</a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-block">

                        <div class="table-overflow">

                        	@if (!empty($pricings) && count($pricings) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Title</th>

                                            <th>Subtitle</th>

                                            <th>Price</th>

                                            <th>Period</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($pricings as $pricing)

                                            <tr>

                                            	<td>
                                                    {{ $pricing->title }}

                                                    @if ($pricing->is_open_gym_price)
                                                        <b class="d-block red-text">Open gym price</b>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($pricing->subtitle)
                                                        {{ $pricing->subtitle }}
                                                    @else
                                                        No apply
                                                    @endif
                                                </td>

                                                <td>{{ $pricing->price }}</td>

                                                <td>{{ $pricing->period }}</td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-pricing', ['pricingId' => $pricing->pricing_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-pricing-{{ $pricing->pricing_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-pricing-{{ $pricing->pricing_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the pricing: {{ $pricing->title}}?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-pricing-id="{{ $pricing->pricing_id }}" class="btn btn-custom delete-pricing-button">Delete</button>

                                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            @else

                                <h3 class="text-center">No registered pricings found.</h3>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.layouts.footer')

@include('backend.layouts.scripts')