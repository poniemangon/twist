@include('backend.layouts.head')

@include('backend.layouts.menu')

<div class="main-content property-abm">

    <div class="container-fluid">

        <div class="row">

            <div class="page-title col-md-9">

                <h4 class="section-title">Users <span class="total-section-title-content">Edit user: {{ $userData->name }} {{ $userData->surname }}</span></h4>

            </div>

            <div class="text-right col-md-3">

                <a href="{{ route('users-list') }}" class="btn btn-default btn-rounded">Back</a>

            </div> 

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card maxed-content">

                    <div class="card-block">

                        <div class="row">

                            <div class="col-md-12 ml-auto mr-auto">

                                <form method="post" action="{{ route('edit-user', ['userId' => $userData->user_id]) }}" id="user-edition-form">

                                    <div class="spanish-content">

                                        <div class="row row-title-div mb-0">

                                            <div class="col-md-12">

                                                <h3 class="heading-title mb-0"><i>* Required fields</i></h3>

                                            </div>

                                        </div>

                                        <div class="row row-title-div">

                                            <div class="col-md-12">

                                                <h3 class="heading-title">User information</h3>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4 form-group">

                                                <label>Name *</label>

                                                <input type="text" name="name" class="form-control" value="{{ $userData->name }}">

                                            </div>

                                            <div class="col-md-4 form-group">

                                                <label>Lastname *</label>

                                                <input type="text" name="surname" class="form-control" value="{{ $userData->surname }}">

                                            </div>

                                            <div class="col-md-4 form-group">

                                                <label>E-mail *</label>

                                                <input type="text" name="email" class="form-control" value="{{ $userData->email }}" >

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4 form-group">

                                                <label>Password *</label>

                                                <input type="password" name="password" class="form-control">

                                            </div>


                                            <div class="col-md-4 form-group">

                                                <label>Repeat password *</label>

                                                <input type="password" name="repeat_password" class="form-control">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="text-right mrg-top-5 actions-buttons-group">

                                                <a class="btn btn-custom btn-rounded mb-30" href="{{ route('users-list') }}">Cancel</a>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 user-edition-button" data-saving-type="1">Save and keep editing</button>

                                                <button type="submit" class="btn btn-custom btn-rounded mb-30 user-edition-button" data-saving-type="2">Save</button>

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