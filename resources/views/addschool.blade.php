@include("layout.header")

<div class="tab-container p-3">
    <a href="#" class="tab active m-2 text-decoration-none" data-target="tab1">Basic Details</a>
    <a href="#" class="tab m-2 text-decoration-none" data-target="tab2">Overview Inforamtion</a>
    <a href="#" class="tab m-2 text-decoration-none" data-target="tab3">Fee Structure</a>
    <a href="#" class="tab m-2 text-decoration-none" data-target="tab4">Eligiblity</a>
    <a href="#" class="tab m-2 text-decoration-none" data-target="tab5">Facilities</a>
    <a href="#" class="tab m-2 text-decoration-none" data-target="tab6">Gallery</a>
</div>

<div class="content-container">
    <div id="tab1" class="content active-content">
        <h2 class="text-center mb-4">Basic Details</h2>
        <div class="row">
            <div class="col-md-6">
                <label class="form-conrtol">Name of the school</label>
                <input class="form-control">

            </div>
            <div class="col-md-6">
                <label class="form-conrtol">Category</label>
                <select class="form-control" id="category" multiple>

                    <option>Day School</option>
                    <option>Boarding School</option>
                    <option>Day Boarding School</option>
                    <option>Play School</option>
                </select>



            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label>Class Offered</label>
                <input class="form-control">
                  
            </div>
            <div class="col-md-6">
                <label>Board</label>
                <select class="form-control">
                    <option>CBSE</option>
                    <option>ICSE</option>
                    <option>IB</option>
                    <option>IGSCE</option>
                    <option>State Board</option>
                </select>
                   
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label>Student faculty ratio</label>
                <input class="form-control">
                  
            </div>

            <div class="col-md-6">
                <label>Tags</label>
                <select id="tags" class="form-control"  multiple>
                    
                </select>

            </div>
            

        </div>
        <div class="row mt-3">
            
            <div class="col-md-12">
                <input type="file" class="form-control">



            </div>

        </div>
        
        
    </div>
    <div id="tab2" class="content">
        <h2>Content for Tab 2</h2>
        <p>This is the content displayed for Tab 2.</p>
    </div>
    <div id="tab3" class="content">
        <h2>Content for Tab 3</h2>
        <p>This is the content displayed for Tab 3.</p>
    </div>
    <div id="tab4" class="content">
        <h2>Content for Tab 4</h2>
        <p>This is the content displayed for Tab 4.</p>
    </div>
    <div id="tab5" class="content">
        <h2>Content for Tab 5</h2>
        <p>This is the content displayed for Tab 5.</p>
    </div>
    <div id="tab6" class="content">
        <h2>Content for Tab 6</h2>
        <p>This is the content displayed for Tab 6.</p>
    </div>
</div>

<script>
    // JavaScript for switching tabs and content
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.content');

    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();

            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active-content'));

            // Add active class to the clicked tab and corresponding content
            tab.classList.add('active');
            const target = tab.getAttribute('data-target');
            document.getElementById(target).classList.add('active-content');
        });
    });

    $("#category").select2({
        placeholder: "Select a category", // Set the placeholder text
        allowClear: true // Enable clear button to remove the selection
    });
    $("#tags").select2({
        placeholder: "Select a category", // Set the placeholder text
        allowClear: true
    })
</script>





@include("layout.footer")