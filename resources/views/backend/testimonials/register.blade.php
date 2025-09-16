@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Testimonials <span class="total-section-title-content">Create new testimony</span></h4>
            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('testimonials-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('register-testimony') }}" id="testimony-registration-form">

                                    <div class="spanish-content">

                                        <div class="row row-title-div mb-0">

                                            <div class="col-md-12">

                                                <h3 class="heading-title mb-0"><i>* Required fields</i></h3>

                                            </div>

                                        </div>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Testimony information</h3>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4 form-group">

                                                <label>Name *</label>

                                                <input type="text" name="name" class="form-control">

                                            </div>

                                    
                                            <div class="col-md-4 form-group">

                                                <label>Colour *</label>

                                                <input type="text" name="colour" class="form-control jscolor">

                                            </div>

                                            <div class="col-md-4 form-group">

                                                <label>Punctuation *</label>

                                                <select class="form-control" name="punctuation">
                                                    
                                                    <option value="1">1 star</option>

                                                    <option value="2">2 stars</option>

                                                    <option value="3">3 stars</option>

                                                    <option value="4">4 stars</option>

                                                    <option value="5">5 stars</option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 form-group">

                                                <label>Review *</label>

                                                <textarea name="review" class="form-control"></textarea>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="text-right mrg-top-5 actions-buttons-group">

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('testimonials-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 testimony-registration-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 testimony-registration-button" data-saving-type="2">Save</button>

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