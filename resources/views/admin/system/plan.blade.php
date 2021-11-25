@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header d-flex align-items-center justify-content-between">
            <h3>Plans</h3>
            @if (Auth::user()->email == 'kingsley@gmail.com')
            <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#createPlan">
                <svg class="mr-3 scale5" width="16" height="16" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.99989 23.6666H15.9999C16.6439 23.6666 17.1666 23.144 17.1666 22.5C17.1666 21.856 16.6439 21.3333 15.9999 21.3333H1.99989C1.35589 21.3333 0.833225 21.856 0.833225 22.5C0.833225 23.144 1.35589 23.6666 1.99989 23.6666ZM5.49989 9.66665V3.24998C5.49989 2.47648 5.80674 1.73447 6.3539 1.18731C6.90107 0.64014 7.64306 0.333313 8.41656 0.333313H9.58323C10.3567 0.333313 11.0987 0.64014 11.6459 1.18731C12.1919 1.73447 12.4999 2.47648 12.4999 3.24998V9.66665H15.9999C16.4712 9.66665 16.8971 9.95013 17.0779 10.3865C17.2576 10.8228 17.1584 11.3245 16.8247 11.6581L9.82473 18.6581C9.36856 19.1131 8.63006 19.1131 8.17506 18.6581L1.17506 11.6581C0.841391 11.3245 0.741063 10.8228 0.921897 10.3865C1.10273 9.95013 1.52739 9.66665 1.99989 9.66665H5.49989ZM13.1836 12H11.3332C10.6892 12 10.1666 11.4773 10.1666 10.8333C10.1666 10.8333 10.1666 5.95198 10.1666 3.24998C10.1666 3.09481 10.1047 2.94664 9.99507 2.83698C9.88657 2.72731 9.73722 2.66665 9.58323 2.66665C9.20173 2.66665 8.79806 2.66665 8.41656 2.66665C8.26139 2.66665 8.11324 2.72731 8.00357 2.83698C7.89507 2.94664 7.83323 3.09481 7.83323 3.24998V10.8333C7.83323 11.4773 7.31056 12 6.66656 12H4.81623L8.99989 16.1836L13.1836 12Z" fill="#fff"></path>
                </svg>
                Create Plan
            </button>
            @endif
        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        @if(!$plans->isEmpty())
                        <div class="box-header with-border">
                            <h4 class="box-title">Plan Lists</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th>SN</th>
                                            <th>Minimum</th>
                                            <th>Maximum</th>
                                            <th>percent</th>
                                            <th>duration</th>
                                            <th>support</th>
                                            <th>Color</th>
                                            <th>Status</th>
                                            @if (Auth::user()->email == 'kingsley@gmail.com')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1 ?>
                                        @foreach ($plans as $plan)
                                        <tr role="row">
                                            <td>
                                                {{ $sn++ }}
                                            </td>
                                            <td>
                                                {{ $plan->minimum }}
                                            </td>
                                            <td>
                                                {{ $plan->maximum }}
                                            </td>
                                            <td>
                                                {{ $plan->percent }}
                                            </td>
                                            <td>
                                                {{ $plan->duration }}
                                            </td>
                                            <td>
                                                {{ $plan->support }}
                                            </td>
                                            <td>
                                                {{ $plan->color }}
                                            </td>
                                            <td>
                                                @if ($plan->status == 1)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td>
                                            @if (Auth::user()->email == 'kingsley@gmail.com')
                                            <td>
                                                <button class="btn btn-primary shadow btn-xs sharp mr-1 editPlan" data-id="{{$plan->id}}"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger shadow btn-xs sharp deletePlan" data-id="{{$plan->id}}"><i class="fa fa-trash"></i></button>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <div class="box-body text-center text-primary"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><h4 class="my-2">You don’t have plans yet</h4></div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal center-modal fade" id="createPlan" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-solid btn-primary mb-0">
                <div class="box-header with-border">
                    <h3 class="box-title text-white">Create Plan</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="box-body">
                    <form class="createPlanForm" action="{{ route('storePlan') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emailAddress1">Name :</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                    <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addressline1">Minimum :</label>
                                    <input type="text" name="minimum" class="form-control" placeholder="Minimum"> 
                                    <span class="invalid-feedback animated fadeInUp minimum-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="maximum">Maximum :</label>
                                    <input type="text" name="maximum" class="form-control" placeholder="Maximum"> 
                                    <span class="invalid-feedback animated fadeInUp maximum-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="percent">Percent :</label>
                                    <input type="text" name="percent" class="form-control" placeholder="Percent"> 
                                    <span class="invalid-feedback animated fadeInUp percent-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="duration">Duration :</label>
                                    <input type="text" name="duration" class="form-control" placeholder="Duration"> 
                                    <span class="invalid-feedback animated fadeInUp duration-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="support">Support :</label>
                                    <input type="text" name="support" class="form-control" placeholder="Support"> 
                                    <span class="invalid-feedback animated fadeInUp support-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="color">Color :</label>
                                    <input type="text" name="color" class="form-control" placeholder="Color"> 
                                    <span class="invalid-feedback animated fadeInUp color-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <select name="status" id="select" class="form-control">
                                        <option value="">Select Status...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>  
                                    <span class="invalid-feedback animated fadeInUp status-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Create Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal center-modal fade" id="editPlan" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-solid btn-primary mb-0">
                <div class="box-header with-border">
                    <h3 class="box-title text-white">Edit Plan</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="box-body">
                    <form class="updatePlanForm">
                        @csrf
                        <input type="hidden" name="plan_id" id="plan_id" class="form-control"> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emailAddress1">Name :</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addressline1">Minimum :</label>
                                    <input type="text" name="minimum" id="minimum" class="form-control" placeholder="Minimum"> 
                                    <span class="invalid-feedback animated fadeInUp minimum-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="maximum">Maximum :</label>
                                    <input type="text" name="maximum" id="maximum" class="form-control" placeholder="Maximum"> 
                                    <span class="invalid-feedback animated fadeInUp maximum-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="percent">Percent :</label>
                                    <input type="text" name="percent" id="percent" class="form-control" placeholder="Percent"> 
                                    <span class="invalid-feedback animated fadeInUp percent-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="duration">Duration :</label>
                                    <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration"> 
                                    <span class="invalid-feedback animated fadeInUp duration-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="support">Support :</label>
                                    <input type="text" name="support" id="support" class="form-control" placeholder="Support"> 
                                    <span class="invalid-feedback animated fadeInUp support-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="color">Color :</label>
                                    <input type="text" name="color" id="color" class="form-control" placeholder="Color"> 
                                    <span class="invalid-feedback animated fadeInUp color-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>  
                                    <span class="invalid-feedback animated fadeInUp status-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Update Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()