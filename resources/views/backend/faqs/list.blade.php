@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content">

    <div class="container-fluid">
        <div class="row">

            <div class="page-title col-md-6">

                <h4 class="section-title">Faqs <span class="total-section-title-content">(Total registered: {{ $totalFaqs }})</span></h4>

            </div>

            <div class="text-right col-md-6">

                @if (!empty($pagesList) && count($pagesList) > 0)

                    <a href="javascript:void(0)" data-toggle="modal" data-target="#faqs-order" class="btn btn-custom btn-rounded"> Order faqs</a>

                    <div class="modal fade" id="faqs-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg text-left">

                            <div class="modal-content">

                                <div class="modal-header">
                                    
                                    <p class="mb-0">Ordenar posiciones de los productos de la home</p>

                                </div>

                                <div class="modal-body" style="height: 490px; overflow: auto">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach ($pagesList as $k => $page)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link @if ($k == 0) active @endif show" id="{{ $page->pageSegment }}-tab" data-toggle="tab" data-target="#{{ $page->pageSegment }}" type="button" role="tab" aria-controls="{{ $page->page }}" aria-selected="true">{{ $page->page }}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                    <div class="tab-content">
                                        @foreach ($pagesList as $k => $page)
                                            <div class="tab-pane fade @if ($k == 0) active show @endif" id="{{ $page->pageSegment }}" role="tabpanel" aria-labelledby="{{ $page->pageSegment }}-tab">
                                                <table class="table table-bordered table-stripped text-left faq-order-tbody faq-order-tbody-{{ $k }}">
                                                    <thead>
                                                        <tr>
                                                            <th>Question</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($page->pagesFaqs as $faq)
                                                            <tr>
                                                                <input type="hidden" name="pageReference[]" data="{{ $page->page }}">
                                                                <input type="hidden" name="faqId[]" data="{{ $faq->faq_id }}">
                                                                <td>
                                                                    {{ $faq->question }}
                                                                </td>

                                                                <td><i class="fa fa-sort"></i></td>
                                                            </tr>
                                                        @endforeach                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-custom btn-rounded" id="update-faqs-positions-button">Confirm</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

                <a href="{{ route('register-faq') }}" class="btn btn-custom btn-rounded">New faq</a> 

            </div> 

        </div>

        <div class="row">

            <div class="col-lg-9">

                <a class="mb-3 d-inline-block" data-toggle="collapse" href="#collapsable-faqs-content" role="button" aria-expanded="false" aria-controls="collapsable-faqs-content">Filter faqs</a>

            </div>

        </div>


        <div class="collapse @if (isset($filtersParameters['filterSource']) && $filtersParameters['filterSource'] != '') show @endif" id="collapsable-faqs-content">

            <div class="card card-body">

                <form id="user-search-form" method="get">

                    <div class="row">
                        
                        <div class="col-lg-6">

                            <label>Search for faqs by question</label>
                            
                            <input type="text" class="form-control searcheable-input" name="source" autocomplete="off" @if (isset($filtersParameters['filterSource'])) value="{{ $filtersParameters['filterSource'] }}" @endif>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-3">

                            <button type="submit" class="btn btn-custom btn-sm">Filter</button>

                            <a href="{{ url('/twist-administration/faqs-list') }}" class="btn btn-default btn-sm text-white ml-1">Clear filters</a>

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

                        	@if (!empty($faqs) && count($faqs) > 0)

                                <table id="dt-opt" class="table table-lg table-hover">

                                    <thead>

                                        <tr>

                                            <th>Page</th>

                                            <th>Question</th>

                                            <th>Answer</th>

                                            <th class="text-right">Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="tbody">

                                    	@foreach ($faqs as $faq)

                                            <tr>

                                                <td>{{ $faq->page }}</td>

                                            	<td>{{ $faq->question }}</td>

                                            	<td>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#view-answer-{{ $faq->faq_id }}" class="blue-link"><i class="fa fa-eye" title="View answer" data-toggle="tooltip" data-placement="top"></i> View answer</a>

                                                    <div class="modal fade" id="view-answer-{{ $faq->faq_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    
                                                                    <p class="mb-0"><b>Question:</b> {{ $faq->question }}</p>

                                                                </div>

                                                                <div class="modal-body">

                                                                    {!! $faq->answer !!}

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                                <td class="text-right">

                                                    <a href="{{ route('edit-faq', ['faqId' => $faq->faq_id]) }}"><i class="fa fa-edit" title="Edit" data-toggle="tooltip" data-placement="top"></i></a>

                                                    |

                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-faq-{{ $faq->faq_id }}"><i class="ei-garbage-2" title="Delete" data-toggle="tooltip" data-placement="top"></i></a>

                                                    <div class="modal fade" id="delete-faq-{{ $faq->faq_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog text-left">

                                                            <div class="modal-content">

                                                                <div class="modal-header">Are you sure you wish to delete the faq: {{ $faq->question}}?</div>

                                                                <div class="modal-body">

                                                                    This action cannot be undone.

                                                                </div>

                                                                <div class="modal-footer">

                                                                   <button data-faq-id="{{ $faq->faq_id }}" class="btn btn-custom delete-faq-button">Delete</button>

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

                                <h3 class="text-center">No registered faqs found.</h3>

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

<script type="text/javascript">

    var pagesCount = '{{ count($pagesList) }}';

    for (var i = 0 ; i < pagesCount ; i++) {

        var sortedProduct = $('.faq-order-tbody-' + i).sortable({
            items:'tbody tr',
            cursor: 'move',
            containment: '.faq-order-tbody-' + i,
            distance: 20,
            tolerance: 'pointer'
        });

    }
  
</script>