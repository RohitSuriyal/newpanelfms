@include('layout.header')

<div class="container-fluid">





    <!-- modal for the pop up -->
    <div tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <a href="{{route('addblog')}}"><button class="btn btn-primary"><i class="fa-solid fa-arrow-left mr-2" style="color: #f0f2f4;"></i>All blogs</button></a> 
        <div class="modal-dialog modal-dialog-centered" style="max-width:64%!important" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Blog Details</h3>
                    
                </div>

                <div class="modal-body">
                    <form method="post" action="{{route('updateblogdata')}}" enctype="multipart/form-data">
                        @csrf
                      
                        <input type="hidden" name="id_update" value={{$id}}>

                        <div class="row">
                            <div class="col-md-6">

                                <label>Main Heading</label>
                                <input class="form-control" name="main_heading_update" placeholder="enter main heading" value="{{ $data[0]->heading }}">

                            </div>
                            <div class="col-md-6">
                                <label>image</label>
                                <input class="form-control" type='file' name="image_update" value="{{$data[0]->image}}">
                                <input type="hidden" name="image_hidden" value="{{$data[0]->image}}" >
                                <span><img height="170px" width="240px" src="{{$data[0]->image}}"></img></span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>body</label>
                                <textarea name="content_update" id="editor_update">

                                {{$data[0]->body}}
                                </textarea>



                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Category</label>

                                <select name="category_update" class="form-control">

                                    <option value="Technology" <?php if ($data[0]->category == 'Technology') echo 'selected'; ?>>Technology</option>
                                    <option value="Education" <?php if ($data[0]->category == 'Education') echo 'selected'; ?>>Education</option>
                                    <option value="Education" <?php if ($data[0]->category == 'School') echo 'selected'; ?>>School</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Date</label>
                                <input class="form-control" type="date" name="date_update" value="{{$data[0]->date}}">


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tags">Tags</label>
                                <input name="tags_update[]" class="form-control" id="tags_update" multiple>
                            </div>
                            <div class="col-md-6">
                                <label for="writtenby">Written by</label>
                                <input name="writtenby_update" class="form-control" value="{{$data[0]->written_by}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    School
                                </label>

                                <select name="school_update" class="form-control w-100">
                                    <option selected>Select school</option>
                                    @foreach($schoolname as $school)
                                    <option value="{{ $school->id }}"
                                        @if(isset($data[0]->School) && $data[0]->School == $school->id) selected @endif>
                                        {{ $school->name }}
                                    </option>
                                    @endforeach


                                    <option></option>




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
   
    <script>
        CKEDITOR.replace('editor_update');


        // Extract the selected tags from PHP and convert them into an array
        var selectedTags = '<?php echo $data[0]->tags; ?>'.split(',').map(function(tag) {
            return tag.trim(); // Clean up spaces from tags
        });

        // Step 1: Create new options for the selected tags
        selectedTags.forEach(function(tag) {
            // Ensure the tag is already an option before prepending
            var newOption = new Option(tag, tag, true, true); // The `true, true` makes it preselected
            $('#tags_update').append(newOption); // Append the tag to the Select2 dropdown
        });

        // Step 2: Initialize Select2 after adding the options
        $('#tags_update').select2({
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
                var found = data.some(function(item) {
                    return item.text === tag.text;
                });
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
            $select.append(new Option(data.text, data.id, true, true)); // Append the newly created tag
            $select.trigger('change'); // Trigger change to update Select2
        });

        // Step 3: Ensure the pre-selected tags are correctly marked in the UI
        $('#tags_update').val(selectedTags).trigger('change'); // Set the selected values and refresh Select2 UI
    </script>