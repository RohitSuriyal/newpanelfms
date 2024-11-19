@include('layout.header')

<div class="container-fluid">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        +ADD BLOG
    </button>
    <div class="table-responsive">
        <br />
        <table id="practice" class="table table-bordered table-striped">
            <thead>
                <tr>



                    <th width="20%">Title</th>
                    <th width="10%">Image</th>
                    <th width="10%">View</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>












                    <!-- <th width="35%">Pasword</th>   -->

                </tr>
            </thead>
        </table>


    </div>
</div>

<!-- modal for the pop up -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:48%!important" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Blog Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addform" method="post" action="{{route('formdata')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Main Heading</label>
                            <input class="form-control" name="main_heading" placeholder="enter main heading">
                        </div>
                        <div class="col-md-6">
                            <label>image</label>
                            <input class="form-control" type='file' name="image">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>body</label>
                            <textarea name="content" id="editor"></textarea>



                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="category" class="form-control">
                            <option value="Technology">Technology</option>
                            <option value="Education">Education</option>
                            <option value="School">School</option>
                            </select>
                           
                        </div>
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date">


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tags">Tags</label>
                            <input name="tags[]" class="form-control" id="tags" multiple>
                        </div>
                        <div class="col-md-6">
                            <label for="writtenby">Written by</label>
                            <input name="writtenby" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                School
                            </label>
                            <select name="school" class="form-control w-100">
                                <option selected>Select school</option>
                                @foreach($schoolname as $school)

                                <option value="{{$school->id}}">{{$school->name}}</option>

                                @endforeach


                            </select>

                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">

                        <button type="submit" class="btn btn-success w-25 py-2">Save changes</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>
@include('layout.footer')
@if(isset($successMessage))
    <script>
     Swal.fire({
            title: 'Success!',
            text: "{{ $successMessage }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
        // Optionally reset the form after the alert (if needed)
        $("#addform")[0].reset();
    </script>
@endif
@if(isset($successMessageupdate))
    <script>
     Swal.fire({
            title: 'Success!',
            text: "{{ $successMessageupdate }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
        // Optionally reset the form after the alert (if needed)
        $("#addform")[0].reset();
    </script>
@endif
<script>
    $(document).ready(function() {

        $("#practice").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "{{ url('/table') }}", // Use Laravel's url() helper
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for POST requests
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [1, 2, 3, 4],
            }],
        });

        CKEDITOR.replace('editor');


    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#tags').select2({
            tags: true, // Allow users to create new tags
            placeholder: 'Search or select an option',
            minimumInputLength: 1, // Trigger search after typing 1 character
            width: '100%', // Adjust width if necessary
            ajax: {
                url: "{{ url('/getdata') }}", // Replace with your API endpoint
                dataType: 'json',
                delay: 250,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(params) {
                    return {
                        q: params.term // Pass the search term
                    };
                },
                processResults: function(data) {
                    let results = [];
                    let seenTags = new Set(); // To track unique tags

                    // Process each item in the returned data
                    data.forEach(function(item) {
                        if (item.tags) { // Ensure item.tags is not empty
                            let terms = item.tags.split(','); // Split the string by commas
                            terms.forEach(function(term) {
                                term = term.trim(); // Trim whitespace
                                if (term && !seenTags.has(term)) {
                                    seenTags.add(term); // Mark the tag as seen
                                    results.push({
                                        id: term, // Use the term itself as the ID
                                        text: term
                                    });
                                }
                            });
                        }
                    });

                    return {
                        results: results
                    };
                },
                cache: true
            },
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newTag: true // Mark this as a new tag
                };
            },
            templateResult: function(tag) {
                if (tag.newTag) {
                    return `Add this: ${tag.text}`;
                }
                return tag.text;
            },
            insertTag: function(data, tag) {
                // Check if the tag already exists in the data (based on text)
                var found = data.some(function(item) {
                    return item.text === tag.text;
                });
                // If not found, add the new tag
                if (!found) {
                    data.push(tag);
                }
            }
        }).on('select2:select', function(e) {
            var data = e.params.data;
            if (data.newTag) {
                console.log('New tag created:', data.text);
            }
            // Ensure the new tag is added to the selection
            var $select = $(this);
            $select.append(new Option(data.text, data.id, true, true));
            $select.trigger('change');
        });
    });
</script>