Dropzone.options.myDropzone = {
            maxFiles         :       5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false,
            parallelUploads:5,
            uploadMultiple:false,
    init: function() {

      var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

      this.on("sending", function (file) {
                var date= new Date();
                file.myfileName = date.getTime() + file.name;
        });
      this.on("sending", function(file, xhr, formData) {

     formData.append("fileName", file.myfileName);
});
      this.on("success", function(file, responseText) {
        console.log(responseText);
            if(responseText.Upload == 'false')
            {
              document.getElementById("Error").innerHTML = "Error in uploading file";
            }
        });
      this.on("addedfile", function(file) {

        // Create the remove button
        var removeButton = Dropzone.createElement("<button class='btn btn-primary'>Remove file</button>");
        

        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        removeButton.addEventListener("click", function(e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();
          var I={'name':file.myfileName};
          console.log(I);

          // Remove the file preview.
          _this.removeFile(file);
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
             axios({
            method: 'post',
            url:'http://127.0.0.1:8000/remove/image',
            data:I
          }).then(function(response){
            // console.log(response);
            if(response.data.status == 'Failed')
            {
              document.getElementById("Error").innerHTML = "Error in removing file";
                // alert('Error in uploading file');

            }
        });

        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
  };

