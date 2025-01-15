@extends('baseadm')

@section('title', 'blogs')

@section('content')

<div class="col-md-12">
    <div class="page-header-toolbar">
        <div class="sort-wrapper">
            <button type="button" class="btn btn-primary toolbar-item">New</button>
            <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                <div class="dropdown-menu" aria-labelledby="dropdownexport">
                    <a class="dropdown-item" href="#">Export as PDF</a>
                    <a class="dropdown-item" href="#">Export as DOCX</a>
                    <a class="dropdown-item" href="#">Export as CDR</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
