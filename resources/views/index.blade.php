<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    rel="stylesheet"  crossorigin="anonymous">
  </head>
  <body>

    
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addForm">
                {{-- @csrf --}}
                {{ csrf_field() }}
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control" aria-describedby="emailHelp">
                  {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course</label>
                    <input type="text" name="course" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Section</label>
                    <input type="text" name="section" class="form-control" id="exampleInputPassword1">
                  </div>
                <button type="button" class="btn btn-secondary">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <h1 class="text-center pt-3">Ajax Request</h1>
            </div>
        </div>
        <div class="jumbotron">
            <div class="row">
                            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>
            </div>
            <div class="row">
                @if (Session::has('status'))
                <div class="alert alert-success pt-3" role="alert">
                    {{ session('status') }}
                  </div>
                @endif
                  
            </div>
        </div>
    </div>

    <!-- required scripts -->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js" 
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" 
    crossorigin="anonymous"></script>

    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}" 
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" 
    crossorigin="anonymous"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}" 
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" 
    crossorigin="anonymous"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.slim.js') }}" 
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" 
    crossorigin="anonymous"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.slim.min.js') }}" 
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" 
    crossorigin="anonymous"></script> --}}

    <!-- pooper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
    crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
    crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#addForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/ajaxstore",
                    datatype: "JSON",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#exampleModal').modal('hide');
                        alert('Data Saved!');
                    },
                    error: function (error) {
                        console.log(error)
                        alert('Data Not Saved!');
                    }
                });
            });
        });
    </script>
  </body>
</html>