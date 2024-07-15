@include('navbar');
  <main id="main" class="main">

   
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Teacher</h5>
                   <!-- Table with stripped rows -->
                   <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->class }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <a href="{{ route('edit-teacher', $teacher->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('delete-teacher', $teacher->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  @include('footer')