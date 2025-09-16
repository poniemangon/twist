@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">
        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Sponsors <span class="total-section-title-content">(Total registered: {{ $totalSponsors }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                <a href="{{ route('register-sponsor') }}" class="btn btn-custom btn-rounded">New sponsor</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-block">

                        <div class="table-overflow">

                        	@if (!empty($sponsors) && count($sponsors) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Logo</th>

                                            <th>Link</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($sponsors as $sponsor)

                                            <tr>

                                            	<td>
                                                    <img src="{{ asset('public/backend/images/sponsors/' . $sponsor->logo) }}" width="70">   
                                                </td>

                                                <td>
                                                    @if ($sponsor->link)
                                                        <a href="{{ url($sponsor->link) }}" class="blue-link" target="_blank">{{ $sponsor->link }}</a>
                                                    @else
                                                        No apply
                                                    @endif
                                                </td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-sponsor', ['sponsorId' => $sponsor->sponsor_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-sponsor-{{ $sponsor->sponsor_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-sponsor-{{ $sponsor->sponsor_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the sponsor with ID: {{ $sponsor->sponsor_id }}?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-sponsor-id="{{ $sponsor->sponsor_id }}" class="btn btn-custom delete-sponsor-button">Delete</button>

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

                                <h3 class="text-center">No registered sponsors found.</h3>

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