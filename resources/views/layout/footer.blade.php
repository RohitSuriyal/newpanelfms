</body>

</html>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom }}scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
    window.onload = function() {
        if (window.location.protocol === "file:") {
            alert("This sample requires an HTTP server. Please serve this file with a web server.");
        }
    };
</script>
<script>
    window.addEventListener("load", function() {
        setTimeout(function() {
            document.getElementById("overlay").style.display = "none";
        }, 1000); // 3000 ms = 3 seconds
    });
    editor.on('insertElement', function(event) {
        var element = event.data; // Get the inserted element
        if (element.getName() == 'img') { // Check if the inserted element is an image
            element.addClass('img-custom'); // Add your custom class to the image
        }
    });

    CKEDITOR.on('instanceReady', function(ev) {
        ev.editor.on('paste', function(event) {
            // Access the clipboard data
            var clipboardData = event.data.dataTransfer;

            // Check if there's an image in the clipboard
            if (clipboardData && clipboardData.getFilesCount() > 0) {
                var file = clipboardData.getFile(0); // Get the first file (assuming it's an image)
                var reader = new FileReader();

                reader.onload = function(e) {
                    var imgSrc = e.target.result;
                    var imgElement = '<img src="' + imgSrc + '" class="img-custom">';

                    // Insert the modified HTML into the editor
                    ev.editor.insertHtml(imgElement);
                };

                reader.readAsDataURL(file); // Read the image file as data URL
                event.cancel(); // Cancel the default paste behavior
            }
        });
    });
</script>