@include('navbar')
  <main id="main" class="main">

   
    <section class="section">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add Head Teacher</h5>
      <!-- Floating Labels Form -->
<form class="row g-3" method="POST" action="{{ route('update-teacher', $teacher->id) }}">
    @csrf
    @csrf
    @method('PUT')
    <div class="col-md-12">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" name="name"   value="{{ $teacher->name }}" placeholder="Teacher Name" required>
            <label for="floatingName">Teacher Name</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingClass" name="class"  value="{{ $teacher->class }}"  placeholder="Class" required>
            <label for="floatingClass">Class</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingEmail" name="email"  value="{{ $teacher->email }}" placeholder="Email" required>
            <label for="floatingEmail">Email</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" >
            <label for="floatingPassword">Password (leave blank if not changing)</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPasswordConfirm" name="password_confirmation" placeholder="Confirm Password">
            <label for="floatingPasswordConfirm">Confirm Password</label>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><!-- End floating Labels Form -->

              </div>
            </div>
          </div>
        </div>
      </section>
      

  </main><!-- End #main -->
