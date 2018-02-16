@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Reports</h3>
                        <form method="post" action="{{url('reports/view')}}" class="row">
                            {{csrf_field()}}
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="report-date-range">Select Date Range:</label>
                                    <input id='report-date-range' name="date" type='text' class="form-control text-center" />
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for=""><br></label>
                                    <label for="report-date-range"><br></label>
                                    <input type="submit" class="col-sm-12 btn btn-primary" value="generate">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection