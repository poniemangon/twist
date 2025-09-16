@include('backend.layouts.head')
@include('backend.layouts.menu')
<div class="main-content property-abm">
    <div class="container-fluid">
        <div class="row">
            <div class="page-title col-md-6">
                <h4 class="section-title">Articles <span class="total-section-title-content">Create a new article</span></h4>
            </div>
            <div class="text-right col-md-6">
                <a href="{{ route('articles-list') }}" class="btn btn-default btn-rounded">Back</a>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card maxed-content">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12 ml-auto mr-auto">
                                <form method="post" action="{{ route('register-article') }}" id="article-registration-form" enctype="multipart/form-data">
                                        @csrf
                                    <div class="content">
                                        <div class="row row-title-div mb-0">
                                            <div class="col-md-12">
                                                <h3 class="heading-title mb-0"><i>* Required information</i></h3>
                                            </div>
                                        </div>
                                        <div class="row row-title-div">
                                            <div class="col-md-12">
                                                <h3 class="heading-title">Article information</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Title *</label>
                                                <input type="text" name="title" id="article-title" class="form-control" placeholder="Enter article title">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Excerpt</label>
                                                <textarea name="excerpt" id="excerpt" class="form-control" rows="4" placeholder="Enter article excerpt"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Body *</label>
                                                <textarea name="body" id="body" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row row-title-div">
                                            <div class="col-md-12">
                                                <h3 class="heading-title">Article Image</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Image (Allowed formats: .jpg, .png, .webp)</label>
                                                <div id="image-dropzone" class="dropzone">
                                                    <div class="dz-message">
                                                        <i class="fa fa-cloud-upload"></i>
                                                        <h3>Drop image here or click to upload</h3>
                                                        <em>(Only one image allowed)</em>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Meta Title</label>
                                                <input type="text" name="meta_title" id="meta-title" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>URL Slug</label>
                                                <input type="text" name="url_slug" id="url-slug" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Meta Description</label>
                                                <textarea name="meta_description" id="meta-description" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 m-auto py-5">
                                                <h3 class="heading-title">Article FAQs</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="faqs-table">
                                                        <thead>
                                                            <tr>
                                                                <th width="30%">Title</th>
                                                                <th width="60%">Description</th>
                                                                <th width="10%">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="faqs-tbody">
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-right mt-2">
                                                    <button type="button" class="btn btn-secondary btn-sm" id="add-faq-btn">
                                                        <i class="fa fa-plus"></i> Add FAQ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="publish-checkbox" name="publish_checkbox">
                                                    <label class="form-check-label" for="publish-checkbox">
                                                        Program this article to be published on a specific date (if unspecified, it will be published immediately)
                                                    </label>
                                                </div>
                                                <label>Publish Date</label>
                                                <input type="date" name="publish_date" id="publish-date" class="form-control col-md-4" disabled>
                                            </div>
                                        </div>



                                    <div class="row mt-3">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="text-right mrg-top-5">
                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('articles-list') }}">Cancel</a>
                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 article-registration-button" data-saving-type="1">Save and keep editing</button>
                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 article-registration-button" data-saving-type="2">Save</button>
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
