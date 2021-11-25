<div class="col-xl-4 col-lg-5">
  <div class="box">
    <div class="box-body box-profile">
      <img class="rounded img-fluid mx-auto d-block max-w-150" src="{{ asset('images/avatar/avatar.svg') }}" alt="User profile picture">

      <h2 class="profile-username text-center mb-0">{{$admin->username}}</h2>

      <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>{{$admin->email}}</h4>

      <div class="row">
        <div class="col-12">
            <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                <a href="{{ route('adminProfile') }}" class="media media-single p-15 my-2 {{ Request::is('admin/profile') ? 'active' : '' }}">
                  <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Profile</span>
                </a>
                <a href="{{ route('adminCompany') }}" class="media media-single p-15 my-2 {{ Request::is('admin/company') ? 'active' : '' }}">
                  <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Company</span>
                </a>
                <a href="{{ route('statistics') }}" class="media media-single p-15 my-2 {{ Request::is('admin/statistics') ? 'active' : '' }}">
                  <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Statistics</span>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>