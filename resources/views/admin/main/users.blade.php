@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')
<div class="content-wrapper">
  <div class="container-full">
    <div class="content-header">
      <h3>Users</h3>
    </div> 
    <section class="content">
      <div class="row">	
        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">						
              <h4 class="box-title">Users List</h4>
              <h6 class="box-subtitle">List of members accounts</h6>
            </div>
            @if (!empty($users))
            <div class="box-body p-15">						
              <div class="table-responsive">
                <table id="tickets" class="table mt-0 table-hover no-wrap table-borderless" data-page-size="10">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Username</th>
                      <th>Email</th>
                      {{-- <th>Sbuject</th>
                      <th>Ass. to</th> --}}
                      <th>Register Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?= $sn = 1; ?>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $sn++ }}</td>
                      <td>
                        <a href="{{ route('userDetails', ['id'=>$user->id]) }}">
                          {{ $user->username }}
                        </a>
                      </td>
                      <td>{{$user->email}}</td>
                      {{-- <td>How to customize the template?</td>
                      <td>Elijah</td> --}}
                      <td>
                        {{ $user->created_at }}
                      </td>
                      <td> 
                        @if ($user->status == 'Active')
                          <span class="badge light badge-success">Active</span>
                        @elseif ($user->status == 'Disable')
                          <span class="badge light badge-danger">Disable</span>
                        @else
                          <span class="badge light badge-warning">Suspended</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('editUsers', ['id'=>$user->id]) }}" class="text-danger mr-2" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="{{ route('userDetails', ['id'=>$user->id]) }}" class="text-danger" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @else
            <div class="box-body text-center text-primary"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><h4 class="my-2">You don’t users yet</h4></div>
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection()