@extends('controlpanel.components.main')

@section('content')
<div class="section-header">
    <h1>{{ __('messages.movies') }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">All Movies</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Movie List</h4>
        </div>
        <div class="card-body">
            <div class="float-right">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search movie titles..." id="search-input">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>

            <div class="clearfix mb-3"></div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Poster</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="Movie-container">
                        <tr id="empty-row">
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-search fa-2x text-muted mb-3 d-block"></i>
                                <span class="text-muted">Enter a keyword to search movies.</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection