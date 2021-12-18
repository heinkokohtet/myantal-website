<?php 
	
	include("config.php");


	$drop="Drop Table userjob";
	$droprun=mysqli_query($conn,$drop);

	$drop="Drop Table user";
	$droprun=mysqli_query($conn,$drop);	

	$drop="Drop Table companyjob";
	$droprun=mysqli_query($conn,$drop);

	$drop="Drop Table admin";
	$droprun=mysqli_query($conn,$drop);

	$drop="Drop Table company";
	$droprun=mysqli_query($conn,$drop);
	
	$drop="Drop Table job";
	$droprun=mysqli_query($conn,$drop);
	
	$drop="Drop Table jobtype";
	$droprun=mysqli_query($conn,$drop);
	
	$drop="Drop Table jobcategory";
	$droprun=mysqli_query($conn,$drop);

	$drop="Drop Table role";
	$droprun=mysqli_query($conn,$drop);

	$drop="Drop Table training";
	$droprun=mysqli_query($conn,$drop);

	#######################################


	$create = "Create table role
	(
		role_id int auto_increment not null primary key,
		role_name varchar(255)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Role Table Successfully.";
	}

	#########################################

	$create = "Create table user
	(
		user_id int auto_increment not null primary key,
		user_name varchar(255),
		email varchar(255),
		phone_no varchar(255),
		password varchar(255),
		CV varchar(255),
		role_id int,
		Foreign key(role_id) references role(role_id)

	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Users Table Successfully.";
	}

	###################################
	

	$create = "Create table company
	(
		company_id int auto_increment not null primary key,
		logo varchar(255),
		company_name varchar(255),
		email varchar(255),
		phone_no varchar(255),
		password varchar(255),
		company_type varchar(255),
		company_website varchar(255),
		role_id int,
		Foreign key(role_id) references role(role_id)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Company Table Successfully.";
	}

	###################################
	$create = "Create table jobcategory
	(
		jc_id int auto_increment not null primary key,
		photo varchar(255),
		jc_name varchar(255)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Job Category Table Successfully.";
	}


	#############################
	$create = "Create table jobtype
	(
		jt_id int auto_increment not null primary key,
		jt_name varchar(255),
		Duration varchar (255)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Job Type Table Successfully.";
	}

	##############################################
	$create = "Create table job
	(
		job_id int auto_increment not null primary key,
		job_name varchar(255),
		text text,
		requirement text,
		benefit text,
		gender varchar(255),
		salary varchar(255),
		region varchar(255),
		location varchar(255),
		jobfile varchar(255),
		post_date date,
		jt_id int,
		jc_id int,
		company_id int,
		Foreign key(jt_id) references jobtype(jt_id),
		Foreign key(jc_id) references jobcategory(jc_id),
		Foreign key(company_id) references company(company_id)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Job Table Successfully.";
	}

	####################################

	$create = "Create table admin
	(
		admin_id int auto_increment not null primary key,
		admin_name varchar(255),
		password varchar(255),
		role_id int,
		Foreign key(role_id) references role(role_id)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Admin Table Successfully.";
	}

	##################################

	$create = "Create table userjob
	(
		uj_id int auto_increment not null primary key,
		user_id int,
		job_id int,
		Foreign key(user_id) references user(user_id),
		Foreign key(job_id) references job(job_id)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "User Job Table Successfully.";
	}

	####################################

	$create = "Create table training
	(
		t_id int auto_increment not null primary key,
		name varchar(255),
		photo varchar(255),
		link varchar(255)
	)";

	$createresult = mysqli_query($conn, $create);
	if($createresult)
	{
		echo "Training Table Successfully.";
	}	