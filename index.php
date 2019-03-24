<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumni</title>
</head>
<body>
<form action="membership.php" method="post">
    First Name: <input type="text" name="first_name" placeholder="First Name" pattern="[a-zA-Z]+" required/><br />
    Middle Name: <input type="text" name="middle_name" placeholder="Middle Name" pattern="[a-zA-Z]+" /><br />
    Last Name: <input type="text" name="last_name" placeholder="Last Name" /><br />
    Year of passout: <input type="text" name="year_of_passout" placeholder="Year of passout" /><br />
    Current Location: <input type="text" name="current_location" placeholder="Current Location" /><br />
    Address: <input type="text" name="address" placeholder="address" /><br />
    Phone Number: <input type="text" name="phone_number" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{9}" required/><br />
    Email: <input type="email" name="email" placeholder="email" /><br />
    Password: <input type="password" name="Password" placeholder="Password" minlength="8" required/><br />
    Confirm Password: <input type="password" name="con_password" placeholder="Confirm Password"/><br />
	<input type="submit" value="Log in" /><br />
</form>

</body>
