@include('navbar')
  <main id="main" class="main">
    <div class="pagetitle">
    
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add School information</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('saveSchool') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">School Name</label>
                  <div class="col-sm-10">
                    <input name="school_name" type="text" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">School Motto</label>
                    <div class="col-sm-10">
                      <input name="school_motto" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">School Address</label>
                    <div class="col-sm-10">
                      <input name="school_address" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">School City</label>
                    <div class="col-sm-10">
                      <input name="school_city" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">School State</label>
                    <div class="col-sm-10">
                      <input name="school_state" type="text" class="form-control">
                    </div>
                  </div>
                 
                 
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">School Logo</label>
                  <div class="col-sm-10">
                    <input class="form-control"  name="school_logo" type="file" id="formFile">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

       
      </div>
    </section>

  </main><!-- End #main -->
@include('footer')