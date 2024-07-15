@include('navbar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img  src="{{ asset('logos/' . $hasSchool->school_logo) }}" alt="Profile" class="rounded-circle">
              
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ Auth::user()->email }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                          
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">{{ $hasSchool->school_name }}</p>

                                <h5 class="card-title">School Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">School Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $hasSchool->school_name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">School Motto</div>
                                    <div class="col-lg-9 col-md-8">{{ $hasSchool->school_motto }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ $hasSchool->school_address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">City</div>
                                    <div class="col-lg-9 col-md-8">{{ $hasSchool->school_city }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">State</div>
                                    <div class="col-lg-9 col-md-8">{{ $hasSchool->school_state }}</div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                              
<form action="{{ route('school.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="row mb-3">
      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
      <div class="col-md-8 col-lg-9">
          <img src="{{ asset('logos/' . $hasSchool->school_logo) }}" alt="School Logo">
          <div class="pt-2">
              <input type="file" name="school_logo" class="form-control-file" id="school_logo">
              <a href="#" class="btn btn-danger btn-sm mt-2" title="Remove my profile image"><i class="bi bi-trash"></i></a>
          </div>
      </div>
  </div>

  <div class="row mb-3">
      <label for="school_name" class="col-md-4 col-lg-3 col-form-label">School Name</label>
      <div class="col-md-8 col-lg-9">
          <input name="school_name" type="text" class="form-control" id="school_name" value="{{ $hasSchool->school_name }}">
      </div>
  </div>

  <div class="row mb-3">
      <label for="school_motto" class="col-md-4 col-lg-3 col-form-label">School Motto</label>
      <div class="col-md-8 col-lg-9">
          <textarea name="school_motto" class="form-control" id="school_motto" style="height: 100px">{{ $hasSchool->school_motto }}</textarea>
      </div>
  </div>

  <div class="row mb-3">
      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
      <div class="col-md-8 col-lg-9">
          <input name="school_address" type="text" class="form-control" id="address" value="{{ $hasSchool->school_address }}">
      </div>
  </div>

  <div class="row mb-3">
      <label for="city" class="col-md-4 col-lg-3 col-form-label">City</label>
      <div class="col-md-8 col-lg-9">
          <input name="school_city" type="text" class="form-control" id="city" value="{{ $hasSchool->school_city }}">
      </div>
  </div>

  <div class="row mb-3">
      <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
      <div class="col-md-8 col-lg-9">
          <input name="school_state" type="text" class="form-control" id="state" value="{{ $hasSchool->school_state }}">
      </div>
  </div>

  <div class="text-center">
      <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
</form>

                            </div>
                     
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                       
<form action="{{ route('password.update') }}" method="POST">
  @csrf
  @method('PUT')

  <div class="row mb-3">
      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
      <div class="col-md-8 col-lg-9">
          <input name="current_password" type="password" class="form-control" id="currentPassword" required>
      </div>
  </div>

  <div class="row mb-3">
      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
      <div class="col-md-8 col-lg-9">
          <input name="new_password" type="password" class="form-control" id="newPassword" required>
      </div>
  </div>

  <div class="row mb-3">
      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
      <div class="col-md-8 col-lg-9">
          <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword" required>
      </div>
  </div>

  <div class="text-center">
      <button type="submit" class="btn btn-primary">Change Password</button>
  </div>
</form>
<!-- End Change Password Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>


  </main><!-- End #main -->
@include('footer')