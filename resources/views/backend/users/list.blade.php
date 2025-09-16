@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">
        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Users <span class="total-section-title-content">(Total registered: {{ $totalUsers }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                <a href="{{ route('register-user') }}" class="btn btn-custom btn-rounded">New user</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-lg-9">

                <a class="mb-3 d-inline-block" data-toggle="collapse" href="#collapsable-users-content" role="button" aria-expanded="false" aria-controls="collapsable-users-content">Filter users</a>

            </div>

        </div>


        <div class="collapse @if (isset($filtersParameters['filterSource']) && $filtersParameters['filterSource'] != '') show @endif" id="collapsable-users-content">

            <div class="card card-body">

                <form id="user-search-form" method="get">

                    <div class="row">
                        
                        <div class="col-lg-6">

                            <label>Search users by name, lastname or email</label>
                            
                            <input type="text" class="form-control searcheable-input" name="source" autocomplete="off" @if (isset($filtersParameters['filterSource'])) value="{{ $filtersParameters['filterSource'] }}" @endif>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-3">

                            <button type="submit" class="btn btn-custom btn-sm">Filter</button>

                            <a href="{{ url('/twist-administration/users-list') }}" class="btn btn-default btn-sm text-white ml-1">Limpiar filtros</a>

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

                        	@if (!empty($users) && count($users) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Name</th>

                                            <th>Lastname</th>

                                            <th>E-mail</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($users as $user)

                                            <tr>

                                            	<td>{{ $user->name }}</td>

                                            	<td>{{ $user->surname }}</td>

                                            	<td>{{ $user->email }}</td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-user', ['userId' => $user->user_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-user-{{ $user->user_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-user-{{ $user->user_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the user: {{ $user->name}} {{ $user->surname}}?</div>

                                                                <div class="modal-body">

                                                                    By deleting this user, you will not be able to recover him/her.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-user-id="{{ $user->user_id }}" class="btn btn-custom delete-user-button">Delete</button>

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

                                <h3 class="text-center">No registered users found.</h3>

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