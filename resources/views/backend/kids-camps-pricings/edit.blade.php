@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Kids Camps Pricings <span class="total-section-title-content">Edit ki camp pricing: {{ $kidCampPricingData->title }}</span></h4>

            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('kids-camps-pricings-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('edit-kid-camp-pricing', ['kidCampPricingId' => $kidCampPricingData->kid_camp_pricing_id]) }}" id="kid-camp-pricing-edition-form">

                                    <div class="spanish-content">

                                        <div class="row row-title-div mb-0">

                                            <div class="col-md-12">

                                                <h3 class="heading-title mb-0"><i>* Required fields</i></h3>

                                            </div>

                                        </div>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Pricing information</h3>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group">

                                                <label>Title *</label>

                                                <input type="text" name="title" class="form-control" value="{{ $kidCampPricingData->title }}">

                                            </div>

                                    
                                            <div class="col-md-6 form-group">

                                                <label>Subtitle (optional)</label>

                                                <input type="text" name="subtitle" class="form-control" value="{{ $kidCampPricingData->subtitle }}">

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group">

                                                <label>Link (optional)</label>

                                                <input type="text" name="link" class="form-control" value="{{ $kidCampPricingData->link }}">

                                            </div>

                                    
                                            <div class="col-md-6 form-group">

                                                <label>Colour *</label>

                                                <input type="text" name="background_colour" class="form-control jscolor" value="{{ $kidCampPricingData->background_colour }}">

                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Prices</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped prices-table">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Price *</th>

                                                            <th>Period *</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @if (!empty($kidCampPricingData->prices) && count($kidCampPricingData->prices) > 0)

                                                            @foreach ($kidCampPricingData->prices as $price)
                                                        
                                                                <tr>
                                                                    
                                                                    <td>
                                                                        
                                                                        <input type="text" class="form-control price" value="{{ $price->price }}">

                                                                    </td>

                                                                    <td>
                                                                        
                                                                        <input type="text" class="form-control period" value="{{ $price->period }}">

                                                                    </td>

                                                                    <td>
                                                                        
                                                                        <button type="button" class="btn btn-rounded btn-custom remove-price-button"><i class="fa fa-remove"></i> Delete</button>

                                                                    </td>

                                                                </tr>

                                                            @endforeach

                                                        @else

                                                            <tr>
                                                                    
                                                                <td>
                                                                    
                                                                    <input type="text" class="form-control price">

                                                                </td>

                                                                <td>
                                                                    
                                                                    <input type="text" class="form-control period">

                                                                </td>

                                                                <td>
                                                                    
                                                                    <button type="button" class="btn btn-rounded btn-custom remove-price-button"><i class="fa fa-remove"></i> Delete</button>

                                                                </td>

                                                            </tr>

                                                        @endif

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-price-button"><i class="fa fa-plus"></i> Add other</button>

                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>

                                            </div>

                                        </div>                                        

                                        <hr>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Features list for this price</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped pricing-features-table">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Feature *</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @if (!empty($kidCampPricingData->kidCampsPricingFeatures) && count($kidCampPricingData->kidCampsPricingFeatures) > 0)

                                                            @foreach ($kidCampPricingData->kidCampsPricingFeatures as $pricingFeature)
                                                        
                                                                <tr>
                                                                    
                                                                    <td>
                                                                        
                                                                        <input type="text" class="form-control pricing-feature" value="{{ $pricingFeature->feature }}">

                                                                    </td>

                                                                    <td>
                                                                        
                                                                        <button type="button" class="btn btn-rounded btn-custom remove-pricing-feature-button"><i class="fa fa-remove"></i> Delete</button>

                                                                    </td>

                                                                </tr>

                                                            @endforeach

                                                        @else

                                                            <tr>
                                                                    
                                                                <td>
                                                                    
                                                                    <input type="text" class="form-control pricing-feature">

                                                                </td>

                                                                <td>
                                                                    
                                                                    <button type="button" class="btn btn-rounded btn-custom remove-pricing-feature-button"><i class="fa fa-remove"></i> Delete</button>

                                                                </td>

                                                            </tr>

                                                        @endif

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-pricing-feature-button"><i class="fa fa-plus"></i> Add other</button>

                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="text-right mrg-top-5 actions-buttons-group">

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('kids-camps-pricings-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 kid-camp-pricing-edition-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 kid-camp-pricing-edition-button" data-saving-type="2">Save</button>

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