<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>

@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
body {
    font: 16px 'Open Sans';
}
.form-control, .thumbnail {
    border-radius: 2px;
}
.btn-danger {
    background-color: #B73333;
}

/* File Upload */
.fake-shadow {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload #logo-id {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 33px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.img-preview {
    max-width: 100%;
}

</style>
<body>
	<div class="container">
	<h1>STAFF ID FORM</h1>
	<form action="GenerateQR.php" method="POST" enctype="multipart/form-data">
			<div class="container">
			<div class="form-group">
			<div style="width:40%; float:left; margin:auto; padding-top:30px;">
			  <div class="form-group">
				<label for="exampleInputEmail1">Upload Passport</label>
				<input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
			  </div>
			  <div class="form-group">
                  <div class="fileUpload btn btn-primary btn-lg btn-block fake-shadow">
                    <span><i class="glyphicon glyphicon-upload"></i> Browse Photos</span>
                    <input id="logo-id" type="file" name="passport" class="attachment_upload">
				  </div>
				</div>
			</div>
			<div style="width:40%; float:right; margin:auto;">
				<div class="main-img-preview">
                <img class="thumbnail img-preview rounded" width="200px" height="200px"src="avatar.jpg" title="Preview Logo">
              </div>
			</div>
			</div>
          </div>
		  <div class="form-group">
			<label for="exampleInputEmail1">Employees Name</label>
			<input type="text" class="form-control" id="empname" name="empname" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
			<label for="exampleInputEmail1">Job Title</label>
			<input type="Text" class="form-control" id="position" name="position" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
			<label for="exampleInputEmail1">Employees Number</label>
			<input type="text" class="form-control" id="EmpId" name="EmpId" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
			<label for="exampleInputEmail1">Valid Until</label>
			<input type="date" class="form-control" id="valid" name="valid" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
			<label for="exampleFormControlSelect1">Gender</label>
			<select class="form-control" id="gender" name="gender">
			  <option value="Male" >Male</option>
			  <option value="Female" >Female</option>
			  <option value="InterSex" >InterSex</option>
			</select>
		  </div>
		  
		  <div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">I am not a robot</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
</body>
</html>

<script>
$(document).ready(function() {
    var brand = document.getElementById('logo-id');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#logo-id").change(function() {
        readURL(this);
    });
});

</script>