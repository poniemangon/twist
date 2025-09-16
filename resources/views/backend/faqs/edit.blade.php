@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Faqs <span class="total-section-title-content">Editar faq: {{ $faqData->question }}</span></h4>
            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('faqs-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('edit-faq', ['faqId' => $faqData->faq_id]) }}" id="faq-edition-form">

                                    <div class="spanish-content">

                                        <div class="row row-title-div mb-0">

                                            <div class="col-md-12">

                                                <h3 class="heading-title mb-0"><i>* Required fields</i></h3>

                                            </div>

                                        </div>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Faq information</h3>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 form-group">

                                                <label>Page *</label>

                                                <select class="form-control" name="page">
                                                    
                                                    <option value="">Select...</option>

                                                    <option value="General programs page" @if ($faqData->page == 'General programs page') selected @endif>General programs page</option>

                                                    <option value="Parent Yoga programs page" @if ($faqData->page == 'Parent Yoga programs page') selected @endif>Parent Yoga programs page</option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <label>Question *</label>

                                                <input type="text" name="question" class="form-control" value="{{ $faqData->question }}">

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <label>Answer *</label>

                                                <textarea class="form-control" name="answer" id="long-description">{{ $faqData->answer }}</textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="text-right mrg-top-5 actions-buttons-group">

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('faqs-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 faq-edition-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 faq-edition-button" data-saving-type="2">Save</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.layouts.footer')

@include('backend.layouts.scripts')