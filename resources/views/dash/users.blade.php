@extends('baseadm')

@section('title', 'users' )

@section('content' )

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

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table with contextual classes</h4>
            <p class="card-description"> Add class <code>.table-{color}</code> </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> First name </th>
                        <th> Product </th>
                        <th> Amount </th>
                        <th> Deadline </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info">
                        <td> 1 </td>
                        <td> Herman Beck </td>
                        <td> Photoshop </td>
                        <td> $ 77.99 </td>
                        <td> May 15, 2015 </td>
                    </tr>
                    <tr class="table-warning">
                        <td> 2 </td>
                        <td> Messsy Adam </td>
                        <td> Flash </td>
                        <td> $245.30 </td>
                        <td> July 1, 2015 </td>
                    </tr>
                    <tr class="table-danger">
                        <td> 3 </td>
                        <td> John Richards </td>
                        <td> Premeire </td>
                        <td> $138.00 </td>
                        <td> Apr 12, 2015 </td>
                    </tr>
                    <tr class="table-success">
                        <td> 4 </td>
                        <td> Peter Meggik </td>
                        <td> After effects </td>
                        <td> $ 77.99 </td>
                        <td> May 15, 2015 </td>
                    </tr>
                    <tr class="table-primary">
                        <td> 5 </td>
                        <td> Edward </td>
                        <td> Illustrator </td>
                        <td> $ 160.25 </td>
                        <td> May 03, 2015 </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
