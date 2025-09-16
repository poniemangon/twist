@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Party option <span class="total-section-title-content">Create new party option</span></h4>

            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('party-options-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('register-party-option') }}" id="party-option-registration-form">

                                    <div class="spanish-content">

                                        <div class="row row-title-div mb-0">

                                            <div class="col-md-12">

                                                <h3 class="heading-title mb-0"><i>* Required fields</i></h3>

                                            </div>

                                        </div>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Party option information</h3>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group">

                                                <label>Option type *</label>

                                                <input type="text" name="option_type" class="form-control">

                                            </div>
                                    
                                            <div class="col-md-6 form-group">

                                                <label>Colour *</label>

                                                <input type="text" name="background_colour" class="form-control jscolor">

                                            </div>

                                        </div>

                                        <hr class="mt-30">

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">What does Twist supply?</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped party-option-supplies-table-01">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Supply</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        
                                                        <tr>
                                                            
                                                            <td>
                                                                
                                                                <input type="text" class="form-control party-option-supply-01">

                                                            </td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom remove-party-option-supply-button-01"><i class="fa fa-remove"></i> Delete</button>

                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-party-option-supply-button-01"><i class="fa fa-plus"></i> Add other</button>

                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>

                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">What does Customer supply?</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped party-option-supplies-table-02">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Supply</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        
                                                        <tr>
                                                            
                                                            <td>
                                                                
                                                                <input type="text" class="form-control party-option-supply-02">

                                                            </td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom remove-party-option-supply-button-02"><i class="fa fa-remove"></i> Delete</button>

                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-party-option-supply-button-02"><i class="fa fa-plus"></i> Add other</button>

                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>

                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">Prices list for this party option</h3>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <table class="table table-bordered table-stripped party-option-prices-table">
                                                    
                                                    <thead>
                                                        
                                                        <tr>
                                                            
                                                            <th>Price</th>

                                                            <th>Description</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        
                                                        <tr>

                                                            <td>
                                                                
                                                                <input type="number" min="0" step="0.01" class="form-control party-option-price">

                                                            </td>
                                                            
                                                            <td>
                                                                
                                                                <input type="text" class="form-control party-option-description">

                                                            </td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom remove-party-option-price-button"><i class="fa fa-remove"></i> Delete</button>

                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                    <tfoot>
                                                        
                                                        <tr>
                                                            
                                                            <td></td>

                                                            <td></td>

                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-rounded btn-custom add-new-party-option-price-button"><i class="fa fa-plus"></i> Add other</button>

                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>

                                            </div>

                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <label>Description *</label>

                                                <textarea class="form-control" id="long-description" name="description"></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="text-right mrg-top-5 actions-buttons-group">

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('party-options-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 party-option-registration-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 party-option-registration-button" data-saving-type="2">Save</button>

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