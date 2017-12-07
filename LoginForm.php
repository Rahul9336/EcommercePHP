<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<%@ taglib uri="http://www.springframework.org/tags" prefix="s"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin_Login_page</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<s:url var="url_img" value="/resources/Image/"></s:url>
<body class="container">
<div class="media-left">
<a href="/Shopping/LoginForm.html">
	<img src="${url_img}Logo.jpg"  width="100" height="70" class="media-object">
	</a></div>
	<div class="media-body">
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#myNavbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/Shopping/index.html">World Of
				Shopping</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li>
				<li><a href="#">Page 3</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span>
						Sign Up</a></li>
			</ul>
		</div>
	</div>
	</nav>
	</div>
	<h2 class="bg-success" align="center">Admin Login Page</h2>
	<form class="form-horizontal" action="${pageContext.request.contextPath }/Shopping/loginsuccess.html" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
			<div class="col-xs-3">
				<input type="text" class="form-control"
					placeholder="Enter email" name="username">
					      
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Password:</label>
			<div class="col-xs-3">
				<input type="password" class="form-control" id="pwd"
					placeholder="Enter password" name="password">
			</div>
		</div>
		  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Login</button>
      </div>
    </div>
  </form>
</body>
</html>