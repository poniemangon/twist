@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">
        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Testimonials <span class="total-section-title-content">(Total registered: {{ $totalTestimonials }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                <a href="{{ route('register-testimony') }}" class="btn btn-custom btn-rounded">New testimony</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-lg-9">

                <a class="mb-3 d-inline-block" data-toggle="collapse" href="#collapsable-testimonials-content" role="button" aria-expanded="false" aria-controls="collapsable-testimonials-content">Filter testimonies</a>

            </div>

        </div>


        <div class="collapse @if (isset($filtersParameters['filterSource']) && $filtersParameters['filterSource'] != '') show @endif" id="collapsable-testimonials-content">

            <div class="card card-body">

                <form id="user-search-form" method="get">

                    <div class="row">
                        
                        <div class="col-lg-6">

                            <label>Search for testimonials by name</label>
                            
                            <input type="text" class="form-control searcheable-input" name="source" autocomplete="off" @if (isset($filtersParameters['filterSource'])) value="{{ $filtersParameters['filterSource'] }}" @endif>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-3">

                            <button type="submit" class="btn btn-custom btn-sm">Filter</button>

                            <a href="{{ url('/twist-administration/testimonials-list') }}" class="btn btn-default btn-sm text-white ml-1">Clear filters</a>

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

                        	@if (!empty($testimonials) && count($testimonials) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Name</th>

                                            <th>Punctuation</th>

                                            <th>Testimony</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($testimonials as $testimony)

                                            <tr>

                                            	<td>{{ $testimony->name }}</td>

                                                <td><i class="fa fa-star"></i> {{ $testimony->punctuation }} @if ($testimony->punctuation > 1) stars @else star @endif</td>

                                            	<td>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#view-testimony-{{ $testimony->testimony_id }}" class="blue-link"><i class="fa fa-eye" title="View testimony" data-toggle="tooltip" data-placement="top"></i> View testimony</a>

                                                    <div class="modal fade" id="view-testimony-{{ $testimony->testimony_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-body">

                                                                    {{ $testimony->review }}

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-testimony', ['testimonyId' => $testimony->testimony_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-testimony-{{ $testimony->testimony_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-testimony-{{ $testimony->testimony_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the testimony: {{ $testimony->name}}?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-testimony-id="{{ $testimony->testimony_id }}" class="btn btn-custom delete-testimony-button">Delete</button>

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

                                <h3 class="text-center">No registered testimonials found.</h3>

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