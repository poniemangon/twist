@include ('backend.layouts.head')



@include('backend.layouts.menu')



<div class="main-content">



    <div class="container-fluid">



        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Newsletters <span class="total-section-title-content">(Total registered: {{ $totalNewsletters }})</span></h4>

            </div>

            @if (count($newsletters) > 0)

                <div class="col-md-6">

                    <button type="button" class="btn pull-right btn-custom newsletters-exporting-button"><i class="fa fa-download"></i> Export</button>

                </div>

            @endif

        </div>



        <div class="row">



            <div class="col-lg-9">



                <a class="mb-3 d-inline-block" data-toggle="collapse" href="#collapsable-newsletters-content" role="button" aria-expanded="false" aria-controls="collapsable-newsletters-content">Filter newsletters</a>



            </div>



        </div>







        <div class="collapse @if ($filtersParameters['source'] != '') show @endif" id="collapsable-newsletters-content">



            <div class="card card-body">



                <form id="user-search-form" method="get">

                    <div class="row">
                        
                        <div class="col-lg-6">

                            <label>Search newsletters by email</label>
                            
                            <input type="text" class="form-control" name="source" autocomplete="off" value="{{ $filtersParameters['source'] }}">

                        </div>

                    </div>


                    <div class="row mt-3">



                        <div class="col-lg-3">



                            <button type="submit" class="btn btn-custom btn-sm">Filter</button>



                            <a href="{{ url('/twist-administration/newsletters-list') }}" class="btn btn-default btn-sm text-white ml-1">Clear filters</a>



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



                            @if (count($newsletters) <= 0)



                                <h3 class="text-center not-found">No registered newsletters were found</h3>



                            @else



                                <table id="dt-opt" class="table table-lg table-hover faqs-table">



                                    <thead>



                                        <tr>

                                            <th>Registration date</th>

                                            <th>Newsletter</th>

                                            <th class="text-right">Actions</th>

                                        </tr>



                                    </thead>



                                    <tbody class="tbody">



                                        @foreach ($newsletters as $newsletter)


                                            <tr>

                                                <td>{{ $newsletter->registration_date }}</td>

                                                <td><a href="mailto:{{ $newsletter->email }}" class="blue-link">{{ $newsletter->email }}</a></td>

                                                <td class="text-right">

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-newsletter-{{ $newsletter->newsletter_id }}"><i class="ei-garbage-2"></i></a>

                                                    <div class="modal fade" id="delete-newsletter-{{ $newsletter->newsletter_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete this newsletter?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-newsletter-id="{{ $newsletter->newsletter_id }}" class="btn btn-custom delete-newsletter-button">Delete</button>

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



                            @endif



                        </div>



                    </div>



                </div>



                @if (count($newsletters) > 0) 



                    <div class="mt-3 d-flex flex-row justify-content-end custom-paginator">



                        {{ $newsletters->appends(request()->input())->links("pagination::bootstrap-4") }}



                    </div>



                @endif



            </div>



        </div>



    </div>



</div>



@include('backend.layouts.footer')



@include('backend.layouts.scripts')