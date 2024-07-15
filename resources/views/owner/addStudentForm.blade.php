@include('navbar')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Student</h5>
                        <!-- Floating Labels Form -->
                        <form>
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="assets/img/profile-img.jpg" alt="Profile">
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="fullName" type="text" class="form-control" id="fullName" placeholder="Enter full name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="dob" type="date" class="form-control" id="dob" placeholder="Enter date of birth">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="class" class="col-md-4 col-lg-3 col-form-label">Class</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="class" type="text" class="form-control" id="class" placeholder="Enter class">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="guardianName" class="col-md-4 col-lg-3 col-form-label">Guardian's Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="guardianName" type="text" class="form-control" id="guardianName" placeholder="Enter guardian's name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="guardianContact" class="col-md-4 col-lg-3 col-form-label">Guardian's Contact</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="guardianContact" type="text" class="form-control" id="guardianContact" placeholder="Enter guardian's contact">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="address" type="text" class="form-control" id="address" placeholder="Enter address">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Student</button>
                            </div>
                        </form><!-- End Profile Edit Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
