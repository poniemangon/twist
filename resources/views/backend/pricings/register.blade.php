@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Pricings <span class="total-section-title-content">Create new pricing</span></h4>

            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('pricings-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('register-pricing') }}" id="pricing-registration-form">

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

                                                <input type="text" name="title" class="form-control">

                                                <label><input type="checkbox" name="is_open_gym_price"> Is open gym price</label>

                                            </div>

                                    
                                            <div class="col-md-6 form-group">

                                                <label>Subtitle (optional)</label>

                                                <input type="text" name="subtitle" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group">

                                                <label>Price *</label>

                                                <input type="number" min="0" step="0.01" name="price" class="form-control">

                                            </div>

                                    
                                            <div class="col-md-6 form-group">

                                                <label>Period *</label>

                                                <input type="text" name="period" class="form-control">

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group">

                                                <label>Link (optional)</label>

                                                <input type="text" name="link" class="form-control">

                                            </div>

                                    
                                            <div class="col-md-6 form-group">

                                                <label>Colour *</label>

                                                <input type="text" name="background_colour" class="form-control jscolor">

                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Benefits list for this price</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped pricing-benefits-table">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Benefit</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        
                                                        <tr>
                                                            
                                                            <td>
                                                                
                                                                <input type="text" class="form-control pricing-benefit">

                                                            </td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom remove-pricing-benefit-button"><i class="fa fa-remove"></i> Delete</button>

                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-pricing-benefit-button"><i class="fa fa-plus"></i> Add other</button>

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

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('pricings-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 pricing-registration-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 pricing-registration-button" data-saving-type="2">Save</button>

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