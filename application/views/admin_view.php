<?php?>
<html>
	<head>
		<title>Admin View</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="description" content="Admin View">
    	<meta name="author" content="Stephen Pagliuca">
		<link rel="shortcut icon" href="./images/redfox.png" />
		<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.css"/>
		<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script> 
		<script type="text/javascript" src="./js/jquery-ui.js"></script>
		<script type="text/javascript" src="./js/admin.js"></script> 
	</head>
	<body>
		<h1>Admin View</h1>
		
		<div id="addCourseM">
			<button id="addM">Add Marist Course</button>
		</div>
		<div id="addOtherCourse">
			<button id="addOther">Add Non-Marist Course</button>
		</div>
		<div id="transferCourse">
			<button id="addTransfer">Add Transfer Connection</button>
		</div>
	</body>
		<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script>
	</head>
	<body>
		<h1>Admin View</h1>
		
		<div id="addCourseM">
			Add a Marist Course:
			<br><br>
				Course Number: <input type='text' id="courseNumM" name='courseNumM'> 
				Course Name: <input type='text' name='courseNameM' id="courseNameM"> 
				Department: <input type='text' name='departmentM' id="departmentM"> 
				<button id="addM">Add Course</button>
		</div>
		<div id="addOtherCourse">
			<br>Add a Non-Marist Course:
			<br><br>School Name: <input type='text' name='schoolName' id='schoolName'> 
			School State: <input type='text' name='schoolState' id='schoolState'> 
			Course Number: <input type='text' name='courseNumNM' id='courseNumNM'> 
			Course Name: <input type='text' name='courseNameNM' id='courseNameNM'> 
			Department: <input type='text' name='departmentNM' id='departmentNM'> 
			<button id="addNM">Add Course</button>
		</div>
		<div id="transferCourse">
			<br>Add a transfer link:<br>
			<br>Marist Course Number: <input type='text' name='mCourseNum' id='mCourseNum'> 
			Non-Marist Course Number: <input type='text' name='nMCourseNum' id='nMCourseNum'> 
			<button id="addTransfer">Add Transfer Link</button>
		</div>
		<script type="text/javascript">
			$('#addM').click(function(){
					var courseNumM = $('input#courseNumM').val();
					var courseNameM = $('input#courseNameM').val();
					var departmentM = $('input#departmentM').val();
					if(!courseNumM){
						window.alert("You must enter a course number to add a Marist Class!");
					}
					else if(!courseNameM){
						window.alert("You must enter a course name to add a Marist Class!");
					}
					else if(!departmentM){
						window.alert("You must enter a department name to add a Marist Class!");
					}
					else{
						$.post("?c=ai&m=addM",{courseNumM: courseNumM, courseNameM: courseNameM, departmentM: departmentM}).done(function(data){
								if (data == 1){
									alert("Marist Course added successfully");
									location.reload();
								}else{
									alert('Error in setting the instructions');
								}
						});
					}
			});

			$('#addNM').click(function(){
					var schoolName = $('input#schoolName').val();
					var schoolState = $('input#schoolState').val();
					var courseNumNM = $('input#courseNumNM').val();
					var courseNameNM = $('input#courseNameNM').val();
					var departmentNM = $('input#departmentNM').val();
					if(!schoolName){
						window.alert("You must enter a school name to add a Class!");
					}
					else if(!schoolState){
						window.alert("You must enter a school state to add a Class!");
					}
					else if(!courseNumNM){
						window.alert("You must enter a course number to add a Class!");
					}
					else if(!courseNameNM){
						window.alert("You must enter a course name to add a Class!");
					}
					else if(!departmentNM){
						window.alert("You must enter a department name to add a Class!");
					}
					else{
						$.post("?c=ai&m=addNM",{schoolName: schoolName, schoolState: schoolState, courseNumNM: courseNumNM, courseNameNM: courseNameNM, departmentNM: departmentNM}).done(function(data){
								if (data == 1){
									alert("Course added successfully");
									location.reload();
								}else{
									alert('Error in setting the instructions');
								}
						});
					}
			});

			$('#addTransfer').click(function(){
					var mCourseNum = $('input#mCourseNum').val();
					var nMCourseNum = $('input#nMCourseNum').val();
					if(!mCourseNum){
						window.alert("You must enter a Marist course number to add a transferable class!");
					}
					else if(!nMCourseNum){
						window.alert("You must enter a course number to add a transferable class!");
					}
					else{
						$.post("?c=ai&m=addTLink",{mCourseNum: mCourseNum, nMCourseNum: nMCourseNum}).done(function(data){
								if (data == 1){
									alert("Transferable Course added successfully");
									location.reload();
								}else{
									alert('Error in setting the instructions');
								}
						});
					}
			});
				
		</script>		
	</body>
</html>