@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Party Options <span class="total-section-title-content">(Total registered: {{ $totalPartyOptions }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                <a href="{{ route('register-party-option') }}" class="btn btn-custom btn-rounded">New party option</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-block">

                        <div class="table-overflow">

                        	@if (!empty($partyOptions) && count($partyOptions) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Option type</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($partyOptions as $partyOption)

                                            <tr>

                                            	<td>{{ $partyOption->option_type }}</td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-party-option', ['partyOptionId' => $partyOption->party_option_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-party-option-{{ $partyOption->party_option_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-party-option-{{ $partyOption->party_option_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the party option with ID: {{ $partyOption->party_option_id }}?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-party-option-id="{{ $partyOption->party_option_id }}" class="btn btn-custom delete-party-option-button">Delete</button>

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

                                <h3 class="text-center">No registered party options found.</h3>

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