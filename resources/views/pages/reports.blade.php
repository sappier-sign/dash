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
                        <form method="post" class="row">

                            {{csrf_field()}}

                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="report-date-range">Select Date Range:</label>
                                    <input id='report-date-range' name="date" type='text'
                                           class="form-control text-center"/>
                                </div>
                            </div>

                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="report-r-switch">Select R Switch:</label>
                                    <select name="r_switch" id="report-r-switch" class="form-control">
                                        <option value="all" selected>all</option>
                                        @foreach($r_switches as $switch)
                                            <option value="{{ $switch->fld_057 }}">{{ $switch->fld_057 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="processing_code">Select Processing Code:</label>
                                    <select name="processing_code" id="processing_code" class="form-control">
                                        <option value="all" selected>all</option>
                                        @foreach($processing_codes as $code)
                                            <option value="{{ $code->fld_003 }}">{{ $code->fld_003 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="report-status">Select Status:</label>
                                    <select name="status" id="report-status" class="form-control">
                                        <option value="all" selected>all</option>
                                        <option value="000">success</option>
                                        <option value="101">pending</option>
                                        <option value="others">fail</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for="report-terminal-id">Select Terminal ID:</label>
                                    <select name="terminal_id" id="report-terminal-id" class="form-control">
                                        <option value="all" selected>all</option>
                                        @foreach($terminals as $terminal)
                                            <option value="{{ $terminal->fld_041 }}">{{ $terminal->fld_041 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class="form-group">
                                    <label for=""><br></label>
                                    <label for="report-date-range"><br></label>
                                    <input type="submit" class="col-sm-12 btn btn-outline btn-primary" value="generate">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Settlement</h3>
                        <form method="POST" action="{{url('reports/settlement')}}" class="row">
                            {{csrf_field()}}
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="report-settlement-date">Select Date Range:</label>
                                    <input id='report-settlement-date' name="date" type='text' class="form-control text-center" />
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